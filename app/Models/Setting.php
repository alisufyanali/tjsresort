<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;


    protected $table = 'settings';

    protected $fillable = ['logo','favicon','meta_tags','email','address','contact_no','sliders','user_id' , 'coming_soon_visible'];
}
