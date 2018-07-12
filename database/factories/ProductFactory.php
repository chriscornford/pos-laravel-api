<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('Product ???'),
        'reference' => str_random(10),
        'quantity' => $faker->numberBetween(5, 50),
        'price' => $faker->randomFloat(2, 1, 15),
    ];
});
