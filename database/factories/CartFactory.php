<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cart;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'uuid' => Str::orderedUuid(),
    ];
});
