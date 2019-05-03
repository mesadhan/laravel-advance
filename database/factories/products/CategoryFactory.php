<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use App\Http\Models\Products\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(Category::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'title' => $faker->sentence,
        'photo' => 'default_image.jpg',
        'status' => $faker->numberBetween(1, 3),
    ];
});
