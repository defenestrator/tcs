<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CartProduct;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(CartProduct::class, function (Faker $faker) {
    return [
        'cart_id' => factory(App\Cart::class),
        'product_id' => factory(App\Product::class),
    ];
});
