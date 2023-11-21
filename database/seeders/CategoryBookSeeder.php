<?php

namespace Database\Seeders;

use App\Models\CategoryBook;
use Database\Factories\CategoryBookFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryBook::factory(50);
    }
}
