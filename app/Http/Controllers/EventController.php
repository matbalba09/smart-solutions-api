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
    private IEventRepository $eventRepository;

    public function __construct(IEventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $events = $this->eventRepository->getAllEvents();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_EVENTS,
            'count' => Event::count(),
            'data' => $events,
        ];

        return response()->json($response, $response['code']);
    }

    public function getAllbyEventType($event_type)
    {
        $events = $this->eventRepository->getAllEventsbyEventType($event_type);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_EVENTS,
            'count' => Event::count(),
            'data' => $events,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateEventRequest $request)
    {
        $event = $this->eventRepository->createEvent($request->event_name, $request->event_type);

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
        $event = $this->eventRepository->updateEvent($request->event_name, $request->event_type, $id);

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
        $this->eventRepository->deleteEvent($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_EVENT,
        ];

        return response()->json($response, $response['code']);
    }
}