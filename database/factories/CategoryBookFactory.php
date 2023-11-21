<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryBook>
 */
class CategoryBookFactory extends Factory
{
    static ?Collection $book_ids = null;
    static ?Collection $category_ids = null;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (CategoryBookFactory::$category_ids == null)
            CategoryBookFactory::$category_ids = Category::pluck('id');
        if (CategoryBookFactory::$book_ids == null)
            CategoryBookFactory::$book_ids = Book::pluck('id');

        return [
            'category_id' => CategoryBookFactory::$category_ids->random(),
            'book_id' => CategoryBookFactory::$book_ids->random()
        ];
    }
}
