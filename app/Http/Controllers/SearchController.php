<?php

namespace App\Http\Controllers;

use App\Search;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        $areaCodes = DB::table('area_codes')->get();
        $checkPoints = DB::table('checkpoints')->get();
        $statuses = DB::table('statuses')
        ->join('users', 'users.id', '=', 'statuses.user_id')
        ->join('checkpoints', 'checkpoints.id', '=', 'statuses.checkpoint_id')
        ->join('area_codes', 'area_codes.id', '=', 'statuses.areacode')
        ->select('statuses.id','statuses.awb','checkpoints.name as checkpoints','users.name as updated_by','statuses.manifest','area_codes.name as areacode')
        ->get();

        return view('search.index', compact('areaCodes','checkPoints','statuses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request){
        //
    }

    public function getawb(Request $request){
        //
        // dd($request);

        // Request from SEARCH & UPDATE BY AREA CODE Modal
        if($request->exists('manifest')){
            // dd($request);
            $areaCodes = DB::table('area_codes')->get();
            $checkPoints = DB::table('checkpoints')->get();
            $statuses = DB::table('statuses')
            ->join('users', 'users.id', '=', 'statuses.user_id')
            ->join('checkpoints', 'checkpoints.id', '=', 'statuses.checkpoint_id')
            ->join('area_codes', 'area_codes.id', '=', 'statuses.areacode')
            ->select('statuses.id','statuses.awb','checkpoints.name as checkpoints','users.name as updated_by','statuses.manifest','area_codes.id as areaId','area_codes.name as areacode')
            ->where('statuses.manifest', '=', $request->manifest)
            ->where('area_codes.name', '=', $request->areaCodes)
            ->get();

            return view('search.index', compact('areaCodes','checkPoints','statuses'));
        }else{ //Request from SEARCH & UPDATE BY AWB Modal
            $areaCodes = DB::table('area_codes')->get();
            $checkPoints = DB::table('checkpoints')->get();
            $statuses = DB::table('statuses')
            ->join('users', 'users.id', '=', 'statuses.user_id')
            ->join('checkpoints', 'checkpoints.id', '=', 'statuses.checkpoint_id')
            ->join('area_codes', 'area_codes.id', '=', 'statuses.areacode')
            ->select('statuses.id','statuses.awb','checkpoints.name as checkpoints','users.name as updated_by','statuses.manifest', 'area_codes.name as areacode')
            ->where('statuses.awb', '=', $request->awb)
            ->get();

            return view('search.index', compact('areaCodes','checkPoints','statuses'));
        }

    }

    public function updateawb(Request $request){

        if($request->exists('awb')){
            // $sltawb = $request->awb;
            $statuses = DB::table('statuses')
                    ->where('statuses.awb', '=', $request->awb)
                    ->get();

                    foreach ($statuses as $item) {
                        $st = New Status;
                        $st = Status::find($item->id);
                        $st->awb = $item->awb;
                        $st->checkpoint_id = $request->checkpointId;
                        $st->user_id = Auth::id();
                        $st->manifest = $item->manifest;
                        $st->areacode = $item->areacode;
                        $st->status_date = $request->date;
                        $st->save();
                    }

            // $st = New Status;
            // $st = Status::find($sltawb);
            // $st->awb = $request->awb;
            // $st->checkpoint_id = $request->checkpointId;
            // $st->user_id = Auth::id();
            // // $st->manifest = $statuses->manifest;
            // // $st->areacode = $statuses->areaCodesId;
            // $st->status_date = $request->date;
            // $st->save();

            // return response("AWB Updated...");
            return response($st);
        }else{
            return response("AWB Empty");
        }
    }

    public function updatearea(Request $request){

        if($request->exists('manifest')){
            $statuses = DB::table('statuses')
                        ->where('statuses.manifest', '=', $request->manifest)
                        ->where('statuses.areacode', '=', $request->areaCodesId)
                        ->get();

            foreach ($statuses as $item) {
                $st = New Status;
                $st = Status::find($item->id);
                $st->awb = $item->awb;
                $st->checkpoint_id = $request->checkpointId;
                $st->user_id = Auth::id();
                $st->manifest = $item->manifest;
                $st->areacode = $request->areaCodesId;
                $st->status_date = $request->date;
                $st->save();
            }


            // return response($statuses);
            return response("AWB Updated...");

            // return response($request->manifest);
            // return response($request->areaCodesId);
            // return response($request->checkpointId);
            // return response($request->date);
        }
        // dd($request);
    }

    public function show(Search $search){
        //
        //dd($search);
    }

    public function edit(Search $search)
    {
        //
    }

    public function update(Request $request, Search $search)
    {
        //
    }

    public function destroy(Search $search)
    {
        //
    }
}
