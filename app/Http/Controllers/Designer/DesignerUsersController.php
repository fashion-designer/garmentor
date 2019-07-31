<?php namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class DesignerUsersController
 * @package App\Http\Controllers\Designer
 */
class DesignerUsersController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {

    }

    public function create()
    {
        return view('designer.users.create');
    }

    public function post(Request $request)
    {
        dd($request->all());
    }
}