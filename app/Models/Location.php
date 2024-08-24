<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name',
        'featured',
        'per_night_charges',
        'description',
        'location_images',
        'featured_image',
        'location_services',
    ];

    protected $casts = [
        'location_images' => 'array',
    ];

    public function prices()
    {
        return $this->hasOne(Price::class);
    }
}
