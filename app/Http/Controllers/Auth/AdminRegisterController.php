<?php namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gender\Gender;
use App\Repositories\EmailVerification\EmailVerificationRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * Class AdminRegisterController
 * @package App\Http\Controllers\Auth
 */
class AdminRegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $genders = (new Gender())->get(['id', 'name']);

        return view('auth.admin-register')->with(['genders' => $genders]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'gender_id' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return Admin|\Illuminate\Database\Eloquent\Model
     */
    protected function create(array $data)
    {
        return Admin::create([
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'phone'         => $data['phone'],
            'gender_id'     => intval($data['gender_id']),
            'is_active'     => 0,
            'is_verified'   => 0,
        ]);
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

    public function setupAdminPassword(Request $request, $id)
    {
        return view('emails.set-password')->with(['id' => $id]);
    }
}