<?php

namespace App\Repositories\Interface;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateUserRequest;

interface IUserRepository
{
    function getAllUsers();
    function getUserById($id);
    function getUserByEmail($email);
    function getUserBySrCode($sr_code);
    function registerUserFp($fp_user, $id);
    function getUserFpByUserId($id);
    function getUserByName($name);
    function getAllUserByDepartment($department);
    function getAllUserByYearLevel($year_level);
    function getAllUserFpUsers();
    function updateUser(UpdateUserRequest $request, $id);

    function updateAdmin(AdminRequest $request, $id);
}