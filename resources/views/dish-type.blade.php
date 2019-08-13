@extends('index')

@section('content')
    <h4>{{$dish_type->dish_type}}</h4>
    @if(count($dishes)==0)
        <div class="nodish">
            <h2>Sorry! No dishes available for this dish type.</h2>
            <h3>Want to contribute? <a href={{route('contribute')}}>Click here.</a></h3>
            <img src="https://media.giphy.com/media/TU76e2JHkPchG/giphy.gif"/>
            <h4>Please contribute some Filipino {{$dish_type->dish_type}} :(</h4>
        </div>
    @else
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
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
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
    @endif

@endsection