<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderShipment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(OrderShipment::class, function (Faker $faker) {
    return [
        'order_id' => factory(App\Order::class),
        'shipment_id' => factory(App\Shipment::class),
    ];
});
