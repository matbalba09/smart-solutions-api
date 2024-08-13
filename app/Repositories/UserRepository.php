<?php

namespace App\Repositories;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\Interface\IUserRepository;
use Carbon\Carbon;

class UserRepository implements IUserRepository
{

    function getAllUsers()
    {
        $users = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email', 'gender', 'mobile_number', 'branch', 'user_type', 'created_at', 'updated_at', 'is_active')
            ->get();
        return $users;
    }

    function getUserById($id)
    {
        $user = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email',  'gender', 'mobile_number', 'branch', 'user_type', 'created_at', 'updated_at', 'is_active')
            ->findOrFail($id);
        return $user;
    }

    function getUserByEmail($email)
    {
        $user = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email',  'gender', 'mobile_number', 'branch', 'user_type', 'created_at', 'updated_at', 'is_active')
            ->where('gsuite_email', $email)->first();
        return $user;
    }

    function getUserBySrCode($sr_code)
    {
        $user = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email',  'gender', 'mobile_number', 'branch', 'user_type', 'created_at', 'updated_at', 'is_active')
            ->where('sr_code', $sr_code)->first();
        return $user;
    }

    function registerUserFp($fp_user, $id)
    {
        $user = User::findOrFail($id);

        $user->fp_user = $fp_user;
        $user->updated_at = Carbon::now();
        $user->save();

        return $user;
    }

    function getUserFpByUserId($id)
    {
        $user = User::where('id', $id)->first();
        return $user;
    }

    function getUserByName($name)
    {
        $users = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email',  'gender', 'mobile_number', 'branch', 'user_type', 'created_at', 'updated_at', 'is_active')
            ->where('name', 'LIKE', '%' . $name . '%')->get();
        return $users;
    }

    function getAllUserByDepartment($department)
    {
        $users = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email',  'gender', 'mobile_number', 'branch', 'user_type', 'created_at', 'updated_at', 'is_active')
            ->where('department', $department)->get();
        return $users;
    }

    function getAllUserByYearLevel($year_level)
    {
        $users = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email',  'gender', 'mobile_number', 'branch', 'user_type', 'created_at', 'updated_at', 'is_active')
            ->where('year_level', $year_level)->get();
        return $users;
    }

    function getAllUserFpUsers()
    {
        $users = User::get();
        return $users;
    }

    function updateUser(UpdateUserRequest $request, $id)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);
        $user->update($validatedData);

        return $user;
    }

    function updateAdmin(AdminRequest $request, $id)
    {
        $validatedData = $request->validated();
        $admin = Admin::findOrFail($id);
        $admin->update($validatedData);

        return $admin;
    }
}
