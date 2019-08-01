<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = ['dish','description','ingredients','procedure','dish_type_id','thumbnail','contributed_user_id','admin_approval'];
    
    public function dish_type() {
        return $this->belongsTo('App\DishType','dish_type_id');
    }

    public function user() {
        return $this->belongsTo('App\User','contributed_user_id');
    }
}
