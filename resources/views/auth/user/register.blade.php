@extends('auth.user.layout')

@section('title')
    User Registration - GARMENTOR
@stop

@section('content')
    <div class="loginFormWrap">
        <div class="heading">User Register</div>
        <div class="carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="first_name" class="col-md-12 control-label">First Name</label>
                        <input id="first_name" type="text" class="login-input" name="first_name" value="{{ old('first_name') }}" placeholder="enter first name" required autofocus>
                        @if ($errors->has('first_name'))
                            <div class="error">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-md-12 control-label">Last Name</label>
                        <input id="last_name" type="text" class="login-input" name="last_name" value="{{ old('last_name') }}" placeholder="enter last name" required>
                        @if ($errors->has('last_name'))
                            <div class="error">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-md-12 control-label">Email</label>
                        <input type="email" name="email" id="email" class="login-input" placeholder="enter email address"/>
                        @if ($errors->has('email'))
                            <div class="error">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    @include('shared.country-codes')
                    <div class="form-group">
                        <label for="gender_id" class="col-md-12 control-label">Gender</label>
                        <div class="col-md-12" style="padding: 0 35px 0 35px;">
                            <select name="gender_id" id="gender_id" class="form-control" required>
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
                    <div class="form-group">
                        <input type="submit" value="Register" class="login-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
