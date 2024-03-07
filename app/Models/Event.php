<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_type',
        'start_date',
        'end_date',
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}