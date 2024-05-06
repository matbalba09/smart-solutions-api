<?php

namespace App\Repositories;

use App\Helper\Helper;
use Carbon\Carbon;
use App\Models\ClassAttendance;
use App\Repositories\Interface\IClassAttendanceRepository;

class ClassAttendanceRepository implements IClassAttendanceRepository
{

    function getAllClassAttendance()
    {
        $classAttendance = ClassAttendance::get();
        return $classAttendance;
    }

    function getClassAttendanceById($id)
    {
        $classAttendance = ClassAttendance::findOrFail($id);
        return $classAttendance;
    }

    function createClassAttendance($course_code, $title, $name_of_faculty, $date_time, $room_or_venue)
    {
        $classAttendance = ClassAttendance::create([
            'course_code' => $course_code,
            'title' => $title,
            'name_of_faculty' => $name_of_faculty,
            'date_time' => $date_time,
            'room_or_venue' => $room_or_venue,
        ]);

        return $classAttendance;
    }

    function updateClassAttendance($course_code, $title, $name_of_faculty, $date_time, $room_or_venue, $id)
    {
        $classAttendance = ClassAttendance::findOrFail($id);

        $classAttendance->course_code = $course_code;
        $classAttendance->title = $title;
        $classAttendance->name_of_faculty = $name_of_faculty;
        $classAttendance->date_time = $date_time;
        $classAttendance->room_or_venue = $room_or_venue;
        $classAttendance->updated_at = Carbon::now();
        $classAttendance->save();

        return $classAttendance;
    }

    function deleteClassAttendance($id)
    {
        $classAttendance = ClassAttendance::findOrFail($id);
        $classAttendance->delete();

        return $classAttendance;
    }
}
