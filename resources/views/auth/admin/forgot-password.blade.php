@extends('auth.admin.layout')

@section('title')
    Account Verification - GARMENTOR
@stop

@section('content')
    <div class="loginFormWrap">
        <a class="app-logo" href="{{ url('/') }}">GARMENTOR</a>
        <div class="heading">Enter your email to receive the verification code!</div>
        @if(isset($alert) && $alert)
            <div class="error">
                {{ $alert['alertMessage'] }}
            </div>
        @endif
        <div class="carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <form method="POST" action="{{$route}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="login-input" placeholder="Email Address" autofocus/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Verification Code" class="login-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop