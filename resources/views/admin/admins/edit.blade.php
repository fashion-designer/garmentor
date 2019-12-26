@extends('admin.layouts.layout', ['activeTab' => 'admins'])

@section('content')
    <form method="post" action="{!! route('admin.admins-list.update', [$profile->id]) !!}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="app-title">
            <h1><i class="fas fa-id-card"></i> Admins Profile</h1>
            <span class="pull-right">
                <button type="submit" class="btn btn-success">Update Profile</button>
            </span>
        </div>
        <div class="row m-0">
            @if(isset($alert) && $alert)
                @include('shared.alert', ['alert' => $alert])
            @endif
            <div class="col-lg-6 p-0">
                <div class="hyd-m-t-6 hyd-m-b-6 hyd-m-l-6 hyd-m-r-3 hyd-p-6 border-radius-5 background-white">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>First Name</td>
                                    <td>{!! $profile->first_name !!}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>{!! $profile->last_name !!}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{!! $profile->email !!}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{!! $profile->country_code !!} {!! $profile->phone !!}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{!! isset($profile->getGender->name) ? $profile->getGender->name : '---' !!}</td>
                                </tr>
                                <tr>
                                    <td>Active</td>
                                    <td><input name="is_active" type="checkbox" class="form-control" data-toggle="toggle" data-size="sm" {!! ($profile->is_active === 1) ? 'checked' : '' !!} data-onstyle="success" data-offstyle="danger" data-on="Yes" data-off="No"></td>
                                </tr>
                                <tr>
                                    <td>Verified</td>
                                    <td><input name="is_verified" class="form-control" type="checkbox" data-toggle="toggle" data-size="sm" {!! ($profile->is_verified === 1) ? 'checked' : '' !!} data-onstyle="success" data-offstyle="danger" data-on="Yes" data-off="No"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="hyd-m-t-6 hyd-m-b-6 hyd-m-l-3 hyd-m-r-6 hyd-p-6 border-radius-5 background-white">
                    <div class="card">
                        <div class="card-body">
                            <div class="border rounded-lg text-center hyd-p-6">
                                <div class="card-body">
                                    @include('shared.profile-image', [
                                    'imageSource'   => $profile['display_image'],
                                    'allowEdit'     => false
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
