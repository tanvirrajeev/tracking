<?php

namespace App\Http\Controllers;

use App\Status;
use App\Checkpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{

    public function index(){
        $checkpoint = DB::table('checkpoints')->get();
        $areaCodes = DB::table('area_codes')->get();
        $statuses = DB::table('statuses')
                    ->join('users', 'users.id', '=', 'statuses.user_id')
                    ->join('checkpoints', 'checkpoints.id', '=', 'statuses.checkpoint_id')
                    ->select('statuses.id','statuses.awb','checkpoints.name as checkpoints','users.name as updated_by','statuses.manifest')
                    ->get();

        // $statuses = DB::table('statuses')->get();
        // $statuses = Status::all();
        // dd($statuses);

        return view('status.index', compact('checkpoint','areaCodes','statuses'));
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
                    ->where('statuses.id', '=', $selstat)
                    ->select('statuses.id','statuses.awb','checkpoints.name as checkpoints','statuses.checkpoint_id','statuses.manifest','statuses.status_date as date','statuses.areacode as areaid','area_codes.name as areacode')
                    ->get();

            $areacodes = DB::table('area_codes')->get();
            $checkpoints =DB::table('checkpoints')->get();
            // return response($statuses);
            return response()->json(['statuses'=>$statuses, 'areacodes'=>$areacodes, 'checkpoints'=>$checkpoints ]);
        }else{
            return response("Error: Blank Request...");
        }

        // $statusrow = Status::find($selstat);
        // $statusflag = $statusrow->flag;


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
