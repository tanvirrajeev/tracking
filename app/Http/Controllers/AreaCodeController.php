<?php

namespace App\Http\Controllers;

use App\AreaCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaCodeController extends Controller
{

    public function index()
    {
        $areaCode = DB::table('area_codes')
                    ->select('area_codes.id as id','area_codes.name as name', 'area_codes.description as description','area_codes.user_id as updated_by')
                    ->get();
        return view('areacode.index', compact('areaCode'));
    }


    public function create()
    {

        return view('areacode.create');
    }



    public function store(Request $request)
    {
        //
    }


    public function show(AreaCode $areaCode)
    {
        //
    }


    public function edit(AreaCode $areaCode)
    {
        //
    }

    public function update(Request $request, AreaCode $areaCode)
    {
        //
    }

    public function destroy(AreaCode $areaCode)
    {
        //
    }
}
