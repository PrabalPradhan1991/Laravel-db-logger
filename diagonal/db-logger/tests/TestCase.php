<?php

namespace Diagonal\DbLogger\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Diagonal\DbLogger\App\Providers\DbLoggerProvider;
use MongoDB\Laravel\MongoDBServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            DbLoggerProvider::class,
            MongoDBServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app)
    {
        // Setup MongoDB configuration for testing
        $app['config']->set('database.default', 'mongodb');
        $app['config']->set('database.connections.mongodb', [
            'driver' => 'mongodb',
            'host' => env('DB_HOST', 'db-record-mongodb'),
            'port' => env('DB_PORT', 27017),
            'database' => 'testing',
            'username' => 'root',
            'password' => 'password',
            'options' => [
                'database' => 'admin'
            ],
        ]);
    }

    protected function defineDatabaseMigrations()
    {
        // Clean up the test database
        $this->artisan('migrate:fresh');
        
        // Run your package migrations
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
