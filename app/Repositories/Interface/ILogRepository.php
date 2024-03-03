<?php

namespace App\Repositories\Interface;

interface ILogRepository
{
    function getAllLogs();
    function createLog($event_id, $user_id);
    function deleteLog($id);
}