<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProfileSetting;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ProfileSetting::class, function (Faker $faker) {
    return [
        'facebook' => $faker->boolean,
        'rollitup' => $faker->boolean,
        'fourtwentymag' => $faker->boolean,
        'instagram' => $faker->boolean,
        'twitter' => $faker->boolean,
        'snapchat' => $faker->boolean,
        'thcfarmer' => $faker->boolean,
        'strainly' => $faker->boolean,
        'clonify' => $faker->boolean,
    ];
});
