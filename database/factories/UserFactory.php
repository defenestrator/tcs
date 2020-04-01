<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'name' => $faker->name,
        'profile_id' => factory(\App\Profile::class),
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->dateTime(),
        'password' => $faker->password,
        'remember_token' => $faker->word,
    ];
});
