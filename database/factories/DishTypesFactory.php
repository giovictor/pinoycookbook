<?php

use Faker\Generator as Faker;

$factory->define(App\DishTypes::class, function (Faker $faker) {
    return [
        'dish_type' => $faker->word
    ];
});
