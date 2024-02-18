<?php

namespace App\Repositories\Interface;

interface IGeneralPurposeRepository
{

    function getGeneralPurpose();
    function createGeneralPurpose($name);
    function updateGeneralPurpose($name, $id);
    function deleteGeneralPurpose($id);
}