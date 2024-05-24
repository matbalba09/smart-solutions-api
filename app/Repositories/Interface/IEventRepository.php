<?php

namespace App\Repositories\Interface;

use App\Http\Requests\UpdateEventRequest;

interface IEventRepository
{
    function getAllEvents();
    function getEventById($id);
    function getAllEventsbyEventType($event_type);
    function createEvent($event_name, $event_type, $attendance_type, $organizer, $venue, $start_date, $end_date);
    function updateEvent(UpdateEventRequest $request, $id);
    function deleteEvent($id);
    function getAllEventsByStatus($event_status);
    function getAllDeletedEvents();
}