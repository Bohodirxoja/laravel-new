<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>'1',
            'category_id'=> rand(1,5),
            'title'=>fake()->sentence(),
            'short_content'=> fake()->sentence(10),
            'contents'=>fake()->paragraph(5),
        ];
    }
}

//            'title'=>"Sarlovha",
//            'short_content'=>'short_content',
//            'contents'=>'malimi contenet',
//            'photo'=> null,
