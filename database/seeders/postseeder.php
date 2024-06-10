<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(20)->create();

//        Post::create([
//            'user_id'=>'1',
//            'title'=>"Sarlovha",
//            'short_content'=>'short_content',
//            'contents'=>'malimi contenet',
//            'photo'=> null,
//        ]);

    }
}
