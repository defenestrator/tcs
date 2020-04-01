<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'facebook' => $faker->word,
        'rollitup' => $faker->word,
        'fourtwentymag' => $faker->word,
        'instagram' => $faker->word,
        'twitter' => $faker->word,
        'snapchat' => $faker->word,
        'thcfarmer' => $faker->word,
        'strainly' => $faker->word,
        'clonify' => $faker->word,
    ];
});
