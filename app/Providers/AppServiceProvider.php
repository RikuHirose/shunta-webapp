<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // User
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\Eloquent\UserRepository::class
        );

        // SocialProvider
        $this->app->bind(
            \App\Repositories\SocialProviderRepositoryInterface::class,
            \App\Repositories\Eloquent\SocialProviderRepository::class
        );

        // Images
        $this->app->bind(
            \App\Repositories\ImageRepositoryInterface::class,
            \App\Repositories\Eloquent\ImageRepository::class
        );

        // Categories
        $this->app->bind(
            \App\Repositories\CategoryRepositoryInterface::class,
            \App\Repositories\Eloquent\CategoryRepository::class
        );

        // Restaurants
        $this->app->bind(
            \App\Repositories\RestaurantRepositoryInterface::class,
            \App\Repositories\Eloquent\RestaurantRepository::class
        );

        // Favorites
        $this->app->bind(
            \App\Repositories\FavoriteRepositoryInterface::class,
            \App\Repositories\Eloquent\FavoriteRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
