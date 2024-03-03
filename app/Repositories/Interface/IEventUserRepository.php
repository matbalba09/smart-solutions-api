<?php

namespace App\Repositories\Interface;

interface IEventUserRepository
{
    function getAllEventUsers();
    function getAllEventUsersByEventId($event_id);
    function createEventUsers($event_id, $user_id);
}