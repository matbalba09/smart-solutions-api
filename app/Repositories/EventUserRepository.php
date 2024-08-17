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
            $query->select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email', 'gender', 'mobile_number', 'branch', 'user_type', 'is_active', 'created_at', 'updated_at', 'designation');
        }])
            ->selectRaw('event_users.*, CASE WHEN logs.id IS NOT NULL THEN TRUE ELSE FALSE END AS "isPresent"')
            ->leftJoin('logs', function ($join) use ($event_id) {
                $join->on('event_users.user_id', '=', 'logs.user_id')
                    ->where('logs.event_id', '=', $event_id);
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
            $oldEventUser = EventUser::where('event_id', $event_id)->where('user_id', $user_id)->first();
            if ($oldEventUser){
                $oldEventUser->delete();
            }

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
