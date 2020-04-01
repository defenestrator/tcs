<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'name' => $faker->name,
        'attributes' => '{}',
    ];
});
