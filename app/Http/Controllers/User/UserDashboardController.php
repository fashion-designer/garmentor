<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

/**
 * Class UserDashboardController
 * @package App\Http\Controllers\User
 */
class UserDashboardController extends Controller
{
    public function __construct()
    {

    }

    public function getDashboard()
    {
        return view('user.dashboard');
    }
}