<?php

namespace App\Repositories\Interface;

use App\Http\Requests\UpdateClassAttendanceLogRequest;

interface IClassAttendanceLogRepository
{
    function getAllClassAttendanceLog();
    function getClassAttendanceLogById($id);
    function createClassAttendanceLog($user_id, $name, $class_attendance_id);
    function updateClassAttendanceLog(UpdateClassAttendanceLogRequest $request, $id);
    function deleteClassAttendanceLog($id);
    
    function getAllClassAttendanceLogByClassAttendanceId($class_attendance_id);
}
