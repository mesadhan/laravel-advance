<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Http\Models\RedisBlog\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(100, 10000),
        'description' => $faker->sentence(),
    ];
});
