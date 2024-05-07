<?php

namespace App\Repositories\Interface;

interface IClassAttendanceLogRepository
{
    function getAllClassAttendanceLog();
    function getClassAttendanceLogById($id);
    function createClassAttendanceLog($name, $class_attendance_id);
    function updateClassAttendanceLog($name, $class_attendance_id, $id);
    function deleteClassAttendanceLog($id);
    
    function getAllClassAttendanceLogByClassAttendanceId($class_attendance_id);
}
