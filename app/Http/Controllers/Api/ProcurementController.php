<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Procurement;

class ProcurementController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lists(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
        
        $totalRecords = Procurement::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Procurement::select('count(*) as allcount')->where('description', 'like', '%' .$searchValue . '%')->count();

        $records = Procurement::orderBy($columnName,$columnSortOrder)
        ->where('description', 'like', '%' .$searchValue . '%')
        ->orWhere('fmis_ref_no', 'like', '%' .$searchValue . '%')
        ->select('fmis_ref_no','description','amount','fiscal_year','purchase_date','vendor_id','temp_vendor_id')
        ->leftJoin('',)
        ->skip($start)
        ->take($rowperpage)
        ->get();

        $data = [];
        //build html result 
        foreach($records as $record) {
            $data[] = [
                'fmis_ref_no' => $record->fmis_ref_no,
                'description' => $record->description,
                'description_output' => '<div>'.$record->description.'</div><span class="badge bg-primary">'.$record->fiscal_year.'</span> <span class="badge bg-info">'.$record->temp_vendor_id.'</span>',
                'fiscal_year' => $record->fiscal_year,
                'purchase_date' => date_format($record->purchase_date, 'd/m/Y'),
                'amount' => number_format($record->amount, 2),
            ];
        }


        $json['data'] = $data;
        $json['recordsTotal'] = $totalRecords;
        $json['recordsFiltered'] = $totalRecordswithFilter;
        //$json['pagination'] = [ 'more'=> false ];

        return response()->json($json);
    }
}
