<div class="modal fade" id="measurementChartsModal" tabindex="-1" role="dialog" aria-labelledby="measurementChartsModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Measurement Charts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($measurementCharts as $measurementChart)
                    <div class="card" style="background: 1px solid">
                        <img class="card-img-top" src="{!! $measurementChart->getChartImage() !!}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{$measurementChart->title}}</h5>
                            <p class="card-text">{{$measurementChart->description}}</p>
                            <button class="btn btn-primary measurement-chart-id" data-measurement-chart-id="{{$measurementChart->id}}">Choose</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('footer_scripts')
    <script type="text/javascript">
        measurementsConfigData          = {!! json_encode(config('charts')) !!};
        measurementsChartImages         = {!! json_encode($measurementsChartImages) !!};

        $(document).ready(function()
        {
            HYDMeasurements.init();
        });
    </script>
@endsection