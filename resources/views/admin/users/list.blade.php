@extends('admin.layouts.layout', ['activeTab' => 'users'])

@section('content')
    <div class="app-title">
        <h1><i class="fas fa-list"></i> Users List</h1>
    </div>
    <div class="hyd-p-5 background-white hyd-m-6">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th class="text-center">Verified</th>
                <th class="text-center">Active</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $item)
                <tr>
                    <td>{!! $item->first_name !!} {!! $item->last_name !!}</td>
                    <td>{!! $item->email !!}</td>
                    <td>{!! $item->phone !!}</td>
                    <td>{!! $item->getGender->name !!}</td>
                    <td class="text-center">{!! ($item->is_verified) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' !!}</td>
                    <td class="text-center">{!! ($item->is_active) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' !!}</td>
                    <td class="text-center"><a class="btn btn-info btn-sm" href="{!! route('admin.users-list.edit', $item->id) !!}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
