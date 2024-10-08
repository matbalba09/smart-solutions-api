<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\UpdateEventRequest;
use Carbon\Carbon;
use App\Models\Event;
use App\Repositories\Interface\IEventRepository;
use App\Response;

class EventRepository implements IEventRepository
{

    function getAllEvents()
    {
        $dateNow = Helper::getDateNowIso();
        $events = Event::selectRaw('events.*, CASE 
                WHEN events.event_type = 1 AND (? > events.end_date) THEN \'COMPLETED\' 
                WHEN events.event_type = 1 AND ? BETWEEN events.start_date AND events.end_date THEN \'ONGOING\' 
                WHEN events.event_type = 1 AND ? < events.start_date THEN \'UPCOMING\' 
                WHEN events.event_type = 2 THEN \'N/A\' 
                ELSE NULL 
                END as status')
            ->setBindings([$dateNow, $dateNow, $dateNow])
            ->where('is_deleted', Response::FALSE)
            ->get();

        return $events;
    }

    function getEventById($id)
    {
        $event = Event::findOrFail($id);
        return $event;
    }

    function getAllEventsbyEventType($event_type)
    {
        $dateNow = Helper::getDateNowIso();
        $events = Event::selectRaw('events.*, CASE 
                WHEN events.event_type = 1 AND (? > events.end_date) THEN \'COMPLETED\' 
                WHEN events.event_type = 1 AND ? BETWEEN events.start_date AND events.end_date THEN \'ONGOING\' 
                WHEN events.event_type = 1 AND ? < events.start_date THEN \'UPCOMING\' 
                WHEN events.event_type = 2 AND ? > events.start_date THEN \'COMPLETED\' 
                ELSE NULL 
                END as status')
            ->setBindings([$dateNow, $dateNow, $dateNow, $dateNow])
            ->where('is_deleted', Response::FALSE)
            ->where('event_type', $event_type)->get();
        return $events;
    }

    function createEvent($event_name, $event_type, $attendance_type, $organizer, $venue, $start_date, $end_date)
    {
        $event = Event::create([
            'event_name' => $event_name,
            'event_type' => $event_type,
            'attendance_type' => $attendance_type,
            'organizer' => $organizer,
            'venue' => $venue,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'is_deleted' => Response::FALSE,
        ]);

        return $event;
    }

    function updateEvent(UpdateEventRequest $request, $id)
    {
        $validatedData = $request->validated();
        $event = Event::findOrFail($id);
        $event->update($validatedData);

        return $event;
    }

    function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return $event;
    }

    function getAllEventsByStatus($event_status)
    {
        $dateNow = Helper::getDateNowIso();
        if ($event_status == 'ONGOING') {
            $events = Event::where(function ($query) use ($dateNow) {
                $query->where('start_date', '<', $dateNow)
                    ->where('end_date', '>', $dateNow);
            })->get();
        } else if ($event_status == 'UPCOMING') {
            $events = Event::where(function ($query) use ($dateNow) {
                $query->where('start_date', '>', $dateNow);
            })->get();
        }
        return $events;
    }

    function getAllDeletedEvents()
    {
        $events = Event::where('is_deleted', Response::TRUE)->get();
        return $events;
    }
}
