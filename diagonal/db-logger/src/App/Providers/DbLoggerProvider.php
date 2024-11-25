<?php

namespace Diagonal\DbLogger\App\Providers;

use Illuminate\Support\ServiceProvider;

class DbLoggerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../../config/db-logger.php', 'db-logger'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'db-logger');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../../config/db-logger.php' => config_path('db-logger.php'),
            ], 'db-logger-config');
        }
    }
}
