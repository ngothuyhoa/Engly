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
use App\Report;

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
            $tagSidebars = Tag::inRandomOrder()->paginate(6);
            $userSidebars = User::With(['images', 'posts', 'followers'])->inRandomOrder()->paginate(3);
            
            $view->with(['tagSidebars' => $tagSidebars, 'userSidebars' => $userSidebars]);
        });

        view()->composer([
            'admin.layout.index',
        ], function ($view) {
            $reports = Report::where('status', 0)->get();
            $reportCount = count($reports);
            
            $view->with(['reportCount' => $reportCount]);
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
