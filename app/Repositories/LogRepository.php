<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Log;
use App\Repositories\Interface\ILogRepository;

class LogRepository implements ILogRepository
{

    function getAllLogs()
    {
        $logs = Log::get();
        return $logs;
    }

    function createLog($event_id, $user_id, $log_type)
    {
        $log = Log::create([
            'event_id' => $event_id,
            'user_id' => $user_id,
            'log_type' => $log_type,
        ]);

        return $log;
    }

    function deleteLog($id)
    {
        $log = Log::findOrFail($id);
        $log->delete();

        return $log;
    }

    function getLogByEventIdAndUserId($event_id, $user_id,)
    {
        $log = Log::where('event_id', $event_id)
            ->where('user_id', $user_id)
            ->first();
        return $log;
    }

    function getAllLogsByEventId($event_id)
    {
        $logs = Log::with(['user' => function ($query) {
            $query->select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email', 'created_at', 'updated_at', 'designation');
        }])
            ->selectRaw('logs.*')
            ->leftJoin('users', function ($join) use ($event_id) {
                $join->on('users.id', '=', 'logs.user_id');
            })
            ->where('logs.event_id', $event_id)
            ->get();

        return $logs;
    }
}