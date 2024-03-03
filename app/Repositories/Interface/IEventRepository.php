<?php

namespace App\Repositories\Interface;

interface IEventRepository
{
    function getAllEvents();
    function getAllEventsbyEventType($event_type);
    function createEvent($event_name, $event_type);
    function updateEvent($event_name, $event_type, $id);
    function deleteEvent($id);
}