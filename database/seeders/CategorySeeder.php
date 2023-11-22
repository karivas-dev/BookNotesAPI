<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookCategories = [
            "Ficción Contemporánea",
            "Ciencia Ficción y Fantasía",
            "Misterio y Suspenso"
        ];

        Category::factory(count($bookCategories))->sequence(fn($sequence) => [
            'name' => $bookCategories[$sequence->index]
        ])->create();
    }
}
