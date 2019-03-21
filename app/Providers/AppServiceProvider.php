<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
use App\Tag;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'page_user.layout.sidebar',
        ], function ($view) {
            $tagSidebars = \Cache::remember('tags_sidebar', 60, function () {
                return Tag::orderBy('id', 'DESC')->paginate(6);
            });

            $userSidebars = \Cache::remember('user_sidebar', 60, function () {
                return User::With('images')->paginate(6);
            });
            
            $view->with(['tagSidebars' => $tagSidebars, 'userSidebars' => $userSidebars]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
