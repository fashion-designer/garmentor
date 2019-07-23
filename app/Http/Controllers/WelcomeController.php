<?php namespace App\Http\Controllers;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function welcome()
    {
        return view('welcome');
    }
}