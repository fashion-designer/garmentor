<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Designer\DesignerRepository;
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

    public function edit(Request $request, $id)
    {
        $profile = $this->repository->getDesignerProfile($id);

        return view('admin.designers.edit')->with(['profile' => $profile[0]]);
    }
}