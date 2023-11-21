<?php

namespace Database\Seeders;

use App\Models\BookUser;
use Database\Factories\BookUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookUser::factory(25);
    }
}
