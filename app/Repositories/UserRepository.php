<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\IUserRepository;
use Carbon\Carbon;

class UserRepository implements IUserRepository
{

    function getAllUsers()
    {
        $users = User::get();
        return $users;
    }

    function getUserByEmail($email)
    {
        $user = User::where('email', $email)->first();
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
        return $user->fp_user;
    }

    function getUserByName($name)
    {
        $users = User::where('name', 'LIKE', '%' . $name . '%')->get();
        return $users;
    }
}