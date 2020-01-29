@extends('auth.designer.layout')

@section('title')
    Designer Login - GARMENTOR
@stop

@section('content')
    <div class="loginFormWrap">
        <a class="app-logo" href="{{ url('/') }}">GARMENTOR</a>
        <div class="heading">Designer Login</div>
        @if ($errors->has('email'))
            <div class="error">
                {{ $errors->first('email') }}
            </div>
        @endif
        <div class="carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <form method="POST" action="{{ route('designer.login-post') }}">
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
                        <a href="{!! route('send-verification-designer') !!}" class="login-forgot-password">forgot password?</a>
                        <a href="{!! route('designer.register') !!}" class="login-forgot-password">register as Designer</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection