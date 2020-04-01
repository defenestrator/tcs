<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'user_id' => factory(\App\User::class),
        'caption' => $faker->word,
        'credits' => $faker->word,
        'path' => $faker->word,
        'published_at' => $faker->dateTime(),
        'imageable_type' => $faker->word,
        'imageable_id' => $faker->numberBetween(1,10),
    ];
});
