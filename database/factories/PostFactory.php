<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
                        'title' => $this->faker->sentence(7),
                        'user_id'=>User::factory(),
                        'slug' => Str::slug($this->faker->name),
                        'excerpt' => $this->faker->sentence(25),
                        'body' => $this->faker->paragraph(100),
                        'image_url' => $this->faker->image('public/storage/images',640,480, null, false)
        ];
    }
}
