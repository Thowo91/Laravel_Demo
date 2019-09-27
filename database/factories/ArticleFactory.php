<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\Categorie;
use App\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {

    $manufacturers = Manufacturer::all()->pluck('id')->toArray();
    $categories = Categorie::all()->pluck('id')->toArray();

    return [
        'manufacturer_id' => $faker->randomElement($manufacturers),
        'categorie_id' => $faker->randomElement($categories),
        'name' => $faker->productName,
        'price' => $faker->randomFloat(2, 0, 1000),
        'description' => $faker->sentence,
        'status' => $faker->numberBetween(0, 1)
    ];
});
