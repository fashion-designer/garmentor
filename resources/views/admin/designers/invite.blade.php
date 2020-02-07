@extends('admin.layouts.layout', ['activeTab' => 'designers'])

@section('content')
    <form method="post" action="{!! route('admin.designers-list.send-invitation') !!}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="app-title">
            <h1 style="margin-bottom: 10px"><i class="fas fa-id-card"></i> Invite Designer Profile</h1>
            <span class="pull-right">
                <button type="submit" class="btn btn-success">Send Invitation</button>
            </span>
        </div>
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <div class="garmentor-m-t-6 garmentor-m-b-6 garmentor-m-l-6 garmentor-m-r-6 garmentor-p-6 border-radius-5 background-white">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter first name here" required>
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter last name here" required>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email here" required>
                            </div>
                            @include('shared.country-codes')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection