<?php

namespace App\Repositories\Interface;

use App\Http\Requests\UpdateClassAttendanceRequest;

interface IClassAttendanceRepository
{
    function getAllClassAttendance();
    function getClassAttendanceById($id);
    function createClassAttendance($course_code, $title, $name_of_faculty, $date_time, $room_or_venue);
    function updateClassAttendance(UpdateClassAttendanceRequest $request, $id);
    function deleteClassAttendance($id);
}