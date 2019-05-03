<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use App\Http\Models\Products\Category;
use App\Http\Models\Products\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(Product::class, function (Faker $faker) {

    $imagePath = public_path(Config::get('assets.images'));
    $image_name = $faker->image($imagePath, 400, 200, false);

    return [
        'name' => $faker->name,
        'title' => $faker->sentence,
        'price' => $faker->numberBetween(200, 1000),
        'photo' => $image_name,
        'category_id' =>  factory(Category::class)->create()->id,
        'description' => $faker->text(),
        'status' => $faker->numberBetween(1, 3),
    ];
});
