<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    protected $models = [
        'Post',
        'Tag',
        'User',
        'Feedback',
        'Report',
        'Image'
    ];
    public function boot()
    {
        //
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->models as $model) {
            $contract = 'App\Contracts\Repositories\\' . $model . 'Repository';
            $repository = 'App\Repositories\Eloquents\Eloquent' . $model . 'Repository';
            $this->app->bind($contract, $repository);
        }
    }
}