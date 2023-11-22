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
    static ?Collection $category_ids = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (BookFactory::$author_ids == null)
            BookFactory::$author_ids = Author::pluck('id');
        if (BookFactory::$category_ids == null)
            BookFactory::$category_ids = Category::pluck('id');

        return [
            'title' => fake()->realText(20),
            'description' => fake()->realText(),
            'isOwned' => fake()->boolean(),
            'author_id' => BookFactory::$author_ids->random(),
            'category_id' => BookFactory::$category_ids->random(),
        ];
    }
}
