<?php
// app/Models/Price.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'daily', 'weekly', 'monthly'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
