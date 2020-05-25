<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'description'=> $faker-> sentence(20),
        'price'=> $faker-> numberBetween(100, 5000)
    ];
});
