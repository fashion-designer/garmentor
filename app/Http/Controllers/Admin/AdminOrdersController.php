<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    /**
     * AdminOrdersController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ordersList()
    {
        return view('admin.orders.list');
    }
}