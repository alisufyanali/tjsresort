<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomepageTestimonial;

class HomepageTestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        HomepageTestimonial::create([
            'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'name' => 'John Doe',
            'postion' => 'CEO of Minda',
            'image' => 'testimonials/client-1.png',
        ]);

        HomepageTestimonial::create([
            'comment' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'name' => 'Jane Smith',
            'postion' => 'CFO of TechCorp',
            'image' => 'testimonials/client-1.png',
        ]);
        
        HomepageTestimonial::create([
            'comment' => 'eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'name' => 'Sarah',
            'postion' => 'CFO of TechCorp',
            'image' => 'testimonials/client-1.png',
        ]);
    }
}
