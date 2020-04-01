<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LabResult;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(LabResult::class, function (Faker $faker) {
    return [
        'uuid' => Str::orderedUuid(),
        'laboratory_id' => factory(\App\Laboratory::class),
        'lab_result_type' => $faker->word,
        'lab_result_id' => $faker->numberBetween(1,10),
        'result' => '{}',
    ];
});
