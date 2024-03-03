<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLogRequest;
use App\Models\Log;
use App\Repositories\Interface\ILogRepository;
use App\Response;
use Illuminate\Http\Request;

class LogController extends Controller
{
    private ILogRepository $log;

    public function __construct(ILogRepository $log)
    {
        $this->log = $log;
    }

    public function index()
    {
        //
        $logs = $this->log->getAllLogs();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_LOGS,
            'count' => Log::count(),
            'data' => $logs,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateLogRequest $request)
    {
        //
        $log = $this->log->createLog($request->event_id,$request->user_id);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_LOG,
            'data' => $log,
        ];

        return response()->json($response, $response['code']);
    }
}
