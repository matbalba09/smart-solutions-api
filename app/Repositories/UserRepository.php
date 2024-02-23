<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\IUserRepository;

class UserRepository implements IUserRepository{

    function getUserByEmail($email){

        $user = User::where('email', $email)->first();
        return $user;
    }
}