<?php
namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\User;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            $user = User::whereEmail($email)->first();

            if (!$user) {
                $username = User::whereName(convertString($providerUser->getName()))->first();
                if($username == null) {
                    $name = convertString($providerUser->getName());
                }
                else {
                    $name = convertString($providerUser->getName()).rand(1, 50);
                }
                $user = User::create([
                    'fullname' =>$providerUser->getName(),
                    'email' => $email,
                    'name' => $name,
                    'password' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}