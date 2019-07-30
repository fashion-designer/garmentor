<?php namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Repositories\MeasurementRepository;
use Illuminate\Http\Request;

/**
 * Class AdminMeasurementChartsController
 * @package App\Http\Controllers\Admin
 */
class AdminMeasurementChartsController extends Controller
{
    /**
     * Measurement Repository
     *
     * @var MeasurementRepository
     */
    public $repository;

    public function __construct()
    {
        $this->repository = new MeasurementRepository();
    }

    public function index(Request $request)
    {
        $list = $this->repository->index();

        return view('admin.measurements.index')->with([
            'list' => $list
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.measurements.create');
    }

    public function post(Request $request)
    {
        $input              = $request->all();
        $input['chart_id']  = '1';

        $result = $this->repository->create($input);

        if($result)
        {
            return redirect('admin.measurements.index');
        }

        return redirect()->back()->withInput();
    }
}