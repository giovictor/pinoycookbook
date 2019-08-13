<?php

namespace App\Repositories;

use App\Dish;

class DishRepository implements DishRepositoryInterface {

    public function all() 
    {
        return Dish::where('admin_approval', 'Yes')->orderBy('created_at','desc')->paginate(12);
    }
    
}
?>