<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    public function dish() {
        return $this->hasMany('App\Dish','dish_type_id');
    }
}
