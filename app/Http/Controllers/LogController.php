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
    private ILogRepository $logRepository;

    public function __construct(ILogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function index()
    {
        $logs = $this->logRepository->getAllLogs();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_LOGS,
            'count' => Log::count(),
            'data' => $logs,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateLogRequest $request)
    {
        $log = $this->logRepository->createLog($request->event_id, $request->user_id);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_LOG,
            'data' => $log,
        ];

        return response()->json($response, $response['code']);
    }

    public function getByEventIdAndUserId($event_id, $user_id)
    {
        $log = $this->logRepository->getLogByEventIdAndUserId($event_id, $user_id);

        if ($log != null) {
            if (empty($log)) {
                $response = [
                    'code' => Response::HTTP_NOT_FOUND,
                    'status' => Response::FAIL,
                    'message' => Response::LOG_NOT_FOUND,
                ];
                return response()->json($response, $response['code']);
            } else {
                $response = [
                    'code' => Response::HTTP_SUCCESS_POST,
                    'status' => Response::SUCCESS,
                    'message' => Response::SUCCESSFULLY_GET_LOG,
                    'data' => $log,
                ];

                return response()->json($response, $response['code']);
            }
        } else {
            $response = [
                'code' => Response::HTTP_NOT_FOUND,
                'status' => Response::FAIL,
                'message' => Response::LOG_NOT_FOUND,
            ];
            return response()->json($response, $response['code']);
        }
    }
}