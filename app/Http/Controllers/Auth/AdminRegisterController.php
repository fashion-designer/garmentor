<?php namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Mail\Invitation;
use App\Models\Gender\Gender;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    protected $redirectTo = 'verify-admin';

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
        $genders    = (new Gender())->get(['id', 'name']);
        $alert      = hyd_get_alert_message_cookie();

        return view('auth.admin-register')->with([
            'genders'   => $genders,
            'alert'     => ($alert) ? $alert : false,
        ]);
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

        $accountDetails = (new Admin())->where('email', $request->get('email'))->first();

        if($accountDetails)
        {
            if($accountDetails->is_active !== 1)
            {
                $alertMessage   = 'You can not create an account with this email!';
                $alertType      = 'danger';

                hyd_set_alert_message_cookie($alertMessage, $alertType);

                return redirect()->back();
            }

            if($accountDetails->is_verified !== 1)
            {
                $alertMessage   = 'An account with this email already exist!';
                $alertType      = 'danger';

                hyd_set_alert_message_cookie($alertMessage, $alertType);
                $this->redirectTo = $this->redirectTo . '/' . $accountDetails->id;

                return redirect('send-verification-admin');
            }

            $alertMessage   = 'An account with this email already exist!';
            $alertType      = 'danger';

            hyd_set_alert_message_cookie($alertMessage, $alertType);

            return redirect('admin/login');
        }

        event(new Registered($user = $this->create($request->all())));

        $invitationCode = str_random(6);
        $invitationLink = route('verify-admin', $user->id);

        Mail::to($user)->send(new Invitation('admin', $invitationCode, $invitationLink));

        $user->update(['verification_code' => $invitationCode]);

        $this->redirectTo   = $this->redirectTo . '/' . $user->id;
        $alertMessage       = 'Successfully registered!';
        $alertType          = 'success';

        hyd_set_alert_message_cookie($alertMessage, $alertType);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
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
            'country_code'  => $data['country_code'],
            'phone'         => $data['phone'],
            'gender_id'     => intval($data['gender_id']),
            'is_active'     => 1,
            'is_verified'   => 0,
        ]);
    }
}