<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'user_id' => factory(\App\User::class),
        'shipping_address_id' => factory(\App\ShippingAddress::class),
        'tax' => $faker->numberBetween(1,10),
        'shipping_price' => $faker->numberBetween(1,10),
    ];
});
