<?php namespace App\Http\Controllers\Auth;

use App\Designer;
use App\Http\Controllers\Controller;
use App\Models\Gender\Gender;
use App\Admin;
use App\Repositories\EmailVerification\EmailVerificationRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    /**
     * EmailVerificationController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sendVerificationAdmin()
    {
        $alert = hyd_get_alert_message_cookie();

        return view('auth.verification.email')->with([
            'route' => route('send-verification-admin'),
            'alert' => ($alert) ? $alert : false
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitEmailAdmin(Request $request)
    {
        $emailVerificationRepository = new EmailVerificationRepository('admin', new \App\Admin());

        if($emailVerificationRepository->checkIfAccountEmailExist($request->all()))
        {
            $accountId = $emailVerificationRepository->sendVerificationEmail($request->all());

            if($accountId)
            {
                return redirect(route('verify-admin', $accountId));
            }
        }

        return redirect()->back();
    }

    /**
     * Verify Admin
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verifyAdmin(Request $request, $id)
    {
        return view('auth.verification.invitation-code')->with([
            'id'    => $id,
            'route' => route('verify-admin', [$id])
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function verifyAdminSubmit(Request $request, $id)
    {
        $emailVerificationRepository = new EmailVerificationRepository('admin', new \App\Admin());

        if($emailVerificationRepository->isVerificationEmailSent($id))
        {
            $isVerified = $emailVerificationRepository->verifyEmail($request->all(), $id);

            if($isVerified)
            {
                return redirect(route('setup-password-admin', $id));
            }

            return redirect()->back();
        }

        return redirect('');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setupAdminPassword(Request $request, $id)
    {
        $genderSelected = (new Admin)->where('id', $id)->value('gender_id');

        if(!$genderSelected)
        {
            $genders = (new Gender())->get(['id', 'name']);
        }

        return view('auth.set-password')->with([
            'id'        => $id,
            'genders'   => (isset($genders)) ? $genders : null,
            'route'     => route('setup-password-admin', $id)
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setupAdminPasswordSubmit(Request $request, $id)
    {
        $this->validator($request->all())->validate();

        $emailVerificationRepository = new EmailVerificationRepository('admin', new \App\Admin());

        $registrationCompleted = $emailVerificationRepository->setPassword($request->all(), $id);

        if($registrationCompleted)
        {
            return redirect('admin/login');
        }

        return redirect('/');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sendVerificationDesigner()
    {
        $alert  = hyd_get_alert_message_cookie();

        return view('auth.verification.email')->with([
            'route'     => route('send-verification-designer'),
            'alert'     => ($alert) ? $alert : false,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitEmailDesigner(Request $request)
    {
        $emailVerificationRepository = new EmailVerificationRepository('designer', new \App\Designer());

        if($emailVerificationRepository->checkIfAccountEmailExist($request->all()))
        {
            $accountId = $emailVerificationRepository->sendVerificationEmail($request->all());

            if($accountId)
            {
                return redirect(route('verify-designer', $accountId));
            }
        }

        return redirect()->back();
    }

    /**
     * Verify Designer
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verifyDesigner(Request $request, $id)
    {
        return view('auth.verification.invitation-code')->with([
            'id' => $id,
            'route' => route('verify-designer', [$id])
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function verifyDesignerSubmit(Request $request, $id)
    {
        $emailVerificationRepository = new EmailVerificationRepository('designer', new \App\Designer());

        if($emailVerificationRepository->isVerificationEmailSent($id))
        {
            $isVerified = $emailVerificationRepository->verifyEmail($request->all(), $id);

            if($isVerified)
            {
                return redirect(route('setup-password-designer', $id));
            }

            return redirect()->back();
        }

        return redirect('');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setupDesignerPassword(Request $request, $id)
    {
        $genderSelected = (new Designer())->where('id', $id)->value('gender_id');

        if(!$genderSelected)
        {
            $genders = (new Gender())->get(['id', 'name']);
        }

        return view('auth.set-password')->with([
            'id'        => $id,
            'genders'   => (isset($genders)) ? $genders : null,
            'route'     => route('setup-password-designer', $id)
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setupDesignerPasswordSubmit(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $emailVerificationRepository = new EmailVerificationRepository('designer', new \App\Designer());

        $registrationCompleted = $emailVerificationRepository->setPassword($request->all(), $id);

        if($registrationCompleted)
        {
            return redirect('designer/login');
        }

        return redirect('/');
    }
}