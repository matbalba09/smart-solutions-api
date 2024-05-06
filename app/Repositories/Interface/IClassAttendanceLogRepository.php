<?php

namespace App\Repositories\Interface;

interface IClassAttendanceLogRepository
{
    function getAllClassAttendanceLog();
    function getClassAttendanceLogById($id);
    function createClassAttendanceLog($name);
    function updateClassAttendanceLog($name, $id);
    function deleteClassAttendanceLog($id);
}