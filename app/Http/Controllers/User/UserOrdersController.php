<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserOrdersController extends Controller
{
    /**
     * UserOrdersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ordersList()
    {
        return view('user.orders.list');
    }
}