<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $tags = ['Laravel', 'PHP', 'JavaScript', 'Vue.js', 'React', 'CSS', 'HTML'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
