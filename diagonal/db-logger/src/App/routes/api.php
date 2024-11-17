<?php

use Diagonal\DbLogger\App\Http\Controllers\DbLoggerController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    Route::get('records-all', [DbLoggerController::class, 'all']);
    Route::get('records-paginated', [DbLoggerController::class, 'paginated']);
});
