<?php

use Illuminate\Database\Seeder;
use PhoneBook\Book;

class PhoneBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Book::class, 50)->create();
    }
}
