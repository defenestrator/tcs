<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Strain;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Strain::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'name' => $faker->name,
        'lineage' => $faker->word,
        'landrace' => $faker->boolean,
        'description' => $faker->text,
    ];
});
