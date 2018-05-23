<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Dishes;
use App\DishTypes;
use Auth;
use Storage;

class DishesController extends Controller
{
   public function __construct() {
       $this->middleware('auth')->only('create', 'edit','store','update','delete','showPendingDishes','approveDish');
   }

    public function index()
    {
        $dishes = Dishes::where('admin_approval', 'Yes')->orderBy('created_at','desc')->get();
        return view('homepage',compact('dishes'));
    }
    
    public function create()
    {
        $dish_types = DishTypes::where('id','<','11')->get();
        return view('contribute', compact('dish_types'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'image|required',
            'dish' => 'required',
            'dish_type' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'procedure' => 'required'
        ]);

        $dish = new Dishes;
        $dish->dish = $request->input('dish');
        $dish->description = $request->input('description');
        $dish->ingredients = $request->input('ingredients');
        $dish->procedure = $request->input('procedure');
        $dish->dish_type_id = $request->input('dish_type');
        $dish->contributed_user_id = Auth::id();

        if(Auth::user()->user_type=='User') {
            $dish->admin_approval = 'No';
            session()->flash('message','For safety concerns of content, admin approval is needed. The dish you contributed will be posted after review.');
        } else if(Auth::user()->user_type=='Admin') {
            $dish->admin_approval = 'Yes';
        }

        $dish_img = $request->file('thumbnail')->store('public');
        $dish->dish_img = Storage::url($dish_img);

        $dish->save();

        return redirect()->route('homepage');
    }

   
    public function show($id)
    {
        $dish = Dishes::findOrFail($id);
        return view('dish', compact('dish'));
    }

  
    public function edit($id)
    {
        $dish = Dishes::findOrFail($id);
        $dish_types = DishTypes::where('id','<','11')->get();
        return view('edit',compact('dish','dish_types'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'image|required',
            'dish' => 'required',
            'dish_type' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'procedure' => 'required'
        ]);

        $dish = Dishes::findOrFail($id);
        $dish->dish = $request->input('dish');
        $dish->description = $request->input('description');
        $dish->ingredients = $request->input('ingredients');
        $dish->procedure = $request->input('procedure');
        $dish->dish_type_id = $request->input('dish_type');
        
        Storage::delete($dish->dish_img);
        
        $dish_img = $request->file('thumbnail')->store('public');
        $dish->dish_img = Storage::url($dish_img);

        if(Auth::user()->user_type=='User') {
            $dish->admin_approval = 'No';
            session()->flash('message','For safety concerns of content, admin approval is needed. The dish you updated will be posted after review.');
        } else if(Auth::user()->user_type=='Admin') {
            $dish->admin_approval = 'Yes';
        }

        $dish->save();

        return redirect()->route('homepage');
    }

    public function destroy($id)
    {
        $dish = Dishes::findOrFail($id);
        Storage::delete($dish->dish_img);
        $dish->delete();
        return redirect()->route('homepage');
    }

    public function showPendingDishes() 
    {
        $dishes = Dishes::where('admin_approval', 'No')->orderBy('created_at', 'desc')->get();
        return view('admin-homepage',compact('dishes'));
    }

    public function approveDish($id) {
        $dish = Dishes::findOrFail($id);
        $dish->admin_approval = 'Yes';
        $dish->save();

        return redirect()->route('dish', ['id'=>$dish->id]);
    }
  
}
