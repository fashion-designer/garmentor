@extends('main-layout')

@section('header_link')
    <ul class="app-nav">
        <!-- Logout Button -->
        <li>
            <a class="app-nav__item" href="{{ route('designer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-lg"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('designer.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
@stop

@section('sidebar_link')
    @include('designer.layouts.sidebar-navigation')
@stop