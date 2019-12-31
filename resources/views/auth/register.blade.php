@extends('auth.layout')

@section('title')
    User Registration - HYD
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{!! url('/') !!}">Hire Your Designer</a>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    @if(isset($alert) && $alert)
                        @include('shared.alert', ['alert' => $alert])
                    @endif
                    <div class="col-md-5 mx-auto">
                        <h2 class="text-center">User Registration</h2>
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-12 control-label">First Name</label>
                                <div class="col-md-12">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                    @if ($errors->has('first_name'))
                                        <span class="help-block hyd-color-red">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-12 control-label">Last Name</label>
                                <div class="col-md-12">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block hyd-color-red">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 control-label">E-Mail Address</label>
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block hyd-color-red">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-12 control-label">Phone</label>
                                <div class="col-md-12">
                                    <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                    @if ($errors->has('phone'))
                                        <span class="help-block hyd-color-red">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @include('shared.country-codes')
                            <div class="form-group">
                                <label for="gender_id" class="col-md-12 control-label">Gender</label>
                                <div class="col-md-12">
                                    <select name="gender_id" id="gender_id" class="form-control" required autofocus>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('gender_id'))
                                        <span class="help-block hyd-color-red">
                                        <strong>{{ $errors->first('gender_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary w-100">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
