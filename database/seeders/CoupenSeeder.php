<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;
use Faker\Factory as Faker;

class CoupenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        // Generate 5 coupons
        for ($i = 0; $i < 2; $i++) {
            Coupon::create([
                'code' => $faker->unique()->lexify('??????'),
                'discount' => $faker->randomFloat(2, 5, 20),
                'discount_type' => 'percent',
                'discount_usage' => 20,
                'expiry_date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            ]);
        }
    }
}
