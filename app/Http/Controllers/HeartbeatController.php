<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HeartbeatController extends Controller
{
    public function Heartbeat()
    {
        $currentDate = Carbon::now()->toDateString();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => 'Heartbeat successful',
            'data' => [
                'current_date' => $currentDate,
            ],
        ];

        return response()->json($response, $response['code']);
    }
}