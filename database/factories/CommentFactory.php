<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'commentable_type' => $faker->word,
        'commentable_id' => $faker->numberBetween(1,10),
        'user_id' => factory(\App\User::class),
        'comment' => $faker->text,
    ];
});
