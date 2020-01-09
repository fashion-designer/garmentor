@extends('auth.user.layout')

@section('title')
    User Login - GARMENTOR
@stop

@section('content')
    <div class="loginFormWrap">
        <div class="heading">User Login</div>
        @if ($errors->has('email'))
            <div class="error">
                {{ $errors->first('email') }}
            </div>
        @endif
        <div class="carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="login-input" placeholder="Email Address" autofocus/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="login-input" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="login-button" />
                    </div>
                    <div class="form-group">
                        <a href="{!! route('send-verification-user') !!}" class="login-forgot-password">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection