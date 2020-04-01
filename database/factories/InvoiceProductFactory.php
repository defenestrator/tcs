<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InvoiceProduct;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(InvoiceProduct::class, function (Faker $faker) {
    return [
        'invoice_id' => factory(App\Invoice::class),
        'product_id' => factory(App\Product::class),
    ];
});
