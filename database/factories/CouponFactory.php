<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'name' => $faker->name,
        'percentage' => $faker->boolean,
        'value' => $faker->numberBetween(1,10),
        'active' => $faker->boolean,
    ];
});
