<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Breeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Breeder::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'uuid' => Str::orderedUuid(),
        'description' => $faker->text,
        'address_1' => $faker->word,
        'address_2' => $faker->word,
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
        'website' => $faker->word,
        'email' => $faker->safeEmail,
    ];
});
