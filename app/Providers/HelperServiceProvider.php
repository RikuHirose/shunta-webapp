<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Helpers\RestaurantHelperInterface::class,
            \App\Helpers\Production\RestaurantHelper::class
        );

        $this->app->singleton(
            \App\Helpers\FavoriteHelperInterface::class,
            \App\Helpers\Production\FavoriteHelper::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
