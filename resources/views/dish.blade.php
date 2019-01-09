@extends('index')

@section('content')
    <h4>{{strtoupper($dish->dish)}}</h4>
    @if(Auth::check())
        @if(Auth::user()->user_type=='User')
            @if(Auth::id()==$dish->contributed_user_id)
                <a href="{{secure_url(route('edit',['id'=>$dish->id]))}}" class="btn btn-primary" style="float:right;">EDIT DISH</a>
            @endif
        @elseif(Auth::user()->user_type=='Admin')
            <a href="{{secure_url(route('edit',['id'=>$dish->id]))}}" class="btn btn-primary" style="float:right;">EDIT DISH</a>
        @endif
    @endif
    <p>Category: {{$dish->dish_type->dish_type}}</p>
    <p>Contributed By: {{$dish->user->name}}</p>
    <div class="row dishrow">
        <div class="col-md-6">
            <img id="dish_img" src="{{asset($dish->dish_img)}}">
        </div>
        <div class="col-md-6">
            <h5>{!!$dish->description!!}</h5>
        </div>
    </div>

    <div class="row dishrow">
        <div class="col-md-6">
            <h4>INGREDIENTS:</h4>
            <p>{!!$dish->ingredients!!}</p>
        </div>
        <div class="col-md-6">
            <h4>PROCEDURE:</h4>
            <p>{!!$dish->procedure!!}</p>
        </div>
    </div>
@endsection