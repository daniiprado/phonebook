<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(PhoneBook\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(PhoneBook\Book::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'document' => $faker->numerify('10########'),
        'phone' => $faker->randomElement(
            [
                $faker->numerify('300#######'),
                $faker->numerify('310#######'),
                $faker->numerify('312#######'),
                $faker->numerify('313#######'),
                $faker->numerify('316#######'),
                $faker->numerify('315#######'),
                $faker->numerify('317#######'),
                $faker->numerify('321#######'),
                $faker->numerify('8######'),
            ]),
        'created_at' => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
