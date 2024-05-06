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

    function createClassAttendanceLog($name)
    {
        $classAttendanceLog = ClassAttendanceLog::create([
            'name' => $name,
        ]);

        return $classAttendanceLog;
    }

    function updateClassAttendanceLog($name, $id)
    {
        $classAttendanceLog = ClassAttendanceLog::findOrFail($id);

        $classAttendanceLog->name = $name;
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
}
