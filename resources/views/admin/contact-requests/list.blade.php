@extends('admin.layouts.layout', ['activeTab' => 'contact-requests'])

@section('content')
    <div class="app-title">
        <h1><i class="fas fa-file-signature"></i> Contact Requests</h1>
    </div>
    @if(isset($alert) && $alert)
        @include('shared.alert', ['alert' => $alert])
    @endif
    <div class="garmentor-p-5 background-white garmentor-m-6">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Requested On</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allRequests as $item)
                <tr>
                    <td>{!! $item->first_name !!} {!! $item->last_name !!}</td>
                    <td>{!! $item->email !!}</td>
                    <td>{!! $item->country_code !!} {!! $item->phone !!}</td>
                    <td>{!! garmentor_get_human_readable_time($item->created_at) !!}</td>
                    <td class="text-center"><a class="btn btn-info btn-sm" href="{!! route('admin.contact-requests.view', $item->id) !!}">View</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection