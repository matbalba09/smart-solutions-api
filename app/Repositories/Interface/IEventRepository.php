<?php

namespace App\Repositories\Interface;

interface IEventRepository
{

    function getEvent();
    function createEvent($name);
    function updateEvent($name, $id);
    function deleteEvent($id);
}