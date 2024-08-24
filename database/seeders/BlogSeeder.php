<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('blogs')->insert([
            'title' => 'Sample Blog Post',
            'content' => 'This is a sample blog post content.',
            'category_id' => 1, // Adjust the category ID based on your categories
            'featured_image' => 'path/to/featured_image.jpg', // Replace with actual path
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
