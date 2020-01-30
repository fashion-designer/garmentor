<?php namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;

class DesignerOrdersController extends Controller
{
    /**
     * DesignerOrdersController constructor.
     */
    public function __construct()
    {
        $this->middleware('designer');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ordersList()
    {
        return view('designer.orders.list');
    }
}