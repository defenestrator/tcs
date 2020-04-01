<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderProduct;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(OrderProduct::class, function (Faker $faker) {
    return [
        'order_id' => factory(App\Order::class),
        'product_id' => factory(App\Product::class),
    ];
});
