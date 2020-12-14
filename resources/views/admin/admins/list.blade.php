@extends('admin.layouts.layout', ['activeTab' => 'admins'])

@section('content')
    <div class="app-title">
        <h1 style="margin-bottom: 10px"><i class="fas fa-user-shield"></i> Admins List</h1>
        <span class="pull-right">
            <a href="{!! route('admin.admins-list.invite') !!}" class="btn btn-info">Invite New Admin Account</a>
        </span>
    </div>
    @if(isset($alert) && $alert)
        @include('shared.alert', ['alert' => $alert])
    @endif
    <div class="garmentor-p-5 background-white garmentor-m-6 table-responsive">
        <div id="admins-container">
            <admins-container :items="{{$list}}"/>
        </div>
    </div>

    <script src="{{asset('js/admin/admins/launch.js')}}"></script>
@endsection
