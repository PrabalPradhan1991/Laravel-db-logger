<?php

namespace Diagonal\DbLogger\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Diagonal\DbLogger\App\Services\DbLoggerService;
use Illuminate\Http\Request;

class DbLoggerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all(DbLoggerService $dbLoggerService, Request $request)
    {
        return $dbLoggerService->allRecords($request->get('model'), $request->get('model_id'), $request->get('action'));
    }

    public function paginated(DbLoggerService $dbLoggerService, Request $request)
    {
        return $dbLoggerService->paginatedRecords($request->get('model'), $request->get('model_id'), $request->get('action'));
    }
}
