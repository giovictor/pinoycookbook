<header>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand" href="{{route('homepage')}}">
            <img src="{{asset('img/logo.png')}}" id="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsible" aria-controls="collapsible" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsible">
            <ul class="navbar-nav ml-auto" id="navlinks">
                <li class="nav-item">
                    <a href="{{route('homepage')}}" class="nav-link">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        DISHES
                    </a>

                    <div class="dropdown-menu"
                    aria-labelledby="navbarDropdown">
                        @foreach($dish_types as $dish_type)
                            <a href="{{route('dish-type',['id'=>$dish_type->id])}}" class="dropdown-item" style="color:black;">{{$dish_type->dish_type}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{route('contribute')}}" class="nav-link">CONTRIBUTE</a>
                </li>
                @if(Auth::check())
                    @if(Auth::user()->user_type=='Admin') 
                        @if(count($pending_dishes))
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
        </div>
    </nav>
</header>