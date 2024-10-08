<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\UpdateClassAttendanceRequest;
use Carbon\Carbon;
use App\Models\ClassAttendance;
use App\Repositories\Interface\IClassAttendanceRepository;
use App\Response;

class ClassAttendanceRepository implements IClassAttendanceRepository
{

    function getAllClassAttendance()
    {
        $dateNow = Helper::getDateNow();
        $classAttendance = ClassAttendance::selectRaw('class_attendances.*, CASE 
                WHEN ? > class_attendances.date_time THEN \'COMPLETED\' 
                ELSE NULL
                END as status')
            ->setBindings([$dateNow])
            ->where('is_deleted', Response::FALSE)->get();
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
            'is_deleted' => Response::FALSE,
        ]);

        return $classAttendance;
    }

    function updateClassAttendance(UpdateClassAttendanceRequest $request, $id)
    {
        $validatedData = $request->validated();
        $classAttendance = ClassAttendance::findOrFail($id);
        $classAttendance->update($validatedData);

        return $classAttendance;
    }

    function deleteClassAttendance($id)
    {
        $classAttendance = ClassAttendance::findOrFail($id);
        $classAttendance->delete();

        return $classAttendance;
    }

    function getAllDeletedClassAttendance()
    {
        $classAttendance = ClassAttendance::where('is_deleted', Response::TRUE)->get();
        return $classAttendance;
    }
}
