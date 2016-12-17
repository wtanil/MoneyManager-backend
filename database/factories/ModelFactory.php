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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Record::class, function (Faker\Generator $faker) {

    return [
        'user_id' => 1,
        'title' => $faker->sentence(5, true),
        'currency' => $faker->currencyCode,
        'note' => $faker->paragraph(3, true),
        'amount' => $faker->randomFloat(),
        'is_income' => $faker->boolean(50),
        'is_loan' => $faker->boolean(50),
        'date' => $faker->dateTime('2016-12-16 12:07:55'),
        'update_date' => $faker->dateTime('2016-12-16 12:07:55'),
        'created_at' => null,
        'updated_at' => null
    ];
});