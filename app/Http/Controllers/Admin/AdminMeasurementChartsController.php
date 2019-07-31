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

    /**
     * AdminMeasurementChartsController constructor.
     */
    public function __construct()
    {
        $this->repository = new MeasurementRepository();
    }

    /**
     * View All List
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $list = $this->repository->index();

        return view('admin.measurements.index')->with([
            'list' => $list
        ]);
    }

    /**
     * Create Form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.measurements.create');
    }

    /**
     * Save
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function post(Request $request)
    {
        $input  = $request->all();
        $result = $this->repository->create($input, $request->file('chart_file'));

        if($result)
        {
            return redirect(route('admin.measurements.index'));
        }

        return redirect()->back()->withInput();
    }

    /**
     * Edit
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $item = $this->repository->getConfigData($id);

        return view('admin.measurements.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $result = $this->repository->update($id, $request->all());

        return redirect(route('admin.measurements.index'));
    }
}