<?php

use Diagonal\DbLogger\Tests\TestCase;
use Diagonal\DbLogger\App\Http\Controllers\DbLoggerController;
use Illuminate\Support\Facades\Route;

uses(TestCase::class);

beforeEach(function () {
    Route::get('/api/records-all', [DbLoggerController::class, 'all']);
});

test('it can retrieve all db logs', function () {
    // Arrange
    $params = [
        'model' => 'User',
        'model_id' => '1',
        'action' => 'create'
    ];

    // Act
    $response = $this->get('/api/records-all?' . http_build_query($params));

    // Assert
    $response->assertStatus(200);
    expect($response->json())->toBeArray();
});

test('db logs endpoint returns the correct structure', function () {
    // Arrange
    $params = [
        'model' => 'User',
        'model_id' => '1',
        'action' => 'create'
    ];

    // Act
    $response = $this->get('/api/records-all?' . http_build_query($params));

    // Assert
    $response->assertStatus(200);
    $data = $response->json();

    expect($data)
        ->toBeArray()
        ->and($response->headers->get('content-type'))
        ->toContain('application/json');
});
