<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'uuid' =>  Str::orderedUuid(),
        'strain_id' => factory(\App\Strain::class),
        'product_category_id' => factory(\App\ProductCategory::class),
        'name' => $faker->name,
        'price' => $faker->numberBetween(1,10),
    ];
});
