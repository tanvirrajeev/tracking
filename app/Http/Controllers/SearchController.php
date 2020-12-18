<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
