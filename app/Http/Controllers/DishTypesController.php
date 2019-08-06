<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DishType;
use App\Dish;

class DishTypesController extends Controller
{
    public function index()
    {
        return DishType::all();
    }
    public function showDishByDishTypes($id) {
        $dish_type = DishType::findOrFail($id);
        $dishes = Dish::where('dish_type_id', $id)->where('admin_approval','Yes')->with('dish_type')->get();
        return view('dish-type', compact('dishes','dish_type'));
    }
}
