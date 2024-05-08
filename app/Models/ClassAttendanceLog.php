<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAttendanceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'class_attendance_id',
    ];
}
