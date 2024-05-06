<?php

namespace App\Repositories\Interface;

interface IClassAttendanceRepository
{
    function getAllClassAttendance();
    function getClassAttendanceById($id);
    function createClassAttendance($course_code, $title, $name_of_faculty, $date_time, $room_or_venue);
    function updateClassAttendance($course_code, $title, $name_of_faculty, $date_time, $room_or_venue, $id);
    function deleteClassAttendance($id);
}