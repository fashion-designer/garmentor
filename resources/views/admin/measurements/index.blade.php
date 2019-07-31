@extends('admin.layouts.layout')

@section('content')
    <div class="app-title">
        <h1><i class="fas fa-list"></i> Measurement Charts</h1>
    </div>
    <div class="content-container card">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Chart</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td><img src="{!! $item->image !!}" style="max-height: 150px; max-width: 150px"/></td>
                            <td>{!! $item->title !!}</td>
                            <td>{!! $item->description !!}</td>
                            <td><a class="btn btn-info" href="{!! route('admin.measurements.edit', $item->id) !!}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection