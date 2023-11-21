<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookUser>
 */
class BookUserFactory extends Factory
{
    static ?Collection $user_ids = null;
    static ?Collection $book_ids = null;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (BookUserFactory::$user_ids == null)
            BookUserFactory::$user_ids = User::pluck('id');

        if (BookUserFactory::$book_ids == null)
            BookUserFactory::$user_ids = Book::pluck('id');

        return [
            'user_id' => BookUserFactory::$user_ids->random(),
            'book_id' => BookUserFactory::$book_ids->random(),
            'isOwned' => fake()->boolean()
        ];
    }
}
