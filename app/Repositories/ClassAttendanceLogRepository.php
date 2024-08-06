<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\UpdateClassAttendanceLogRequest;
use Carbon\Carbon;
use App\Models\ClassAttendanceLog;
use App\Repositories\Interface\IClassAttendanceLogRepository;

class ClassAttendanceLogRepository implements IClassAttendanceLogRepository
{

    function getAllClassAttendanceLog()
    {
        $classAttendanceLog = ClassAttendanceLog::with('user')->get();
        foreach ($classAttendanceLog as $log) {
            $log->user->makeHidden('fp_user');
        }
        return $classAttendanceLog;
    }

    function getClassAttendanceLogById($id)
    {
        $classAttendanceLog = ClassAttendanceLog::with('user')->findOrFail($id);
        $classAttendanceLog->user->makeHidden('fp_user');
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

    function updateClassAttendanceLog(UpdateClassAttendanceLogRequest $request, $id)
    {
        $validatedData = $request->validated();
        $classAttendanceLog = ClassAttendanceLog::findOrFail($id);
        $classAttendanceLog->update($validatedData);

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
        $classAttendanceLog = ClassAttendanceLog::with('user')->where('class_attendance_id', $class_attendance_id)->get();
        foreach ($classAttendanceLog as $log) {
            $log->user->makeHidden('fp_user');
        }
        return $classAttendanceLog;
    }

    function getByClassAttendanceIdAndUserId($id, $userid)
    {
        $classAttendanceLog = ClassAttendanceLog::with('user')->where('class_attendance_id', $id)
            ->where('user_id', $userid)
            ->first();

        if ($classAttendanceLog) {
            $classAttendanceLog->user->makeHidden('fp_user');
            return $classAttendanceLog;
        } else {
            return null;
        }
    }
}
