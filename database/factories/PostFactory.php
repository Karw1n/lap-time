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
            'title' => fake()->unique()->sentence(),
            'excerpt' => fake()->realText($maxNbChars = 50),
            'body' => fake()->text(),
            'image' => fake()->imageUrl(640,480),
            'user_id' => 1
        ];
    }
}
