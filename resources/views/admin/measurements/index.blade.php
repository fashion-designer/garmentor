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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td style="max-height: 200px; max-width: 200px">
                                <img src="{!! $item->image !!}" alt="{{$item->title}}" />
                            </td>
                            <td>{!! $item->title !!}</td>
                            <td>{!! $item->description !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection