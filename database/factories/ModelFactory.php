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
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Band::class, function (Faker\Generator $faker) {

    static $password;

    $faker->addProvider(new App\Custom\Datasets\BandProvider($faker));

    return [
        'name' => $faker->unique()->bandname(),
        'start_date' => $faker->date(),
        'website' => $faker->url,
        'still_active' => 1,
    ];
});

/*  Needed unique album names so moved this to AlbumsTableSeeder
$factory->define(App\Album::class, function (Faker\Generator $faker) {
    static $password;

    $faker->addProvider(new App\Custom\Datasets\AlbumProvider($faker));
    
    $band_id = App\Band::all()->random()->id;

    return [
        'name' => $faker->unique()->album(),
        'band_id' => $band_id,
        'recorded_date' => $faker->date(),
        'release_date' => $faker->date(),
        'number_of_tracks' => rand(8, 15),
        'label' => $faker->company,
        'producer' => $faker->name,
        'genre' => $faker->genre(),
    ];
});
 */
