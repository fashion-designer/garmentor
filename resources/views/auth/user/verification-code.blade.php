@extends('auth.user.layout')

@section('title')
    Account Verification - GARMENTOR
@stop

@section('content')
    <div class="loginFormWrap">
        <div class="heading">Enter the verification code sent to your email!</div>
        @if ($errors->has('email'))
            <div class="error">
                {{ $errors->first('email') }}
            </div>
        @endif
        <div class="carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <form method="POST" action="{{ $route}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="verification_code" class="login-input" placeholder="enter verification code" autofocus/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit Code" class="login-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop