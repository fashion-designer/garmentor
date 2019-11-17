@extends('admin.layouts.layout', ['activeTab' => 'admins'])

@section('content')
    <div class="app-title">
        <h1><i class="fas fa-list"></i> Admins List</h1>
        <span class="pull-right">
            <a href="{!! route('admin.admins-list.create') !!}" class="btn btn-info">Create New Admin Account</a>
        </span>
    </div>
    <div class="hyd-p-5 background-white hyd-m-6">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Designer Name</th>
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
                    <td>{!! $item->first_name !!} {!! $item->last_name !!} {!! (auth('admin')->id() === $item->id) ? '<span class="badge badge-pill badge-dark">My Profile</span>' : '' !!} </td>
                    <td>{!! $item->email !!}</td>
                    <td>{!! $item->phone !!}</td>
                    <td>{!! $item->getGender->name !!}</td>
                    <td class="text-center">{!! ($item->is_verified) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' !!}</td>
                    <td class="text-center">{!! ($item->is_active) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' !!}</td>
                    <td class="text-center"><a class="btn btn-info btn-sm" href="{!! route('admin.admins-list.edit', $item->id) !!}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection