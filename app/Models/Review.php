<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Add the fillable property
    protected $fillable = ['name', 'email', 'rating', 'message' , 'location_id' ,'approved'];
}
