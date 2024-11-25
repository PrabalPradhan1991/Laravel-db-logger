<?php

namespace Diagonal\DbLogger\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Diagonal\DbLogger\App\Services\DbLoggerService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DbLoggerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all(DbLoggerService $dbLoggerService, Request $request): JsonResponse
    {
        $data = $dbLoggerService->allRecords(
            $request->get('model'),
            $request->get('model_id'),
            $request->get('action')
        );

        return response()->json($data);
    }

    public function paginated(DbLoggerService $dbLoggerService, Request $request)
    {
        return $dbLoggerService->paginatedRecords($request->get('model'), $request->get('model_id'), $request->get('action'));
    }
}
