@extends('main-layout')

@section('header_link')
    <ul class="app-nav">
        <!-- Logout Button -->
        <li>
            <a class="app-nav__item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-lg"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
@stop

@section('sidebar_link')
    @include('user.layouts.sidebar-navigation', ['activeTab' => $activeTab])
@stop