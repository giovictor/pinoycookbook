<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishTypes extends Model
{   
    public function dishes() {
        return $this->hasMany('App\Dishes','dish_type_id');
    }
}
