@extends('designer.layouts.layout')

@section('js_files')
    <script type="application/javascript" src="{{ asset('js/measurements/measurements.js') }}"></script>
@endsection

@section('content')
    <form action="{!! route('designer.users.post') !!}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="app-title">
            <h1><i class="fas fa-plus-circle"></i> Create New User</h1>
            <button class="btn btn-success" type="submit">Save</button>
        </div>
        <div class="content-container card">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender_id">
                            <option value="null">Select One</option>
                            @foreach($genders as $gender)
                                <option value="{{$gender->id}}">{{$gender->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="measurement">Add Measurements:</label>

                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="display: contents">Measurements</h3>
                            <div class="float-right">
                                <button type="button" class="btn btn-primary" id="addMeasurementsButton" data-toggle="modal" data-target="#measurementChartsModal">Add</button>
                                <button type="button" class="btn btn-warning d-none" id="removeMeasurementsButton">Remove</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="chartId" id="measurementsChartSelectedId">
                            <img alt="Selected Chart" class="invisible" style="width: 300px; height: 300px" src="#" id="measurementChartsSelectedImage">
                            <div id="measurementChartsConfigData" style="max-height: 150px; overflow-y: auto">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('includes.measurement-charts', [
    'measurementCharts'         => $measurementCharts,
    'measurementsChartImages'   => $chartImages
    ])
@endsection