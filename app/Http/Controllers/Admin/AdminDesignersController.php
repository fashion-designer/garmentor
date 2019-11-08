<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\DesignerRepository;
use Illuminate\Http\Request;

/**
 * Class AdminDashboardController
 * @package App\Http\Controllers\Admin
 */
class AdminDesignersController extends Controller
{
    /**
     * @var DesignerRepository
     */
    public $repository;

    /**
     * AdminDesignersController constructor.
     */
    public function __construct()
    {
        $this->repository = new DesignerRepository();
        $this->middleware('admin');
    }

    /**
     * Designers List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getList()
    {
        $list = $this->repository->getList();

        return view('admin.designers.list')->with(['list' => $list]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $profile = $this->repository->getDesignerProfile($id);

        return view('admin.designers.edit')->with(['profile' => $profile[0]]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->repository->updateDesignerProfile($id, $request->all());

        return redirect()->route('admin.designers-list.edit', $id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $genders = $this->repository->getAllGenders();

        return view('admin.designers.create')->with(['genders' => $genders]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $this->repository->save($request->all());

        return redirect()->route('admin.designers-list');
    }
}