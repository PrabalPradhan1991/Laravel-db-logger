<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Database Connection
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for logger operations.
    |
    */
    'connection' => env('DB_LOGGER_CONNECTION', 'mongodb'),

    /*
    |--------------------------------------------------------------------------
    | Collection/Table Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default collection (MongoDB) or table (SQL)
    | name that should be used for logging operations.
    |
    */
    'collection' => env('DB_LOGGER_COLLECTION', 'db_logs'),

    /*
    |--------------------------------------------------------------------------
    | Model Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may specify your own implementation of the DbLogger model.
    | This allows you to extend and override the default behavior.
    |
    */
    'model' => \Diagonal\DbLogger\App\Models\DbLogger::class,
];
