<?php

namespace Diagonal\DbLogger\Tests;

use Diagonal\DbLogger\App\Providers\DbLoggerProvider;
use MongoDB\Laravel\MongoDBServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

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
        // Setup MySQL configuration for testing
        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => 'db-record-db-test',
            'port' => '3306',
            'database' => 'db-record-db',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);

        // Setup MongoDB configuration for logging
        $app['config']->set('database.connections.mongodb', [
            'driver' => 'mongodb',
            'host' => 'db-record-mongodb',
            'port' => 27017,
            'database' => 'testing',
            'username' => 'root',
            'password' => 'password',
            'options' => [
                'database' => 'admin',
            ],
        ]);
    }

    protected function defineDatabaseMigrations()
    {
        // Clean up and run migrations for MySQL first
        $this->artisan('migrate:fresh');

        // Then load the User migration from tests directory
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}
