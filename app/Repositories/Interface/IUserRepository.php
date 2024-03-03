<?php

namespace App\Repositories\Interface;

interface IUserRepository
{

    function getUserByEmail($email);
    function updateUser($fp_user,$id);
}