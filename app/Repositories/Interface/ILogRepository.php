<?php

namespace App\Repositories\Interface;

interface ILogRepository
{
    function getAllLogs();
    function createLog($event_id, $user_id, $log_type);
    function deleteLog($id);
    function getLogByEventIdAndUserId($event_id, $user_id);
    function getAllLogsByEventId($event_id);
}
