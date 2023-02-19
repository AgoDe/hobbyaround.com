<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $title = fake()->sentence(3);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug'  => $slug,
            'body'  => fake()->text(),
            'user_id' => fake()->numberBetween(1, 100)
        ];
    }
}
