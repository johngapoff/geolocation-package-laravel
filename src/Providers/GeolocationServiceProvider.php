<?php

namespace ModulePlaces\GeolocationCrud\Providers;

use Illuminate\Support\ServiceProvider;

class GeolocationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/geolocation.php' => config_path('geolocation.php'),
        ], 'config');

        // Publish controllers
        $this->publishes([
            __DIR__ . '/../Controllers' => app_path('Http/Controllers/ModulePlaces'),
        ], 'controllers');

        // Publish models
        $this->publishes([
            __DIR__ . '/../Models' => app_path('Models/ModulePlaces'),
        ], 'models');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/geolocation.php', 'geolocation');
    }
}
