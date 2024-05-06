<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_code',
        'title',
        'name_of_faculty',
        'date_time',
        'room_or_venue',
    ];
}
