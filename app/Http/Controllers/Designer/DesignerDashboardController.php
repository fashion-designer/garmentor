<?php namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;

/**
 * Class DesignerDashboardController
 * @package App\Http\Controllers\Designer
 */
class DesignerDashboardController extends Controller
{
    public function __construct()
    {

    }

    public function getDashboard()
    {
        return view('designer.dashboard');
    }
}