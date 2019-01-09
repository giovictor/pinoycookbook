@extends('index')

@section('content')
    <h4>PENDING DISHES</h4>
    <div class="dishes">
        @foreach($pending_dishes as $dish)
            <div class="card" style="width: 19.5rem;">
                <img id="dish_img_card" class="card-img-top" src="{{asset($dish->dish_img)}}">
                <div class="card-body">
                    <h5 class="card-title">{{$dish->dish}}</h5>
                    <p class="card-text">{!!substr($dish->description, 0, 53)."..."!!}</p>
                    <form action="{{route('approve-dish',['id'=>$dish->id])}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">APPROVE DISH</button>
                        </div>
                    </form>
                    <form action="{{route('delete',['id'=>$dish->id])}}" method="POST" id="deleteform">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-sm">DELETE DISH</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection