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

    function createLog($event_id, $user_id)
    {
        $log = Log::create([
            'event_id' => $event_id,
            'user_id' => $user_id,
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
}
