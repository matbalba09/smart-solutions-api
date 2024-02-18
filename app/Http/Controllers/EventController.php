<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Repositories\Interface\IEventRepository;
use App\Response;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private IEventRepository $event;

    public function __construct(IEventRepository $event)
    {
        $this->event = $event;
    }

    public function index()
    {
        //
        $event = $this->event->getEvent();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_EVENTS,
            'count' => Event::count(),
            'data' => $event,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateEventRequest $request)
    {
        //
        $generalPurpose = $this->event->createEvent($request->name);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_EVENT,
            'data' => $generalPurpose,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateEventRequest $request, $id)
    {
        //
        $generalPurpose = $this->event->updateEvent($request->name,$id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_EVENT,
            'data' => $generalPurpose,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        //
        $this->event->deleteEvent($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_EVENT,
        ];

        return response()->json($response, $response['code']);
    }
}
