<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->jobTitle,
            'excerpt' => $this->faker->paragraph(5,true),
            'body' => $this->faker->paragraph(30,true),
            'slug' => $this->faker->slug,
            'image' => 'https://picsum.photos/seed/picsum/800/800',

        ];
    }
}
