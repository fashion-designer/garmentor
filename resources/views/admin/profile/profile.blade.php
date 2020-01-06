@extends('admin.layouts.layout', ['activeTab' => 'profile'])

@section('content')
    <form method="post" action="{!! route('admin.profile.update') !!}" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="app-title">
            <h1><i class="fas fa-id-card"></i> Profile</h1>
            <span class="pull-right">
                <button type="submit" class="btn btn-success">Update</button>
            </span>
        </div>
        <div class="row m-0">
            @if(isset($alert) && $alert)
                @include('shared.alert', ['alert' => $alert])
            @endif
            <div class="col-lg-6 p-0">
                <div class="garmentor-m-t-6 garmentor-m-b-6 garmentor-m-l-6 garmentor-m-r-3 garmentor-p-6 border-radius-5 background-white">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-12 control-label">First Name</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{!! $profile->first_name !!}" required autofocus>
                                @if ($errors->has('first_name'))
                                    <span class="help-block garmentor-color-red">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-12 control-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{!! $profile->last_name !!}" required autofocus>
                                @if ($errors->has('last_name'))
                                    <span class="help-block garmentor-color-red">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{!! $profile->email !!}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block garmentor-color-red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @include('shared.country-codes', [
                                'selectedCountryCode'   => $profile->country_code,
                                'selectedPhone'         => $profile->phone
                            ])
                            <div class="form-group">
                                <label for="gender_id" class="col-md-12 control-label">Gender</label>
                                <select name="gender_id" id="gender_id" class="form-control" required autofocus>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('gender_id'))
                                    <span class="help-block garmentor-color-red">
                                        <strong>{{ $errors->first('gender_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-12 control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block garmentor-color-red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="garmentor-m-t-6 garmentor-m-b-6 garmentor-m-l-3 garmentor-m-r-6 garmentor-p-6 border-radius-5 background-white">
                    <div class="card">
                        <div class="card-body">
                            @include('shared.profile-image', [
                            'imageSource'   => $profile['display_image'],
                            'allowEdit'     => true
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection