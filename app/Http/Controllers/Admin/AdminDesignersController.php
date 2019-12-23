<?php namespace App\Http\Controllers\Admin;

use App\Designer;
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
        $list   = $this->repository->getList();
        $alert  = hyd_get_alert_message_cookie();

        return view('admin.designers.list')->with([
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
    public function invite(Request $request)
    {
        $genders = $this->repository->getAllGenders();

        return view('admin.designers.invite')->with(['genders' => $genders]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendInvitation(Request $request)
    {
        $accountDetails = (new Designer())->where('email', $request->get('email'))->first();

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
        hyd_set_alert_message_cookie($alertMessage, $alertType);

        return redirect()->route('admin.designers-list');
    }
}