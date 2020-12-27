<?php

namespace App\Http\Controllers;

use App\Status;
use App\Checkpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class StatusController extends Controller
{

    public function index(){
        $checkpoint = DB::table('checkpoints')->get();
        $areaCodes = DB::table('area_codes')->get();
        $statuses = DB::table('statuses')
                    ->join('users', 'users.id', '=', 'statuses.user_id')
                    ->join('checkpoints', 'checkpoints.id', '=', 'statuses.checkpoint_id')
                    ->join('area_codes', 'area_codes.id', '=', 'statuses.areacode')
                    ->select('statuses.id','statuses.awb','checkpoints.name as checkpoints','users.name as updated_by','statuses.manifest', 'area_codes.name as areacode')
                    ->get();

        // $statuses = DB::table('statuses')->get();
        // $statuses = Status::all();
        // dd($statuses);

        return view('status.index', compact('checkpoint','areaCodes','statuses'));
    }

    public function awblist(){
        $data = DB::table('statuses')
                    ->join('users', 'users.id', '=', 'statuses.user_id')
                    ->join('checkpoints', 'checkpoints.id', '=', 'statuses.checkpoint_id')
                    ->join('area_codes', 'area_codes.id', '=', 'statuses.areacode')
                    ->select('statuses.id','statuses.awb as awb','checkpoints.name as checkpoints','users.name as updated_by','statuses.manifest as manifest', 'area_codes.name as areacode')
                    ->get();
        // return response($statuses);
        // return json_encode($statuses);
        // return response()->json(['statuses'=>$statuses]);


        return Datatables::of($data)     // View Order Page Datatable
                    ->addColumn('action', function( $data) {
                        return '<a href="" class="btn btn-xs btn-success" data-id='.$data->id.' data-bs-toggle="modal" data-bs-target="#show">EDIT<i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-xs bg-purple" data-id='.$data->id.' data-bs-toggle="modal" data-bs-target="#edit">EDIT<i class="fas fa-edit"></i></a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);

    }

    public function create()
    {
        //
    }

    public function store(Request $request){
        $this->validate($request,[
            'awb'=>'required|numeric|unique:statuses',
            'checkpoint_id'=>'required'
         ]);

         $st = New Status;
         $st->awb = $request->awb;
         $st->checkpoint_id = $request->checkpoint_id;
         $st->user_id = Auth::id();
         $st->manifest = $request->manifest;
         $st->areacode = $request->areaCodes;
         $st->status_date = $request->created_at;
        //  $st->created_at = $request->created_at;
         $st->save();
         return redirect(route('status.index'))->with('toast_success','STATUS UPDATED');
    }


    public function show(Status $status)
    {
        //
    }

    public function statuslist(Request $request){
        $selstat = (isset($_GET['id']) ? $_GET['id'] : '');

        if($selstat != ''){
            $statuses = DB::table('statuses')
                    ->join('checkpoints', 'checkpoints.id', '=', 'statuses.checkpoint_id')
                    ->join('area_codes', 'area_codes.id', '=', 'statuses.areacode')
                    // ->join('third_parties', 'third_parties.id', '=', 'statuses.third_party_id')
                    ->where('statuses.id', '=', $selstat)
                    ->select('statuses.id','statuses.awb','checkpoints.name as checkpoints','statuses.checkpoint_id','statuses.manifest','statuses.status_date as date','statuses.areacode as areaid','statuses.third_party_awb as third_party_awb','statuses.received_by as received_by','area_codes.name as areacode')
                    ->get();

            $areacodes = DB::table('area_codes')->get();
            $checkpoints =DB::table('checkpoints')->get();
            $thirdParties = DB::table('third_parties')->get();

            //Check if there exists any data to table for statuses.3rd_party

            $isThirdPartyExists = DB::table('statuses')
                                ->join('third_parties', 'third_parties.id', '=', 'statuses.third_party_id')
                                ->where('statuses.id', '=', $selstat)
                                ->select('statuses.id', 'statuses.third_party_awb as third_party_awb','statuses.received_by as received_by','third_parties.id as third_party_id','third_parties.company as third_party_company','third_parties.web as third_party_web')
                                ->get();
            if($isThirdPartyExists->isEmpty()){
                $isThirdPartyExists = 'NULL';
            }

            // return response($statuses);
            return response()->json(['statuses'=>$statuses, 'areacodes'=>$areacodes, 'checkpoints'=>$checkpoints, 'isThirdPartyExists'=>$isThirdPartyExists, 'thirdParties'=>$thirdParties ]);
        }else{
            return response("Error: Blank Request...");
        }
    }

    //Status change from Status page Modal status.edit.blade
    public function chgstatusmodal(Request $request){
        // dd($request);
        if(!empty($request)){
            // dd($request);

            $st = New Status;

            $st = Status::where('id', '=' , $request->id) ->first();

            $st->awb = $request->awb;
            $st->checkpoint_id = $request->checkpoint;
            $st->user_id = Auth::id();
            $st->manifest = $request->manifest;
            $st->areacode = $request->areacode;
            $st->received_by = $request->rcvby;
            if(!empty($request->third_party_company)){ //Do not update if the status != "78-Shipment connected to"
                $st->third_party_id = $request->third_party_company;
            }
            $st->third_party_awb = $request->third_party_awb;
            $st->status_date = $request->date;
            $st->save();
            return response("AWB Updated...");
        }
    }

    public function edit(Status $status)
    {
        //
    }


    public function update(Request $request, Status $status)
    {
        //
    }

    public function destroy(Status $status)
    {
        //
    }
}
