<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Setting::create([
            'user_id' => 1,  // Assuming the user with ID 1 exists
            'logo' => 'public/assets/img/logo.png',
            'favicon' => 'public/assets/img/logo.png',
            'sliders' => 'public/assets/img/home-slider/slider-5.jpg,public/assets/img/home-slider/slider-6.jpg,public/assets/img/home-slider/slider-7.jpg',
            'address' => '1234 Main St, Anytown, USA',
            'contact_no' => '123-456-7890',
            'email' => 'info@example.com',
            'meta_tags' => 'example,site,meta,tags',
        ]);
    }
}
