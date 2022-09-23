<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vendor;

class VendorController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lists(Request $request)
    {
        $vendor = Vendor::select('vendor_id as id', 'juristic_name_th as text');

        if($request->input('q')){
            $vendor = $vendor->where('juristic_name_th', 'like', '%'.$request->input('q').'%')
            ->orwhere('juristic_id', 'like', '%'.$request->input('q').'%');
        }

        $vendor = $vendor->orderBy('juristic_name_th')->limit(10)->get();

        $json['results'] = $vendor;
        $json['pagination'] = [ 'more'=> false ];

        return response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkexists(Request $request)
    {
        $request->merge(['id' => $request->route('id')]);
        $validated = $request->validate([
            'id' => 'required|string|min:13|max:13',
        ]);

        $vendor = Vendor::select('juristic_id')->where('juristic_id', $request->route('id'))->count();
        return response()->json($vendor);
    }
}
