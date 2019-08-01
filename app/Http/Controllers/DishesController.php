<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DishRequest;
use App\Dish;
use App\DishType;
use Auth;
use Storage;

use App\Repositories\DishRepositoryInterface;

class DishesController extends Controller
{
    public $dish;

    public function __construct(DishRepositoryInterface $dish) 
    {
        $this->dish = $dish;
        
        $this->middleware('auth')->only('create', 'edit','store','update','delete','showPendingDishes','approveDish');
    }

    public function index()
    {
        $dishes = $this->dish->all();
        return view('homepage',compact('dishes'));
    }
    
    public function create()
    {
        return view('contribute');
    }

    
    public function store(DishRequest $request)
    {   
        $dish = Dish::create($request->validated());      
        $dish['contributed_user_id'] = Auth::id();
        $dish['admin_approval'] = 'Yes';

        $dish['thumbnail'] = $request->file('thumbnail')->store('img');


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
