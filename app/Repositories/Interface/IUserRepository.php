<?php

namespace App\Repositories\Interface;

interface IUserRepository
{
    function getUserByEmail($email);
    function registerUserFp($fp_user, $id);
    function getUserFpByUserId($id);
    function getAllUsers();
    function getUserByName($name);
}