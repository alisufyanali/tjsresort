<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomepageContent;


class HomepageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        HomepageContent::create([
            'main_heading' => 'RESERVE A SPOT NOW',
            'sub_heading' => 'ESCAPE THE HIGHWAY CHAOS AND DOWN SHIFT AT TJ’S TRUCK RESORT',
            'banner' => 'images/slider-2.jpg',
            'intro_decs' => '<h4> WE ARE AVAILABLE FOR BUSINESS </h4>  <p> quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam. quis nostrum exerci-tationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi con-sequatur? Quis autem vel eum iure reprehenderit qui in ea volup </p>.',
            'intro_icon_1' => 'fa-solid fa-paw',
            'intro_name_1' => 'DOG PARK/WASH',
            'intro_icon_2' => 'fa-solid fa-water-ladder',
            'intro_name_2' => 'SWIMMING POOL',
            'intro_icon_3' => 'fa-solid fa-wifi',
            'intro_name_3' => 'FREE WIFI',

            'intro_img_back' => 'images/introduction-img2.jpg',
            'intro_img_front' => 'images/introduction-img3.jpg',

            'why_us' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum?',
            'why_us_services' => 'Wellness & poll , Free wifi , Bar & garden with terrace , Delicious breakfast , HIgh customer satisfaction , Good parking & security , Clean Location service , Discount coupons',
            
            'why_us_img_1' => 'images/pexels-donaldtong94-189296.jpg',
            'why_us_img_2' => 'images/pexels-pixabay-258154.jpg',
            'why_us_img_3' => 'images/pexels-kampus-7967392.jpg'
            ,
            'virtual_link' => 'https://www.youtube.com/watch?v=48uPk1SA37Y',
            'virtual_img' => 'images/pexels-donaldtong94-189296.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
