<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shipment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Shipment::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'shipping_carrier_id' => factory(\App\ShippingCarrier::class),
        'date_shipped' => $faker->dateTime(),
    ];
});
