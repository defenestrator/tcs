<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Laboratory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Laboratory::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'name' => $faker->name,
        'address_1' => $faker->word,
        'address_2' => $faker->word,
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
        'website' => $faker->word,
        'email' => $faker->safeEmail,
    ];
});
