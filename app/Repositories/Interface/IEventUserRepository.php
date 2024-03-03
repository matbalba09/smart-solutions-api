<?php

namespace App\Repositories\Interface;

interface IEventUserRepository
{

    function getAllEventUsers();
    function getAllEventUsersByEventId($event_id);
    function createEventUser($event_id,$user_id);
}