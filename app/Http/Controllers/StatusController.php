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
        // dd($checkpoint);

        return view('status.index', compact('checkpoint'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request){
        $this->validate($request,[
            'awb'=>'required|numeric',
            'checkpoint_id'=>'required'
         ]);

         $st = New Status;
         $st->awb = $request->awb;
         $st->checkpoint_id = $request->checkpoint_id;
         $st->user_id = Auth::id();
         $st->save();
         return redirect(route('status.index'))->with('toast_success','STATUS UPDATED');
    }


    public function show(Status $status)
    {
        //
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
