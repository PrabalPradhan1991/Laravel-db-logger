<?php

namespace Diagonal\DbLogger\App\Services;

use Diagonal\DbLogger\App\Infrastructure\Filters\DbLoggerFilter;

class DbLoggerService
{
    protected $model;

    public function __construct()
    {
        $modelClass = config('db-logger.model');
        $this->model = new $modelClass;
    }

    public function allRecords(string $model, int|string $recordId, ?string $action = null)
    {
        return $this->model::filter(new DbLoggerFilter([
            'model' => $model,
            'model_id' => $recordId,
            'action' => $action,
        ]))->get();
    }

    public function paginatedRecords(string $model, int|string $recordId, ?string $action = null)
    {
        return $this->model::filter(new DbLoggerFilter([
            'model' => $model,
            'model_id' => $recordId,
            'action' => $action,
        ]))->paginate();
    }
}
