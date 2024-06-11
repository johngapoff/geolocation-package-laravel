<?php

namespace Geolocation\GeolocationCrud\Providers;

use Illuminate\Support\ServiceProvider;

class GeolocationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        if (file_exists(__DIR__ . '/../routes/api.php')) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        }

        // Load migrations
        if (is_dir(__DIR__ . '/../database/migrations')) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }

        // Publish configuration
        if (file_exists(__DIR__ . '/../config/geolocation.php')) {
            $this->publishes([
                __DIR__ . '/../config/geolocation.php' => config_path('geolocation.php'),
            ], 'config');
        }

        // Publish controllers
        if (is_dir(__DIR__ . '/../Controllers')) {
            $this->publishes([
                __DIR__ . '/../Controllers' => app_path('Http/Controllers/'),
            ], 'controllers');
        }

        // Publish models
        if (is_dir(__DIR__ . '/../Models')) {
            $this->publishes([
                __DIR__ . '/../Models' => app_path('Models/'),
            ], 'models');
        }

        // Publish migrations
        if (is_dir(__DIR__ . '/../database/migrations')) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');
        }

        // Publish routes
        if (file_exists(__DIR__ . '/../routes/api.php')) {
            $this->publishes([
                __DIR__ . '/../routes/api.php' => base_path('routes/api.php'),
            ], 'routes');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/geolocation.php', 'geolocation');
    }
}
