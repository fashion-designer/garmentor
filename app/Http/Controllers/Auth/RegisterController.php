<?php

namespace App\Http\Controllers\Auth;

use App\Mail\Invitation;
use App\Models\Gender\Gender;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'verify-user';

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
        $alert      = garmentor_get_alert_message_cookie();

        return view('auth.register')->with([
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

        $accountDetails = (new User())->where('email', $request->get('email'))->first();

        if($accountDetails)
        {
            if($accountDetails->is_active !== 1)
            {
                $alertMessage   = 'You can not create an account with this email!';
                $alertType      = 'danger';

                garmentor_set_alert_message_cookie($alertMessage, $alertType);
                return redirect()->back();
            }

            if($accountDetails->is_verified !== 1)
            {
                $alertMessage   = 'An account with this email already exist!';
                $alertType      = 'danger';

                garmentor_set_alert_message_cookie($alertMessage, $alertType);
                $this->redirectTo = $this->redirectTo . '/' . $accountDetails->id;

                return redirect('send-verification-user');
            }

            $alertMessage   = 'An account with this email already exist!';
            $alertType      = 'danger';

            garmentor_set_alert_message_cookie($alertMessage, $alertType);

            return redirect('admin/login');
        }

        event(new Registered($user = $this->create($request->all())));

        $invitationCode = str_random(6);
        $invitationLink = route('verify-user', $user->id);

        Mail::to($user)->send(new Invitation('user', $invitationCode, $invitationLink));

        $user->update(['verification_code' => $invitationCode]);

        $this->redirectTo   = $this->redirectTo . '/' . $user->id;
        $alertMessage       = 'Successfully registered!';
        $alertType          = 'success';

        garmentor_set_alert_message_cookie($alertMessage, $alertType);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
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
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|string|email',
            'gender_id'     => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
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
