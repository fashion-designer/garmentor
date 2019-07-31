@extends('admin.layouts.layout')

@section('content')
    <form action="{!! route('admin.measurements.update', $item['id']) !!}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
    <div class="app-title">
        <h1><i class="fas fa-ruler-combined"></i> Edit Chart</h1>
        <button class="btn btn-success" type="submit">Update</button>
    </div>
    <div class="content-container card">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="pwd">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{!! $item['title'] !!}">
                </div>
                <div class="form-group">
                    <label for="pwd">Description:</label>
                    <textarea class="form-control" id="description" name="description">{!! $item['description'] !!}</textarea>
                </div>
                <img src="{!! $item['image'] !!}" class="center" style="max-width: 400px; max-height: 400px; border: solid 1px">
            </div>
            <div class="col-lg-6">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Key Number</th>
                        <th>Key Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item['configKeys'] as $keyNumber => $keyName)
                        <tr>
                            <td>{!! $keyNumber !!}</td>
                            <td>{!! $keyName !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
@endsection