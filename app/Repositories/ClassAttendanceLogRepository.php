<?php

namespace App\Repositories;

use App\Helper\Helper;
use Carbon\Carbon;
use App\Models\ClassAttendanceLog;
use App\Repositories\Interface\IClassAttendanceLogRepository;

class ClassAttendanceLogRepository implements IClassAttendanceLogRepository
{

    function getAllClassAttendanceLog()
    {
        $classAttendanceLog = ClassAttendanceLog::get();
        return $classAttendanceLog;
    }

    function getClassAttendanceLogById($id)
    {
        $classAttendanceLog = ClassAttendanceLog::findOrFail($id);
        return $classAttendanceLog;
    }

    function createClassAttendanceLog($user_id, $name, $class_attendance_id)
    {
        $classAttendanceLog = ClassAttendanceLog::create([
            'user_id' => $user_id,
            'name' => $name,
            'class_attendance_id' => $class_attendance_id,
        ]);

        return $classAttendanceLog;
    }

    function updateClassAttendanceLog($user_id, $name, $class_attendance_id, $id)
    {
        $classAttendanceLog = ClassAttendanceLog::findOrFail($id);

        $classAttendanceLog->user_id = $user_id;
        $classAttendanceLog->name = $name;
        $classAttendanceLog->class_attendance_id = $class_attendance_id;
        $classAttendanceLog->updated_at = Carbon::now();
        $classAttendanceLog->save();

        return $classAttendanceLog;
    }

    function deleteClassAttendanceLog($id)
    {
        $classAttendanceLog = ClassAttendanceLog::findOrFail($id);
        $classAttendanceLog->delete();

        return $classAttendanceLog;
    }

    function getAllClassAttendanceLogByClassAttendanceId($class_attendance_id)
    {
        $classAttendanceLog = ClassAttendanceLog::where('class_attendance_id', $class_attendance_id)->get();
        return $classAttendanceLog;
    }
}
