<?php

use Illuminate\Database\Seeder;

class DishTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DishTypes::class, 13)->create();
    }
}
