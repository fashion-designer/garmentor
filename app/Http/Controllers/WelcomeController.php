<?php namespace App\Http\Controllers;

use App\Repositories\Admin\ContactFormRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * WelcomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming request.
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
            'comment'       => 'required'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactUs()
    {
        return view('contact-us');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContactForm(Request $request)
    {
        $this->validator($request->all())->validate();

        (new ContactFormRepository())->submitContactForm($request->all());

        return redirect()->to('/');
    }
}