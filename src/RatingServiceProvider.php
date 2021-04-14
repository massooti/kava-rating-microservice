<?php

namespace Kavano\Rating;

use Illuminate\Support\ServiceProvider;

class RatingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        config()->set('cache.stores.temp_tag', ['driver' => 'file', 'path' => config('tag.cache_storage_path')]);
               
        // register our controller
       $this->app->make('Kavano\Rating\RatingController');
    }

    /**
     *
     * Add raitng routes for submit feedback and see rate status from rating microservice.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/rating.php' => $this->app->configPath('rating.php'),
        ], 'rating-microservice');

        $this->mergeConfigFrom(__DIR__ . '/../config/rating.php', 'rating');

        $this->loadRoutesFrom(
            __DIR__ . '/../routes/api.php'
        );
    }
}
