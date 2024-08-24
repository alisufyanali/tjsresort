<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('locations')->insert([
            [
                'location_name' => 'Houston, TX',
                'slug' => 'houston',
                'featured' => 1,
                'children' => 50,
                'adult' => 50,
                'pet' => 50,
                'per_night_charges' => 100.00,
                'daily' => 100.00,
                'weekly' => 160.00,
                'monthly' => 200.00,
                'description' => 'Secure parking with electric fence, 24/7 access, bright lighting at night, and security images.',
                'location_images' => json_encode(['location-details-.jpg', 'location-details.jpg']),
                'featured_image' => 'location-1.jpg',
                'location_services' => 'Electric fence , 24/7 access , Bright lighting , Security',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Dallas, TX',
                'slug' => 'dallas',
                'featured' => 1,
                'children' => 20,
                'adult' => 20,
                'pet' => 20,
                'per_night_charges' => 120.00,
                'daily' => 120.00,
                'weekly' => 160.00,
                'monthly' => 300.00,
                'description' => 'Parking available with CCTV surveillance, gated entry, and security patrols.',
                'location_images' => json_encode(['location-details-.jpg', 'location-details.jpg']),
                'featured_image' => 'location-2.jpg',
                'location_services' => 'CCTV surveillance , Gated entry , Security patrols',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Austin, TX',
                'slug' => 'austin',
                'featured' => 1,
                'children' => 30,
                'adult' => 30,
                'pet' => 30,
                'per_night_charges' => 110.00,
                'daily' => 110.00,
                'weekly' => 160.00,
                'monthly' => 200.00,
                'description' => 'Affordable parking with ample space and easy access to major highways.',
                'location_images' => json_encode(['location-details-.jpg', 'location-details.jpg']),
                'featured_image' => 'location-3.jpg',
                'location_services' => 'Ample space , Easy highway access',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
