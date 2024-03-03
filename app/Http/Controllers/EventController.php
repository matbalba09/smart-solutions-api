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
        $events = $this->event->getAllEvents();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_EVENTS,
            'count' => Event::count(),
            'data' => $events,
        ];

        return response()->json($response, $response['code']);
    }

    public function getAllbyEventType($event_type)
    {
        //
        $events = $this->event->getAllEventsbyEventType($event_type);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_EVENTS,
            'count' => Event::count(),
            'data' => $events,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateEventRequest $request)
    {
        //
        $event = $this->event->createEvent($request->event_name,$request->event_type);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_EVENT,
            'data' => $event,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateEventRequest $request, $id)
    {
        //
        $event = $this->event->updateEvent($request->event_name,$request->event_type,$id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_EVENT,
            'data' => $event,
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
