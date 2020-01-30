@extends('auth.admin.layout')

@section('title')
    Admin Login - GARMENTOR
@stop

@section('content')
    <div class="loginFormWrap">
        <a class="app-logo" href="{{ url('/') }}">GARMENTOR</a>
        <div class="heading">Admin Login</div>
        @if ($errors->has('email'))
            <div class="error">
                {{ $errors->first('email') }}
            </div>
        @endif
        @if(isset($alert) && $alert)
            @include('shared.alert', ['alert' => $alert])
        @endif
        <div class="carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <form method="POST" action="{{ route('admin.login-post') }}">
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
                        <a href="{!! route('send-verification-admin') !!}" class="login-forgot-password">forgot password?</a>
                        <a href="{!! route('admin.register') !!}" class="login-forgot-password">register as Admin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection