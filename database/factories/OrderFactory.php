<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'user_id' => factory(\App\User::class),
        'subtotal' => $faker->numberBetween(1,10),
        'coupon_id' => factory(\App\Coupon::class),
        'shipping_price' => $faker->numberBetween(1,10),
    ];
});
