<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use App\Models\Vendor;
use App\Libraries\Helper;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $vendors = Vendor::count();
        $procurements = Procurement::count();
        $amount = Procurement::sum('amount');

        return view('app.dashboard.index', compact('amount', 'procurements', 'vendors'));
    }
}
