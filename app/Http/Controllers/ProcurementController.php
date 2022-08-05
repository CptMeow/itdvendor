<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menulist;
use App\Models\Menus;
use Illuminate\Validation\Rule;

class ProcurementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
    }

    public function index(Request $request){
        return view('app.procurement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.procurement.create');
    }

}
