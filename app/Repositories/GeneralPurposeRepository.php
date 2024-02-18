<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\GeneralPurpose;
use App\Repositories\Interface\IGeneralPurposeRepository;

class GeneralPurposeRepository implements IGeneralPurposeRepository{

    function getGeneralPurpose(){

        $generalPurpose = GeneralPurpose::get();

        return $generalPurpose;
    }

    function createGeneralPurpose($name){
        
        $generalPurpose = GeneralPurpose::create([
            'name' => $name,
        ]);

        return $generalPurpose;
    }

    function updateGeneralPurpose($name, $id){

        $generalPurpose = GeneralPurpose::findOrFail($id);

        $generalPurpose->name = $name;
        $generalPurpose->updated_at = Carbon::now();
        $generalPurpose->save();

        return $generalPurpose;
    }

    function deleteGeneralPurpose($id){
        $generalPurpose = GeneralPurpose::findOrFail($id);
        $generalPurpose->delete();
        
        return $generalPurpose;
    }
}