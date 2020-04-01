<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ShippingAddress;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ShippingAddress::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'user_id' => factory(\App\User::class),
        'ship_to_name' => $faker->word,
        'address_1' => $faker->word,
        'address_2' => $faker->word,
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
    ];
});
