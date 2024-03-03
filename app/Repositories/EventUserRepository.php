<?php

namespace App\Repositories;

use App\Models\EventUser;
use App\Repositories\Interface\IEventUserRepository;

class EventUserRepository implements IEventUserRepository
{

    function getAllEventUsers()
    {
        $eventUsers = EventUser::get();
        return $eventUsers;
    }

    function getAllEventUsersByEventId($event_id)
    {
        $eventUsers = EventUser::where('event_id', $event_id)->get();
        return $eventUsers;
    }

    function createEventUsers($event_id, $user_ids)
    {
        $eventUsers = [];

        foreach ($user_ids as $user_id)
        {
            $eventUser = EventUser::create([
                'event_id' => $event_id,
                'user_id' => $user_id,
            ]);

            $eventUsers[] = $eventUser;
        }

        return $eventUsers;
    }
}