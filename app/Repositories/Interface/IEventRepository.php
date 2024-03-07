<?php

namespace App\Repositories\Interface;

interface IEventRepository
{
    function getAllEvents();
    function getEventById($id);
    function getAllEventsbyEventType($event_type);
    function createEvent($event_name, $event_type, $start_date, $end_date);
    function updateEvent($event_name, $event_type, $id);
    function deleteEvent($id);
}