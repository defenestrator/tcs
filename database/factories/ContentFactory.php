<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Content;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'user_id' => factory(\App\User::class),
        'title' => $faker->sentence(4),
        'body' => $faker->text,
        'slug' => $faker->slug,
        'published_at' => $faker->dateTime(),
        'contentable_type' => $faker->word,
        'contentable_id' => $faker->numberBetween(1,10),
        'custom_fields' => '{}',
    ];
});
