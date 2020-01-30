@extends('auth.admin.layout')

@section('title')
    Admin Registration - GARMENTOR
@stop

@section('content')
    <div class="loginFormWrap">
        <a class="app-logo" href="{{ url('/') }}">GARMENTOR</a>
        <div class="heading">Create a new password for your account!</div>
        <div class="carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <form method="POST" action="{{ $route }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="password" class="col-md-12 control-label">Password</label>
                        <input type="password" name="password" id="password" class="login-input" placeholder="enter password"/>
                        @if ($errors->has('password'))
                            <div class="error">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="login-input" name="password_confirmation" placeholder="confirm password" required>
                        </div>
                    </div>
                    @if($genders)
                        <div class="form-group">
                            <label for="gender_id" class="col-md-12 control-label">Gender</label>
                            <div class="col-md-12">
                                <select name="gender_id" id="gender_id" class="form-control" required autofocus>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('gender_id'))
                                    <span class="help-block garmentor-color-red">
                                        <strong>{{ $errors->first('gender_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="submit" value="Submit" class="login-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop