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
        $eventUsers = EventUser::with(['user' => function ($query) {
            $query->select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email', 'created_at', 'updated_at');
        }])
            ->selectRaw('event_users.*, IF(logs.id IS NOT NULL, TRUE, FALSE) AS isPresent')
            ->leftJoin('logs', function ($join) use ($event_id) {
                $join->on('event_users.user_id', '=', 'logs.user_id')
                    ->on('logs.event_id', '=', $event_id);
            })
            ->where('event_users.event_id', $event_id)
            ->orderBy('event_users.user_id')
            ->get();

        return $eventUsers;
    }

    function createEventUsers($event_id, $user_ids)
    {
        $eventUsers = [];

        foreach ($user_ids as $user_id) {
            $eventUser = EventUser::create([
                'event_id' => $event_id,
                'user_id' => $user_id,
            ]);

            $eventUsers[] = $eventUser;
        }
        return $eventUsers;
    }

    function getAllFpUsersByEventId($event_id)
    {
        $eventUsers = EventUser::with(['user' => function ($query) {
            $query->select('id', 'fp_user');
        }])
            ->where('event_id', $event_id)
            ->get()
            ->map(function ($eventUser) {
                return [
                    'id' => $eventUser->user->id,
                    'fp_user' => $eventUser->user->fp_user,
                ];
            });

        return $eventUsers->toArray();
    }
}