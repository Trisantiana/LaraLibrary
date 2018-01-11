<?php

use App\Pengarang;
use Faker\Generator as Faker;

$factory->define(Pengarang::class, function (Faker $faker) {
    return [
        'pengarang' => $faker->name,
        'address' => $faker->address
    ];
});
