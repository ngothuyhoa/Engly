<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Observers\PostObserver;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('auth-header', Auth::user());
        //View::share('check', Auth::check());

        view()->composer([
            'page_user.layout.sidebar',
        ], function ($view) {
            $tagSidebars = \Cache::remember('tags_sidebar', 60, function () {
                return Tag::orderBy('id', 'DESC')->paginate(6);
            });

            $userSidebars = \Cache::remember('user_sidebar', 60, function () {
                return User::With('images')->paginate(3);
            });
            
            $view->with(['tagSidebars' => $tagSidebars, 'userSidebars' => $userSidebars]);
        });

        Post::observe(PostObserver::class);
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
