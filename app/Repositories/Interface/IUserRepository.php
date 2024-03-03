<?php

namespace App\Repositories\Interface;

interface IUserRepository
{
    function getAllUsers();
    function getUserById($id);
    function getUserByEmail($email);
    function registerUserFp($fp_user, $id);
    function getUserFpByUserId($id);
    function getUserByName($name);
}