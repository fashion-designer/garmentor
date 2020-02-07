@extends('admin.layouts.layout', ['activeTab' => 'contact-requests'])

@section('content')
    <div class="app-title">
        <h1 style="margin-bottom: 10px"><i class="fas fa-file-signature"></i> Contact Requests Details</h1>
        <span class="pull-right">
            <a type="button" class="btn btn-info" href="{!! redirect()->back() !!}">Back</a>
        </span>
    </div>
    <div class="row m-0">
        <div class="col-lg-6 p-0">
            <div class="garmentor-m-t-6 garmentor-m-b-6 garmentor-m-l-6 garmentor-m-r-3 garmentor-p-6 border-radius-5 background-white">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>First Name</td>
                                <td>{!! $details->first_name !!}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{!! $details->last_name !!}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{!! $details->email !!}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{!! $details->country_code !!} {!! $details->phone !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 p-0">
            <div class="garmentor-m-t-6 garmentor-m-b-6 garmentor-m-l-3 garmentor-m-r-6 garmentor-p-6 border-radius-5 background-white">
                <div class="card">
                    <div class="card-header text-center">
                        Request Comment
                    </div>
                    <div class="card-body">
                        {{$details->comment}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection