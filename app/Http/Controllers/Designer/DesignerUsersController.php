<?php namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\Gender\Gender;
use App\Models\MeasurementChart\MeasurementChart;
use App\Repositories\DesignerUserRepository;
use Illuminate\Http\Request;

/**
 * Class DesignerUsersController
 * @package App\Http\Controllers\Designer
 */
class DesignerUsersController extends Controller
{
    /**
     * DesignerUser Repository
     *
     * @var DesignerUserRepository
     */
    public $repository;

    /**
     * DesignerUsersController constructor.
     */
    public function __construct()
    {
        $this->repository = new DesignerUserRepository();
    }

    /**
     * Create New
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $measurementsCharts = (new MeasurementChart())->get();
        $chartImages        = [];

        foreach($measurementsCharts as $measurementsChart)
        {
            $chartImages[$measurementsChart->id] = $measurementsChart->getChartImage();
        }

        return view('designer.users.create')->with([
            'genders'               => (new Gender())->get(),
            'measurementCharts'     => $measurementsCharts,
            'chartImages'           => $chartImages
        ]);
    }

    public function post(Request $request)
    {
        $result = $this->repository->create($request->all());
    }
}