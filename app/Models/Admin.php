<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'password',
        'fp_user',
    ];

    protected $hidden = [
        'password',
    ];
    
    protected $casts = [
        'password' => 'hashed',
    ];
}
