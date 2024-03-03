<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EventUser;
use App\Repositories\Interface\IEventUserRepository;
use App\Response;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    private IEventUserRepository $eventUser;

    public function __construct(IEventUserRepository $eventUser)
    {
        $this->eventUser = $eventUser;
    }

    public function index()
    {
        //
        $eventUsers = $this->eventUser->getAllEventUsers();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_EVENT_USERS,
            'count' => EventUser::count(),
            'data' => $eventUsers,
        ];

        return response()->json($response, $response['code']);
    }

    public function getAllByEventId($event_id)
    {
        //
        $eventUsers = $this->eventUser->getAllEventUsersByEventId($event_id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_EVENT_USERS,
            'count' => EventUser::count(),
            'data' => $eventUsers,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(Request $request)
    {
        //
        $eventUser = $this->eventUser->createEventUser($request->event_id,$request->user_id);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_EVENT_USER,
            'data' => $eventUser,
        ];

        return response()->json($response, $response['code']);
    }

}
