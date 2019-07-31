<?php namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class DesignerOrdersController
 * @package App\Http\Controllers\Designer
 */
class DesignerOrdersController extends Controller
{
    public function __construct()
    {

    }

    public function create()
    {
        return view('designer.orders.create');
    }

    public function post(Request $request)
    {
        dd($request->all());
    }
}