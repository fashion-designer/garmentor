<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gender\Gender;
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
        return view('auth.verification-email');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitEmailAdmin(Request $request)
    {
        $emailVerificationRepository = new EmailVerificationRepository(new \App\Admin());

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
        return view('auth.verification')->with(['id' => $id]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function verifyAdminSubmit(Request $request, $id)
    {
        $emailVerificationRepository = new EmailVerificationRepository(new \App\Admin());

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
        $genders = (new Gender())->get(['id', 'name']);
        return view('auth.set-password')->with([
            'id' => $id,
            'genders' => $genders
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
        $emailVerificationRepository = new EmailVerificationRepository(new \App\Admin());

        $registrationCompleted = $emailVerificationRepository->setPassword($request->all(), $id);

        if($registrationCompleted)
        {
            return redirect('admin/login');
        }

        return redirect('/');
    }
}