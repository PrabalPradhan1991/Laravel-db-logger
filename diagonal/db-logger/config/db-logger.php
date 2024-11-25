<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Database Connection
    |--------------------------------------------------------------------------
    |
    | This value determines which database connection will be used for logging.
    | Supported: "mongodb", "mysql"
    |
    */
    'connection' => env('DB_LOGGER_CONNECTION', 'mongodb'),

    /*
    |--------------------------------------------------------------------------
    | Collection/Table Name
    |--------------------------------------------------------------------------
    |
    | This value determines the name of the collection (MongoDB) or table (MySQL)
    | that will be used to store the logs.
    |
    */
    'collection' => env('DB_LOGGER_COLLECTION', 'db_logs'),
];
