<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Faker\Factory as Faker;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        // Generate 10 reservations
        for ($i = 0; $i < 10; $i++) {
            Reservation::create([
                'date_in' => $faker->date(),
                'date_out' => $faker->date(),
                'nights' => $faker->numberBetween(1, 7),
                'truck_number' => $faker->bothify('??#-###'),
                'truck_color' => $faker->safeColorName(),
                'number_of_spaces' => $faker->numberBetween(1, 5),
                'total_price' => $faker->randomFloat(2, 50, 200),
                'grand_price' => $faker->randomFloat(2, 200, 500),
                'coupon_id' => $faker->numberBetween(1, 2), // Assuming you have coupons seeded already
                'location_id' => $faker->numberBetween(1, 3), // Assuming you have locations seeded already
                'payment_method' => $faker->randomElement(['Card',  'Cash']),
                'user_id' => $faker->numberBetween(2, 3), // Assuming you have user seeded already
                'stripe_response' => $faker->text(),
            ]);
        }
    }
}
