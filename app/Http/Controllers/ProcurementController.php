<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menulist;
use App\Models\Menus;
use App\Libraries\Helper;
use Illuminate\Validation\Rule;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;

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

        //$procurements = Procurement::orderBy('purchase_date','desc')->get();

        
        if ($request->ajax()) {
            $records = Procurement::orderBy('purchase_date', 'desc')
                ->leftJoin('vendors', 'juristic_id', 'temp_vendor_id')    
                ->get();

            return datatables()->of($records)
                ->addIndexColumn()
                ->addColumn('fmis_ref_no_output', function ($row) {
                    $html = '<span class="badge bg-warning">'.$row->fmis_ref_no.'</span> ';
                    return $html;
                })
                ->addColumn('description_output', function ($row) {
                    $html = '<div>'.$row->description.'</div> ';
                    $html .= '<span class="badge bg-success">'.$row->fiscal_year.'</span> ';
                    $html .= '<span class="badge bg-info">'.Helper::Department($row->temp_department_id).'</span> ';
                    $html .= '<span class="badge bg-dark">['.$row->temp_vendor_id.'] '.$row->juristic_name_th.'</span> ';
                    return $html;
                })
                ->addColumn('fiscal_year_output', function ($row) {
                    $html = '<span class="badge bg-warning">'.$row->fmis_ref_no.'</span> ';
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
                    $html .= '<a href="'.route('procurement.show', $row->getHashids()).'" class="btn btn-success text-white"><svg class="icon"><use xlink:href="'.asset("vendors/@coreui/icons/sprites/free.svg#cil-magnifying-glass").'"></use></svg></a>';
                    if(Auth::user()->hasRole('admin')) {
                    $html .= '<a href="button" class="btn btn-warning btn-edit text-white"><svg class="icon"><use xlink:href="'.asset("vendors/@coreui/icons/sprites/free.svg#cil-pencil").'"></use></svg></a>';
                    $html .= '<button data-rowid="' . $row->getHashids() . '" class="btn btn-danger btn-delete text-white"><svg class="icon"><use xlink:href="'.asset("vendors/@coreui/icons/sprites/free.svg#cil-trash ").'"></use></svg></button>';
                    }
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

    
    public function destroy($id)
    {
        $id = Hashids::decode($id)[0];
        Procurement::find($id)->delete();
        return ['success' => true, 'message' => 'Deleted Procurement Successfully'];
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

        $procurement = Procurement::leftJoin('vendors', 'juristic_id', 'temp_vendor_id')    
            ->find($id);
        return view('app.procurement.show', compact('procurement'));
    }

}
