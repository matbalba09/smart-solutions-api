<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\IUserRepository;
use Carbon\Carbon;

class UserRepository implements IUserRepository
{

    function getAllUsers()
    {
        $users = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email', 'created_at', 'updated_at')
        ->get();
        return $users;
    }

    function getUserById($id)
    {
        $user = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email', 'created_at', 'updated_at')
        ->findOrFail($id);
        return $user;
    }

    function getUserByEmail($email)
    {
        $user = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email', 'created_at', 'updated_at')
        ->where('email', $email)->first();
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
        $users = User::select('id', 'name', 'sr_code', 'year_level', 'department', 'gsuite_email', 'created_at', 'updated_at')
        ->where('name', 'LIKE', '%' . $name . '%')->get();
        return $users;
    }
}