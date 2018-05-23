<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    public function dish_types() {
        return $this->belongsTo('App\DishTypes','dish_type_id');
    }

    public function user() {
        return $this->belongsTo('App\User','contributed_user_id');
    }
}
