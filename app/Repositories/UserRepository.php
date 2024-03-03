<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\IUserRepository;
use Carbon\Carbon;

class UserRepository implements IUserRepository{

    function getUserByEmail($email){

        $user = User::where('email', $email)->first();
        return $user;
    }

    function updateUser($fp_user,$id){

        $user = User::findOrFail($id);

        $user->fp_user = $fp_user;
        $user->updated_at = Carbon::now();
        $user->save();

        return $user;
    }
}