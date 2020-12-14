@extends('admin.layouts.layout', ['activeTab' => 'users'])

@section('content')
    <div class="app-title">
        <h1 style="margin-bottom: 10px"><i class="fas fa-user-friends"></i> Users List</h1>
        <span class="pull-right">
            <a href="{!! route('admin.users-list.invite') !!}" class="btn btn-info">Invite New User Account</a>
        </span>
    </div>
    <div class="garmentor-p-5 background-white garmentor-m-6 table-responsive">
        <div id="users-container">
            <users-container :items="{{$list}}"/>
        </div>
    </div>

    <script src="{{asset('js/admin/users/launch.js')}}"></script>
@endsection
