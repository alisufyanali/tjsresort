<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResortSocialLinks extends Model
{
    use HasFactory;

    protected $table = 'resort_social_links';

    protected $fillable = ['name', 'link', 'location_id'];
}
