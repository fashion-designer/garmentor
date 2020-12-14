@extends('admin.layouts.layout', ['activeTab' => 'designers'])

@section('content')
    <div class="app-title">
        <h1 style="margin-bottom: 10px"><i class="fas fa-user-cog"></i> Designers List</h1>
        <span class="pull-right">
            <a href="{!! route('admin.designers-list.invite') !!}" class="btn btn-info">Invite New Designer Account</a>
        </span>
    </div>
    @if(isset($alert) && $alert)
        @include('shared.alert', ['alert' => $alert])
    @endif
    <div class="garmentor-p-5 background-white garmentor-m-6 table-responsive">
        <div id="designers-container">
            <designers-container :items="{{$list}}"/>
        </div>
    </div>

    <script src="{{asset('js/admin/designers/launch.js')}}"></script>
@endsection
