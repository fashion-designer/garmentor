@extends('admin.layouts.layout', ['activeTab' => 'profile'])

@section('content')
    <form method="post" action="{!! route('admin.profile.update') !!}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="app-title">
            <h1><i class="fas fa-id-card"></i> Profile</h1>
            <span class="pull-right">
                <button type="submit" class="btn btn-success">Update</button>
            </span>
        </div>
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <div class="hyd-m-t-6 hyd-m-b-6 hyd-m-l-6 hyd-m-r-3 hyd-p-6 border-radius-5 background-white">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter first name here" required value="{!! $profile->first_name !!}">
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter last name here" required value="{!! $profile->last_name !!}">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email here" required value="{!! $profile->email !!}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Enter phone here" required value="{!! $profile->phone !!}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Update password">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender_id" class="form-control" required>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}" {!! ($gender->id === $profile->id) ? 'selected' : '' !!}>{{$gender->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="hyd-m-r-6">Active</label>
                                <input name="is_active" class="form-control" type="checkbox" {!! ($profile->is_active === 1) ? 'checked' : '' !!} data-toggle="toggle" data-size="sm" data-onstyle="success" data-offstyle="danger" data-on="Yes" data-off="No">
                            </div>
                            <div class="form-group">
                                <label class="hyd-m-r-6">Verified</label>
                                <input name="is_verified" class="form-control" type="checkbox" {!! ($profile->is_verified === 1) ? 'checked' : '' !!} data-toggle="toggle" data-size="sm" data-onstyle="success" data-offstyle="danger" data-on="Yes" data-off="No">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
