<?php namespace App\Http\Controllers\Admin;

/**
 * Class AdminDashboardController
 * @package App\Http\Controllers\Admin
 */

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    /**
     * AdminDashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Admin Dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDashboard()
    {
        return view('admin.dashboard.dashboard');
    }
}