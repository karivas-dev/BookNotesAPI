<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    static  ?Collection $author_ids = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (BookFactory::$author_ids == null)
            BookFactory::$author_ids = Author::pluck('id');

        return [
            'title' => fake()->realText(20),
            'description' => fake()->realText(),
            'author_id' => BookFactory::$author_ids->random(),
        ];
    }
}
