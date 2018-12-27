<?php

use Faker\Generator as Faker;

$factory->define(App\DishType::class, function (Faker $faker) {
    return [
        'dish_type' => $faker->word
    ];
});
