<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\UserRepository;
use App\User;
use Illuminate\Http\Request;

/**
 * Class AdminUsersController
 * @package App\Http\Controllers\Admin
 */
class AdminUsersController extends Controller
{
    /**
     * @var UserRepository
     */
    public $repository;

    /**
     * AdminUsersController constructor.
     */
    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->middleware('admin');
    }

    /**
     * Users List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getList()
    {
        $list   = $this->repository->getList();
        $alert  = garmentor_get_alert_message_cookie();

        return view('admin.users.list')->with([
            'list'      => $list,
            'alert'     => ($alert) ? $alert : false,
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $profile = $this->repository->getUserProfile($id);

        return view('admin.users.edit')->with(['profile' => $profile[0]]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->repository->updateUserProfile($id, $request->all());

        return redirect()->route('admin.users-list.edit', $id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function invite(Request $request)
    {
        $genders = $this->repository->getAllGenders();

        return view('admin.users.invite')->with(['genders' => $genders]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendInvitation(Request $request)
    {
        $accountDetails = (new User())->where('email', $request->get('email'))->first();

        if($accountDetails)
        {
            $alertMessage   = 'An account with this email already exist!';
            $alertType      = 'danger';
        }
        else
        {
            $invited = $this->repository->sendInvitation($request->all());
            if($invited)
            {
                $alertMessage   = 'Invited admin successfully!';
                $alertType      = 'success';
            }
            else
            {
                $alertMessage   = 'Failed to invite admin!';
                $alertType      = 'danger';
            }
        }
        garmentor_set_alert_message_cookie($alertMessage, $alertType);

        return redirect()->route('admin.users-list');
    }
}