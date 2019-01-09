@extends('index')

@section('content')
    <div id="login">
        <div class="card" id="loginform">
            <form method="POST" action="{{ secure_url(route('login')) }}">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7" id="loginformcol">
                            <h4>LOG IN</h4>
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                            
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#596449;">
                                    {{ __('Forgot Your Password?') }}
                                </a> --}}
                        
                            </div>
                        </div>

                        <div class="col-md-5" id="loginbtn">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="loginbutton">
                                    LOGIN
                                </button>
                            </div>
                            <div class="form-group">
                                <a href="{{secure_url(route('register'))}}" class="btn btn-primary" id="registerbutton">SIGN UP</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
