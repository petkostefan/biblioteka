<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(4)->create();
        Author::factory(5)->create();
        Publisher::factory(3)->create();
        Book::factory(20)->create();
    }
}
