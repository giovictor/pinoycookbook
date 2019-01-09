<header>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand" href="{{secure_url(route('homepage'))}}">
            <img src="{{secure_asset('img/logo.png')}}" id="logo">
        </a>
        <ul class="navbar-nav ml-auto" id="navlinks">
            <li class="nav-item">
                <a href="{{secure_url(route('homepage'))}}" class="nav-link">HOME</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navdropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    DISHES <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navdropdown">
                    @foreach($dish_types as $dish_type)
                        <a href="{{secure_url(route('dish-type',['id'=>$dish_type->id]))}}" class="nav-link" style="color:black;">{{$dish_type->dish_type}}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a href="{{secure_url(route('contribute'))}}" class="nav-link">CONTRIBUTE</a>
            </li>
            @if(Auth::check())
                @if(Auth::user()->user_type=='Admin') 
                    @if(count($pending_dishes))
                        <li class="nav-item">
                            <a href="{{secure_url(route('pending-dishes'))}}" class="nav-link">PENDING DISHES</a>
                        </li>
                    @endif
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ secure_url(route('logout')) }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    LOGOUT
                    </a>

                    <form id="logout-form" action="{{ secure_url(route('logout')) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif
        </ul>
    </nav>
</header>