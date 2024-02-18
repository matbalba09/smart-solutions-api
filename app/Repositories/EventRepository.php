<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Event;
use App\Repositories\Interface\IEventRepository;

class EventRepository implements IEventRepository{

    function getEvent(){

        $generalPurpose = Event::get();

        return $generalPurpose;
    }

    function createEvent($name){
        
        $generalPurpose = Event::create([
            'name' => $name,
        ]);

        return $generalPurpose;
    }

    function updateEvent($name, $id){

        $generalPurpose = Event::findOrFail($id);

        $generalPurpose->name = $name;
        $generalPurpose->updated_at = Carbon::now();
        $generalPurpose->save();

        return $generalPurpose;
    }

    function deleteEvent($id){
        $generalPurpose = Event::findOrFail($id);
        $generalPurpose->delete();
        
        return $generalPurpose;
    }
}