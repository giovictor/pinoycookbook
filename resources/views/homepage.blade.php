@extends('index')

@section('content')
    <div class="welcome">
        <h3>WELCOME!</h3>
        <p>Hello there my fellow Filipinos and some non Filipino netizens. PinoyCookBook is an online cookbook for Filipino foods provided for all of you. Many types of Filipino Dishes including Main Dishes, Desserts, Soups, Vegetables, Breads, and many many more. Feel free to browse here and serve up your family and friends with some awesome and delicious Filipino foods. Mabuhay!</p>
    </div>

    @if($flash = session('message'))
        <div class="alert alert-success">
            {{$flash}}
        </div>
    @endif

    <h4>COMMON DISHES</h4>
    <div class="dishes row">
        @foreach($dishes as $dish)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <img id="dish_img_card" class="card-img-top" src="{{asset($dish->thumbnail)}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$dish->dish}}</h5>
                        <p class="card-text">{!!$dish->shortDescription."..."!!}</p>
                        <a href="{{route('dish',['id' => $dish->id])}}" class="btn btn-primary btn-sm" id="readmorebtn">READ MORE</a>
                        @if(Auth::check())
                            @if(Auth::id()==$dish->contributed_user_id)
                                <form action="{{route('delete',['id'=>$dish->id])}}" method="POST" id="deleteform">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-sm">DELETE DISH</button>
                                    </div>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{$dishes->appends(request()->query())->links()}}
@endsection