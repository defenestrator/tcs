<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ShippingCarrier;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ShippingCarrier::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'name' => $faker->name,
        'tracking_url' => $faker->word,
    ];
});
