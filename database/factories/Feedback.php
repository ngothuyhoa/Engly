<?php

use Faker\Generator as Faker;
use App\Feedback;
use App\User;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::pluck('id')->all()),
        'content' => $faker->text,
    ];
});
