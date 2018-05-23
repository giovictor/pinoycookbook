<?php

use Illuminate\Database\Seeder;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dishes::class, 20)->create();
    }
}
