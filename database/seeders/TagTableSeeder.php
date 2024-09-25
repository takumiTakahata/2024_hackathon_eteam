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
        $tags = ['洗濯', '洗い物', '掃除', '買い物', '食事', 'その他',];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
