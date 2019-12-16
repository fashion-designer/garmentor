@extends('auth.layout')

@section('title')
    Account Verification - HYD
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{!! url('/') !!}">Hire Your Designer</a>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <h2 class="text-center" style="font-family: 'Raleway', sans-serif;">Enter your email to receive the verification code!</h2>
                        <form class="form-horizontal" method="POST" action="{{route('send-verification-admin')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" value="" placeholder="Enter your email..." required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">Send Verification Code</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop