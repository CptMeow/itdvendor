<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amphures;
use App\Models\Districts;
use App\Models\Provinces;

class AddressController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function province(Request $request)
    {
        $provinces = Provinces::select('id', 'name_th')->get();
        return response()->json($provinces);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function district($id = null)
    {
        $district = Districts::select('id', 'name_th', 'zip_code')->where('amphure_id', $id)->get();
        return response()->json($district);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function amphures($id = null)
    {
        $amphures = Amphures::select('id', 'name_th')->where('province_id', $id)->get();
        return response()->json($amphures);
    }
}
