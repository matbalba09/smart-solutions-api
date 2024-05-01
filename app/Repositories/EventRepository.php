<?php

namespace App\Repositories;

use App\Helper\Helper;
use Carbon\Carbon;
use App\Models\Event;
use App\Repositories\Interface\IEventRepository;

class EventRepository implements IEventRepository
{

    function getAllEvents()
    {
        $dateNow = Helper::getDateNow();
        $events = Event::selectRaw('events.*, CASE 
                WHEN events.event_type = 1 AND (? > events.end_date) THEN \'COMPLETED\' 
                WHEN events.event_type = 1 AND ? BETWEEN events.start_date AND events.end_date THEN \'ONGOING\' 
                WHEN events.event_type = 1 AND ? < events.start_date THEN \'UPCOMING\' 
                WHEN events.event_type = 2 THEN \'N/A\' 
                ELSE NULL 
                END as status')
            ->setBindings([$dateNow, $dateNow, $dateNow])
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
        $dateNow = Helper::getDateNow();
        $events = Event::where('event_type', $event_type)
            ->selectRaw('events.*, CASE 
                WHEN events.event_type = 1 AND (? > events.end_date) THEN \'COMPLETED\' 
                WHEN events.event_type = 1 AND ? BETWEEN events.start_date AND events.end_date THEN \'ONGOING\' 
                WHEN events.event_type = 1 AND ? < events.start_date THEN \'UPCOMING\' 
                WHEN events.event_type = 2 THEN \'N/A\' 
                ELSE NULL 
                END as status')
            ->setBindings([$dateNow, $dateNow, $dateNow])->get();
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
        ]);

        return $event;
    }

    function updateEvent($event_name, $event_type, $attendance_type, $organizer, $venue, $id)
    {
        $event = Event::findOrFail($id);

        $event->event_name = $event_name;
        $event->event_type = $event_type;
        $event->attendance_type = $attendance_type;
        $event->organizer = $organizer;
        $event->venue = $venue;
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

    function getAllEventsByStatus($event_status)
    {
        $dateNow = Helper::getDateNow();
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
}
