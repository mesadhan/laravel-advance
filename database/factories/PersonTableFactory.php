<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Http\Models\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
    ];
});
