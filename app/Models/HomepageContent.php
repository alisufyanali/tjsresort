<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $table = 'homepage_content';

    protected $fillable = [
        'spec_of_resort',
        'spec_of_resort_1_img',
        'spec_of_resort_1_content',
        'spec_of_resort_2_img',
        'spec_of_resort_2_content',
        'spec_of_resort_3_img',
        'spec_of_resort_3_content',
        'virtual_link',
        'virtual_count_1',
        'virtual_count_2',
        'virtual_count_3',
        'virtual_count_4',
    ];
}
