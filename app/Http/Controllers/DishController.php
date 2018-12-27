<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class DishController extends Controller
{
    
    public function index()
    {
        $dishes = Dish::where('admin_approval', 'Yes')->orderBy('created_at')->get();
        return $dishes;
    }

    
    public function create()
    {
        
    }

   
    public function store(DishRequest $request)
    {
        Dish::create($request->validated());
    }

    
    public function show(Dish $dish)
    {
        return $dish;
    }

  
    public function edit(Dish $dish)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
