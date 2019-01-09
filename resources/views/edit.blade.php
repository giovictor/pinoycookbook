@extends('index')

@section('content')
    <h4>UPDATE DISH</h4>
    @if(Auth::check())
        <a href="{{route('dish',['id'=>$dish->id])}}" class="btn btn-primary" style="float:right;">VIEW DISH</a>
    @endif
    <form action="{{route('edit',['id'=>$dish->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <p>Display Thumbnail:</p>
            <div class="preview-container">
                <img id="preview_img" src="{{secure_asset($dish->dish_img)}}" style="margin-top:0px;">
            </div>
        </div>

        <div class="form-group">
            <label for="thumbnail">Upload Pic:</label>
            <input type="file" class="form-control" name="thumbnail" id="thumbnail" onchange="previewImage()">
        </div>

        <div class="form-group">
            <label for="dish">Dish:</label>
            <input type="text" class="form-control" name="dish" id="dish" value="{{$dish->dish}}">
        </div>

        <div class="form-group">
            <label for="dish_type">Dish Type:</label>
            <select class="form-control" name="dish_type_id" id="dish_type">
                    <option value="">Choose A Dish Type...</option>
                    @foreach($dish_types as $dish_type)
                        <option value="{{$dish_type->id}}" {{$dish->dish_type_id == $dish_type->id ? 'selected' : ''}}>{{$dish_type->dish_type}}</option>
                    @endforeach
            </select>
        </div>

        <div class="row"> 
            <div class="col-md-6">           
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" id="description" rows="7">{{$dish->description}}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    <textarea class="form-control" name="ingredients" id="ingredients" rows="7">{{$dish->ingredients}}</textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="procedure">Procedure:</label>
            <textarea class="form-control" name="procedure" id="procedure" rows="10">{{$dish->procedure}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">SUBMIT</button>
        @include('errors')
    </form>
@endsection