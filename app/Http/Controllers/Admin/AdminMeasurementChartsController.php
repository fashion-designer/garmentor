<?php namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AdminMeasurementChartsController
 * @package App\Http\Controllers\Admin
 */
class AdminMeasurementChartsController extends Controller
{
    public function __construct()
    {

    }

    public function create(Request $request)
    {
        return view('admin.measurements.create');
    }
}