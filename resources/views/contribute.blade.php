@extends('index')

@section('content')
    <h4>CONTRIBUTE A DISH</h4>
    <form action="{{route('contribute')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="thumbnail">Upload Pic:</label>
            <input type="file" class="form-control" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}" onchange="previewImage()">
            <div class="preview-container">
                <img src="{{asset('img/preview.jpg')}}" id="preview_img">
            </div>
        </div>

        <div class="form-group">
            <label for="dish">Dish:</label>
            <input type="text" class="form-control" name="dish" id="dish" value="{{old('dish')}}">
        </div>

        <div class="form-group">
            <label for="dish_type">Dish Type:</label>
            <select class="form-control" name="dish_type" id="dish_type">
                    <option value="">Choose A Dish Type...</option>
                    @foreach($dish_types as $dish_type)
                        <option value="{{$dish_type->id}}" {{old('dish_type') == $dish_type->id ? 'selected' : ''}}>{{$dish_type->dish_type}}</option>
                    @endforeach
            </select>
        </div>

        <div class="row"> 
            <div class="col-md-6">           
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" id="description" rows="7">{{old('description')}}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    <textarea class="form-control" name="ingredients" id="ingredients" rows="7">{{old('ingredients')}}</textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="procedure">Procedure:</label>
            <textarea class="form-control" name="procedure" id="procedure" rows="10">{{old('procedure')}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">SUBMIT</button>
        @include('errors')
    </form>
@endsection