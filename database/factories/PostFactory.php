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
    public function definition()
    {   
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->text(),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'category_id' => rand(1,6), 
            'user_id' => rand(1,11),

        ];
    }
}
