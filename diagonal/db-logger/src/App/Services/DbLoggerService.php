<?php

namespace Diagonal\DbLogger\App\Services;

use Diagonal\DbLogger\App\Infrastructure\Filters\DbLoggerFilter;
use Diagonal\DbLogger\App\Infrastructure\Traits\HasFilter;
use Diagonal\DbLogger\App\Models\DbLogger;

class DbLoggerService
{
    use HasFilter;

    public function allRecords(string $model, int|string $recordId, ?string $action)
    {
        $query = DbLogger::filter(new DbLoggerFilter([
            'model' => $model,
            'mode_id' => $recordId,
            'action' => $action,
        ]));

        return $query->get();

    }

    public function paginatedRecords(string $model, int|string $recordId, ?string $action)
    {
        $query = DbLogger::filter(new DbLoggerFilter([
            'model' => $model,
            'mode_id' => $recordId,
            'action' => $action,
        ]));

        return $query->paginate();
    }
}
