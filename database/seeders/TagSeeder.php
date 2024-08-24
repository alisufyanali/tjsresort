<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tags = [
            ['name' => 'Holidays'],
            ['name' => 'Food & Drink'],
            ['name' => 'Hotels'],
            ['name' => 'Activites'],
            ['name' => 'Travel Tips'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
