<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Models\Products\Stock;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(100, 10000),
    ];


    /*return [
        'title' => $faker->sentence(5),
        'description' => $faker->text(),
        'user_id' => factory('App\User')->create()->id,
    ]; */


});
