<?php

namespace App\Repositories\Interface;

interface IEventRepository
{
    function getAllEvents();
    function getEventById($id);
    function getAllEventsbyEventType($event_type);
    function createEvent($event_name, $event_type, $attendance_type, $organizer, $venue, $start_date, $end_date);
    function updateEvent($event_name, $event_type, $attendance_type, $organizer, $venue, $id);
    function deleteEvent($id);
    function getAllEventsByStatus($event_status);
}