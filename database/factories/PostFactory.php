<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => rand(1, 5),
            'title' => fake()->sentence(),
            'short_content' => fake()->sentence(15),
            'content' => fake()->paragraphs(5, true),
            'photo' => fake()->imageUrl(640, 480, 'post', true),
        ];
    }
}
