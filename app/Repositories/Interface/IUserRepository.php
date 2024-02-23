<?php

namespace App\Repositories\Interface;

interface IUserRepository
{

    function getUserByEmail($email);
}