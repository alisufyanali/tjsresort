<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prices')->insert([
            [
                'location_id' => 1, // Make sure this ID exists in your locations table
                'daily' => 100.00,
                'weekly' => 160.00,
                'monthly' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_id' => 2, // Make sure this ID exists in your locations table
                'daily' => 120.00,
                'weekly' => 170.00,
                'monthly' => 220.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'location_id' => 3, // Make sure this ID exists in your locations table
                'daily' => 110.00,
                'weekly' => 180.00,
                'monthly' => 230.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
