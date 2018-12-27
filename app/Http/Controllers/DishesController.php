<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DishRequest;
use App\Dish;
use App\DishType;
use Auth;
use Storage;

class DishesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        // ->only('create', 'edit','store','update','delete','showPendingDishes','approveDish');
    }

    public function index()
    {
        $dishes = Dish::where('admin_approval', 'Yes')->orderBy('created_at','desc')->get();
        return view('homepage',compact('dishes'));
    }
    
    public function create()
    {
        return view('contribute');
    }

    
    public function store(DishRequest $request)
    {   
        $dish = Dish::create($request->validated());      
        $dish = Dish::findOrFail($dish->id);
        $dish->contributed_user_id = Auth::id();
        $dish->admin_approval = 'Yes';
        $dish->save();
        return redirect()->route('homepage');
    }

    
    public function show(Dish $dish)
    {   
        return view('dish', compact('dish'));
    }

  
    public function edit(Dish $dish)
    {
        return view('edit',compact('dish','dish_types'));
    }

 
    public function update(DishRequest $request, Dish $dish)
    {   
        $dish->update($request->validated());
        return redirect()->route('homepage');
    }

    public function destroy(Dish $dish)
    {
        Storage::delete($dish->dish_img);
        $dish->delete();
        return redirect()->route('homepage');
    }

    public function showPendingDishes()
    {
        return view('admin-homepage');
    }

    public function approveDish(Dish $dish) {
        $dish->admin_approval = 'Yes';
        $dish->save();

        return redirect()->route('dish', ['id'=>$dish->id]);
    }
}
