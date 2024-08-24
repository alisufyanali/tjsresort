<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $blogId = DB::table('blogs')->first()->id; // Get the first blog's ID

        $comments = [
            [
                'blog_id' => $blogId,
                'author' => 'John Doe',
                'email' => 'john@example.com',
                'comment' => 'Great post!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_id' => $blogId,
                'author' => 'Jane Doe',
                'email' => 'jane@example.com',
                'comment' => 'Very informative.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more comments as needed
        ];

        DB::table('comments')->insert($comments);
    }
}
