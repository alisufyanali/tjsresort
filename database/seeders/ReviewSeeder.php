<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'rating' => 5,
            'message' => 'The service at this parking location is exceptional. The staff were extremely helpful and made sure that my truck was parked securely. The area is well-lit and has a strong electric fence, making me feel safe leaving my vehicle here. Highly recommend!' ,
            'location_id' => 1 ,
            'approved' => 1 
        ]);

        Review::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'rating' => 4,
            'message' => 'Overall, I had a very good experience at this parking lot. The location is convenient and the security measures are solid. However, there was a minor delay during check-in, which is why I am giving it 4 stars instead of 5. Still, I would definitely use their services again.',
            'location_id' => 1 ,
            'approved' => 1
        ]);

        Review::create([
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'rating' => 3,
            'message' => 'Average experience, nothing special.',
            'location_id' => 1 ,
            'approved' => 1
        ]);

        
        
        
        Review::create([
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'rating' => 3,
            'message' => 'My experience was average. While the location is good and the facilities are adequate, I found the pricing to be a bit high for what is offered. Additionally, the lighting at night could be better. It was a decent experience, but there is room for improvement.',
            'location_id' => 2 ,
            'approved' => 1
        ]);

        Review::create([
            'name' => 'Alice Brown',
            'email' => 'alice@example.com',
            'rating' => 5,
            'message' => 'I was very impressed with the parking services provided. The 24/7 access is a huge plus for me, and the security features like the electric fence and surveillance cameras are top-notch. The staff were friendly and efficient. I will definitely be using this service regularly.',
            'location_id' => 2 ,
            'approved' => 1
        ]);


        Review::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'rating' => 5,
            'message' => 'Great service, highly recommend!',
            'location_id' => 2 ,
            'approved' => 1
        ]);

        Review::create([
            'name' => 'Charlie Davis',
            'email' => 'charlie@example.com',
            'rating' => 4,
            'message' => 'Good overall experience. The location in Houston is excellent and easy to find. The parking spaces are well-maintained and the security is reassuring. However, I did notice that the restroom facilities could use some improvement. Other than that, I was satisfied with the service.',
            'location_id' => 3 ,
            'approved' => 1
        ]);

        Review::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'rating' => 4,
            'message' => 'Very good, but could improve in some areas.',
            'location_id' => 3 ,
            'approved' => 1
        ]);

        
    }
}
