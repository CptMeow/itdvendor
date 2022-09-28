<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use App\Models\Vendor;
use App\Libraries\Helper;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
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
        
        if ($request->ajax()) {
            $records = Vendor::orderBy('juristic_name_th', 'asc')
                ->get();

            return datatables()->of($records)
                ->addIndexColumn()
                ->addColumn('juristic_type', function ($row) {
                    return Helper::JuristicType($row->juristic_type);
                })
                ->addColumn('action', function ($row) {
                    $html = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">';
                    $html .= '<a href="'.route('vendor.show', $row->getHashids()).'" class="btn btn-success text-white"><svg class="icon"><use xlink:href="'.asset("vendors/@coreui/icons/sprites/free.svg#cil-magnifying-glass").'"></use></svg></a>';
                    if(Auth::user()->hasRole('admin')) {
                    $html .= '<a href="'.route('vendor.edit', $row->getHashids()).'" class="btn btn-warning btn-edit text-white"><svg class="icon"><use xlink:href="'.asset("vendors/@coreui/icons/sprites/free.svg#cil-pencil").'"></use></svg></a>';
                    $html .= '<button data-rowid="' . $row->getHashids() . '" class="btn btn-danger btn-delete text-white"><svg class="icon"><use xlink:href="'.asset("vendors/@coreui/icons/sprites/free.svg#cil-trash ").'"></use></svg></button>';
                    }
                    $html .= '</div>';
                    
                    return $html;
                })
                ->toJson();
        }

        return view('app.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $vendor = new Vendor;

        if($request->input('juristic_type')== 1) {
            $request->validate([
                'juristic_id'      => 'required|min:13|max:13',
                // 'juristic_type'    => 'required',
                'juristic_name_th' => 'required',
                // 'juristic_name_en' => 'required',
                // 'juristic_status'  => 'required',
                // 'date-picker-register_date'    => 'required',
                // 'register_capital'      => 'required',
                // 'standard_id'      => 'required',
                'address'          => 'required',
                'sub_district_id'  => 'required',
                'district_id'      => 'required',
                'province_id'      => 'required',
                'postal_code'      => 'required',
                // 'juristic_phone'   => 'required',
                // 'mobile_number'    => 'required',
                // 'fex_number'       => 'required',
                // 'juristic_website' => 'required',
                // 'facebook_url'     => 'required',
                // 'line_id'          => 'required',
                // 'juristic_email'   => 'required',
            ]);
        }
        else {
            $request->validate([
                'juristic_id'      => 'required|min:13|max:13',
                // 'juristic_type'    => 'required',
                'juristic_name_th' => 'required',
                // 'juristic_name_en' => 'required',
                // 'juristic_status'  => 'required',
                'date-picker-register_date'    => 'required',
                'register_capital'      => 'required',
                // 'standard_id'      => 'required',
                'address'          => 'required',
                'sub_district_id'  => 'required',
                'district_id'      => 'required',
                'province_id'      => 'required',
                'postal_code'      => 'required',
                // 'juristic_phone'   => 'required',
                // 'mobile_number'    => 'required',
                // 'fex_number'       => 'required',
                // 'juristic_website' => 'required',
                // 'facebook_url'     => 'required',
                // 'line_id'          => 'required',
                // 'juristic_email'   => 'required',
            ]);
        }

        $vendor->juristic_id      = $request->input('juristic_id');
        $vendor->juristic_type    = $request->input('juristic_type')??1;
        $vendor->juristic_name_th = $request->input('juristic_name_th');
        $vendor->juristic_name_en = $request->input('juristic_name_en');
        $vendor->juristic_status = $request->input('juristic_status');
        $vendor->standard_id = $request->input('standard_id')??1;
        $vendor->register_date = $request->input('date-picker-register_date')??date('Y-m-d 00:00:00');
        $vendor->register_capital = $request->input('register_capital');
        $vendor->address = $request->input('address');
        $vendor->sub_district_id = $request->input('sub_district_id');
        $vendor->district_id = $request->input('district_id');
        $vendor->province_id = $request->input('province_id');
        $vendor->postal_code = $request->input('postal_code');
        $vendor->juristic_phone = $request->input('juristic_phone');
        $vendor->mobile_number = $request->input('mobile_number');
        $vendor->fex_number = $request->input('fex_number');
        $vendor->juristic_website = $request->input('juristic_website');
        $vendor->facebook_url = $request->input('facebook_url');
        $vendor->line_id = $request->input('line_id');
        $vendor->juristic_email = $request->input('juristic_email');

        if ($vendor->save()) {
            return redirect()->route('vendor.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $id = Hashids::decode($id)[0];

        if ($request->ajax()) {
            $records = Procurement::orderBy('fiscal_year', 'desc')
                ->where('vendor_id',$id);

            return datatables()->of($records)
                ->addIndexColumn()
                ->addColumn('account_name', function ($row) {
                    return Helper::ChartOfAccounts($row->chart_of_account_id);
                })
                ->addColumn('description_output', function ($row) {
                    $html = '<div>'.$row->description.'</div> ';
                    $html .= '<span class="badge bg-success">'.$row->fiscal_year.'</span> ';
                    $html .= '<span class="badge bg-info">'.Helper::Department($row->temp_department_id).'</span> ';
                    $html .= '<span class="badge bg-danger">ชื่อบัญชี: '.Helper::ChartOfAccounts($row->chart_of_account_id).'</span> ';
                    return $html;
                })
                ->addColumn('purchase_date_output', function ($row) {
                    return date_format($row->purchase_date, 'd/m/Y');
                })
                ->addColumn('amount_output', function ($row) {
                    return number_format($row->amount, 2);
                })
                ->addColumn('action', function ($row) {
                    $html = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">';
                    $html .= '<a href="'.route('vendor.show', $row->getHashids()).'" class="btn btn-success text-white"><svg class="icon"><use xlink:href="'.asset("vendors/@coreui/icons/sprites/free.svg#cil-magnifying-glass").'"></use></svg></a>';
                    $html .= '</div>';
                    
                    return $html;
                })
                ->rawColumns([
                    'fmis_ref_no_output',
                    'description_output',
                    'amount_output', 
                    'action'
                ])
                ->toJson();
        }

        $vendor = Vendor::find($id);
        $procurement_count = Procurement::where('vendor_id',$id)->count();
        return view('app.vendor.show', compact('vendor','procurement_count'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];
        $vendor = Vendor::find($id);
        return view('app.vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = Hashids::decode($id)[0];
        $vendor = Vendor::find($id);
        if($request->input('register_capital')== 1) {
            $request->validate([
                'juristic_id'      => 'required|min:13|max:13',
                // 'juristic_type'    => 'required',
                'juristic_name_th' => 'required',
                // 'juristic_name_en' => 'required',
                // 'juristic_status'  => 'required',
                // 'date-picker-register_date'    => 'required',
                // 'register_capital'      => 'required',
                // 'standard_id'      => 'required',
                'address'          => 'required',
                'sub_district_id'  => 'required',
                'district_id'      => 'required',
                'province_id'      => 'required',
                'postal_code'      => 'required',
                // 'juristic_phone'   => 'required',
                // 'mobile_number'    => 'required',
                // 'fex_number'       => 'required',
                // 'juristic_website' => 'required',
                // 'facebook_url'     => 'required',
                // 'line_id'          => 'required',
                // 'juristic_email'   => 'required',
            ]);
        }
        else {
            $request->validate([
                'juristic_id'      => 'required|min:13|max:13',
                // 'juristic_type'    => 'required',
                'juristic_name_th' => 'required',
                // 'juristic_name_en' => 'required',
                // 'juristic_status'  => 'required',
                'date-picker-register_date'    => 'required',
                'register_capital'      => 'required',
                // 'standard_id'      => 'required',
                'address'          => 'required',
                'sub_district_id'  => 'required',
                'district_id'      => 'required',
                'province_id'      => 'required',
                'postal_code'      => 'required',
                // 'juristic_phone'   => 'required',
                // 'mobile_number'    => 'required',
                // 'fex_number'       => 'required',
                // 'juristic_website' => 'required',
                // 'facebook_url'     => 'required',
                // 'line_id'          => 'required',
                // 'juristic_email'   => 'required',
            ]);
        }

        $vendor->juristic_id      = $request->input('juristic_id');
        $vendor->juristic_type    = $request->input('juristic_type');
        $vendor->juristic_name_th = $request->input('juristic_name_th');
        $vendor->juristic_name_en = $request->input('juristic_name_en');
        $vendor->juristic_status = $request->input('juristic_status');
        $vendor->standard_id = $request->input('standard_id');
        $vendor->register_date = $request->input('register_date');
        $vendor->address = $request->input('address');
        $vendor->sub_district_id = $request->input('sub_district_id');
        $vendor->district_id = $request->input('district_id');
        $vendor->province_id = $request->input('province_id');
        $vendor->postal_code = $request->input('postal_code');
        $vendor->juristic_phone = $request->input('juristic_phone');
        $vendor->mobile_number = $request->input('mobile_number');
        $vendor->fex_number = $request->input('fex_number');
        $vendor->juristic_website = $request->input('juristic_website');
        $vendor->facebook_url = $request->input('facebook_url');
        $vendor->line_id = $request->input('line_id');
        $vendor->juristic_email = $request->input('juristic_email');

        if ($vendor->save()) {
            return redirect()->route('vendor.show', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Hashids::decode($id)[0];
        $vendor = Vendor::find($id);
        if($vendor){
            $vendor->delete();
        }
        return redirect()->route('vendor.index');
    }
}
