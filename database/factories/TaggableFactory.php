<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Taggable;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Taggable::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'tag_id' => factory(\App\Tag::class),
        'taggable_type' => $faker->word,
        'taggable_id' => $faker->numberBetween(1,10),
    ];
});
