<?php

namespace App\Http\Controllers;

use App\Web;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{

    public function index(){

        // $trk = DB::table('statuses')
        // ->get();
        // dd($trk);

        return view('web.index');
    }

    public function tracking(){
        $awb = (isset($_GET['awb']) ? $_GET['awb'] : '');


        if($awb != ''){
            $tk = DB::table('trackings')
            ->join('users', 'users.id', '=', 'trackings.user_id')
            ->join('checkpoints', 'checkpoints.id', '=', 'trackings.checkpoint_id')
            ->select('trackings.awb as awb','checkpoints.name as checkpoint','users.name as user','trackings.checkpoint_id as chkid','trackings.created_at as time')
            ->where('trackings.awb', $awb)
            ->get();
            return response($tk);
        }else{
            return response("Null");
        }


        // return response($tk);

    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function show(Web $web)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function edit(Web $web)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Web $web)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function destroy(Web $web)
    {
        //
    }
}
