<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

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
        $vendors = Vendor::all();
        return view('app.vendor.index', compact('vendors'));
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
    public function show($id)
    {
        $vendor = Vendor::find($id);
        return view('app.vendor.show', compact('vendor'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $user = Vendor::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('vendor.index');
    }
}
