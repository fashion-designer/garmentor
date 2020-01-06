@extends('auth.layout')

@section('title')
    User Login - GARMENTOR
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="app-logo" href="{!! url('/') !!}">GARMENTOR</a>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    @if(isset($alert) && $alert)
                        @include('shared.alert', ['alert' => $alert])
                    @endif
                    <div class="col-md-5 mx-auto">
                        <h2 class="text-center">Login User</h2>
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 control-label">E-Mail Address</label>
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block garmentor-color-red">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-12 control-label">Password</label>
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block garmentor-color-red">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <a href="{!! route('send-verification-user') !!}">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop