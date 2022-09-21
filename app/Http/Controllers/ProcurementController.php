<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menulist;
use App\Models\Menus;
use Illuminate\Validation\Rule;

use App\Models\Procurement;

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

        $procurements = Procurement::get();

        return view('app.procurement.index', compact('procurements'));
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = new Procurement;

        $request->validate([
            'vendor_id'      => 'required',
            'department_id' => 'required',
            'fmis_ref_no'      => 'required',
            'fiscal_year'    => 'required',
            'date-picker-purchase_date'          => 'required',
            'chart_of_account_id'  => 'required',
            'amount'      => 'required',
            'description'      => 'required'
        ]);

        $vendor->vendor_id      = $request->input('vendor_id');
        $vendor->department_id    = $request->input('department_id')??1;
        $vendor->fmis_ref_no = $request->input('fmis_ref_no');
        $vendor->fiscal_year = $request->input('fiscal_year');
        $vendor->purchase_date = $request->input('date-picker-purchase_date')??date('Y-m-d 00:00:00');
        $vendor->chart_of_account_id = $request->input('chart_of_account_id');
        $vendor->amount = $request->input('amount');

        if ($vendor->save()) {
            return redirect()->route('vendor.index');
        }
    }

}
