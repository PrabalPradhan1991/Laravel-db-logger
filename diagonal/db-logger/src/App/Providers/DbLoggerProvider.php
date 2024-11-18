<?php

namespace Diagonal\DbLogger\App\Providers;

use Illuminate\Support\ServiceProvider;

class DbLoggerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'db-logger');
    }
}
