<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('events')->insert([
            [
                'open_time' => '8:00',
                'close_time' => '8:00',
                'image' => 'event-details-1.jpg',
                'title' => 'Anneversay of resort celebration in 12th aug. night',
                'start_date' => '2024-02-12',
                'start_date' => '2024-12-12',
                'location' => '56, Marborne, Hilltown Resort, NY 18565',
                'schedule' => '9:00 am Breakfast
                               11:00 am Global Meeting
                               1:00 pm Introductory networking session',
                'description' => 'totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo...',
                'more_about_event' => '- Nam libero tempore, cum soluta nobis est eligendi opti
                                       - Wumque nihil impedit quo minus id quod maxime placeat facere
                                       - Uossimus, omnis Ut enim ad minima veniam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more events here
        ]);
    }
}
