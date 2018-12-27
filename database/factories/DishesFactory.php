<?php

use Faker\Generator as Faker;

$factory->define(App\Dish::class, function (Faker $faker) {
    return [
        'dish' => $faker->word,
        'dish_img' => $faker->imageUrl,
        'description' => $faker->paragraph,
        'ingredients' => $faker->paragraph,
        'procedure' => $faker->paragraph,
        'dish_type_id' => $faker->randomElement(App\DishType::pluck('id')->toArray()),
        'contributed_user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
        'admin_approval' => 'Yes'
    ];
});
