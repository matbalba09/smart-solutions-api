<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Event;
use App\Repositories\Interface\IEventRepository;

class EventRepository implements IEventRepository
{

    function getAllEvents()
    {
        $events = Event::get();
        return $events;
    }

    function getEventById($id)
    {
        $event = Event::findOrFail($id);
        return $event;
    }

    function getAllEventsbyEventType($event_type)
    {
        $events = Event::where('event_type', $event_type)->get();
        return $events;
    }

    function createEvent($event_name, $event_type, $start_date, $end_date)
    {
        $event = Event::create([
            'event_name' => $event_name,
            'event_type' => $event_type,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        return $event;
    }

    function updateEvent($event_name, $event_type, $id)
    {
        $event = Event::findOrFail($id);

        $event->event_name = $event_name;
        $event->event_type = $event_type;
        $event->updated_at = Carbon::now();
        $event->save();

        return $event;
    }

    function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return $event;
    }
}
