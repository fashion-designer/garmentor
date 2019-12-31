@extends('emails.layout')

@section('content')
    <div class="title m-b-md">
        Invitation Link
    </div>
    <p>
        Enter this code {!! $invitationCode !!}
    </p>
    <div class="links">
        <a class="auth-links" href="{!! $invitationLink !!}">Click Here To Verify</a>
    </div>
@stop