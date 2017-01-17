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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
    	'user_id' => 1,
        'name' => $faker->bs,
        'description' => $faker->text(500),
        'ean' => $faker->ean13,
        'meta' => null,
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->word,
    ];
});

$factory->define(App\File::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'path' => $faker->imageUrl(640, 480, 'technics'),
        'type' => 'file',
        'user_id' => 1,
        'parent_id' => null
    ];
});
