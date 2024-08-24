<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageTestimonial extends Model
{
    use HasFactory;
    protected $table = 'homepage_testimonial';

    protected $fillable = [
        'comment',
        'name',
        'postion',
        'image',
    ];
    
}
