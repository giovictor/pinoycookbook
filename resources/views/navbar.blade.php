<header>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand" href="{{route('homepage')}}">
            <img src="{{asset('img/logo.png')}}" id="logo">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{route('homepage')}}" class="nav-link">HOME</a>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">ABOUT</a>
            </li> --}}
            <li class="nav-item dropdown">
                <a href="#" id="dishesnavbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    DISHES <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dishesnavbarDropdown" id="dishdropdown">
                    @foreach(App\DishTypes::where('id', '<' ,'11')->get() as $dish_type)
                        <a href="{{route('dish-type',['id'=>$dish_type->id])}}" class="nav-link" style="color:black;">{{$dish_type->dish_type}}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a href="{{route('contribute')}}" class="nav-link">CONTRIBUTE</a>
            </li>
            @if(Auth::check())
                @if(Auth::user()->user_type=='Admin') 
                    @if(count(App\Dishes::where('admin_approval','No')->get()))
                        <li class="nav-item">
                            <a href="{{route('pending-dishes')}}" class="nav-link">PENDING DISHES</a>
                        </li>
                    @endif
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    LOGOUT
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif
        </ul>
    </nav>
</header>