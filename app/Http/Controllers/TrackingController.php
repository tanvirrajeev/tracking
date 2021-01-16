<?php

namespace App\Http\Controllers;

use App\User;
use App\Tracking;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{

    public function index(){

        return view('tracking.index');
    }

    public function trackingList(){
        $data = DB::table('trackings')
        ->join('users', 'users.id', '=', 'trackings.user_id')
        ->join('checkpoints', 'checkpoints.id', '=', 'trackings.checkpoint_id')
        ->select('trackings.id','trackings.status_id as status_id','trackings.awb as awb','checkpoints.name as checkpoints','users.name as updated_by','trackings.created_at as created_at')
        ->get();
// return response($statuses);


return Datatables::of($data)     // View Order Page Datatable
        ->setRowId(function ($data) {
            return $data->id;
            })
        ->addColumn('action', function( $data) {
            return  '<a href="/tracking/'.$data->id.'/edit" class="btn btn-xs bg-yellow">EDIT</a>
            <button class="btn btn-xs btn-danger btn-delete" data-remote="/tracking/'.$data->id .'">DELETE</button>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);


    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show(Tracking $tracking){
        //
    }

    public function edit(Tracking $tracking){
        // dd($tracking);

        $sltCheckPoints = DB::table('trackings')
                        ->join('checkpoints', 'checkpoints.id', '=', 'trackings.checkpoint_id')
                        ->where('trackings.checkpoint_id', '=', $tracking->checkpoint_id)
                        ->select('trackings.checkpoint_id as checkpoint','checkpoints.name as checkpoint_name')
                        ->first();
        // dd($sltCheckPoints);

        $updatedBy = DB::table('trackings')
                    ->join('users', 'users.id', '=', 'trackings.user_id')
                    ->select('users.id as id','users.name as name')
                    ->first();

        $checkPoints = DB::table('checkpoints')
                        ->get();
        return view('tracking.edit', compact('tracking','checkPoints','sltCheckPoints','updatedBy'));
    }

    public function update(Request $request, Tracking $tracking){
        // dd($request);
        $this->validate($request,[
            'checkpoint'=>'required',
            'status_date'=>'required'
         ]);

        //  dd($tracking->created_at);

        $tk = New Tracking;
        $tk = Tracking::find($tracking->id);
        $tk->status_id = $request->id;
        $tk->awb = $request->awb;
        $tk->checkpoint_id = $request->checkpoint;
        $tk->user_id = Auth::user()->id;
        $tk->status_date = $request->status_date;
        $tk->save();

        return redirect(route('tracking.index'))->with('toast_success','Checkpoint Updated');

    }

    public function destroy(Tracking $tracking){
        // dd($tracking);

        $item = Tracking::find($tracking->id);
        $item->delete();
        return redirect(route('tracking.index'))->with('toast_success','Tracking Deleted');

    }
}
