<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'open_time', 
        'close_time', 
        'start_date', 
        'end_date', 
        'title', 
        'location', 
        'schedule', 
        'description', 
        'more_about_event', 
        'image'
    ];
}
