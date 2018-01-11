<?php

use App\Penerbit;
use Faker\Generator as Faker;

$factory->define(Penerbit::class, function (Faker $faker) {
    return [
        'penerbit' => $faker->name,
        'thn_terbit' => $faker->date
    ];
});
