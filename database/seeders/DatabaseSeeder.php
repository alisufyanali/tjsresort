<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LocationsTableSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CoupenSeeder::class);
        $this->call(ReservationsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(HomepageContentSeeder::class);
        $this->call(HomepageTestimonialSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(EmailSettingSeeder::class);

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
