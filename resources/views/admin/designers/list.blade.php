@extends('admin.layouts.layout', ['activeTab' => 'designers'])

@section('content')
    <div class="app-title">
        <h1><i class="fas fa-list"></i> Designers List</h1>
    </div>
    <div class="app-container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Designer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th class="text-center">Verified</th>
                <th class="text-center">Active</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $item)
                <tr>
                    <th scope="row">{!! $item->first_name !!} {!! $item->last_name !!}</th>
                    <td>{!! $item->email !!}</td>
                    <td>{!! $item->phone !!}</td>
                    <td>{!! $item->getGender->name !!}</td>
                    <td class="text-center">{!! ($item->is_verified) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' !!}</td>
                    <td class="text-center">{!! ($item->is_active) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
