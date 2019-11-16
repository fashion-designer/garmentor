<?php namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\AdminRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AdminAdminsController
 * @package App\Http\Controllers\Admin
 */
class AdminAdminsController extends Controller
{
    /**
     * @var AdminRepository
     */
    public $repository;

    /**
     * AdminDesignersController constructor.
     */
    public function __construct()
    {
        $this->repository = new AdminRepository();
        $this->middleware('admin');
    }

    /**
     * Designers List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getList()
    {
        $list = $this->repository->getList();

        return view('admin.admins.list')->with(['list' => $list]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        if($id == auth('admin')->id())
        {
            return redirect()->route('admin.profile.edit');
        }

        $profile = $this->repository->getAdminProfile($id);

        return view('admin.admins.edit')->with(['profile' => $profile[0]]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->repository->updateAdminProfile($id, $request->all());

        return redirect()->route('admin.admins-list.edit', $id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $genders = $this->repository->getAllGenders();

        return view('admin.admins.create')->with(['genders' => $genders]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $this->repository->save($request->all());

        return redirect()->route('admin.admins-list');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editMyProfile(Request $request)
    {
        $profileData = $this->repository->getMyProfile();
        $genders = $this->repository->getAllGenders();

        return view('admin.profile.profile')->with([
            'profile' => $profileData,
            'genders' => $genders
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateMyProfile(Request $request)
    {
        $this->repository->updateMyProfile($request->all());

        return redirect()->route('admin.profile.edit');
    }
}