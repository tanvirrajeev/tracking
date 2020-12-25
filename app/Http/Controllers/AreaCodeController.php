<?php

namespace App\Http\Controllers;

use App\AreaCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AreaCodeController extends Controller
{

    public function index()
    {
        $areaCode = DB::table('area_codes')
                    ->join('users', 'users.id', '=', 'area_codes.user_id')
                    ->select('area_codes.id as id','area_codes.name as name', 'area_codes.description as description','users.name as updated_by')
                    ->get();
        return view('areacode.index', compact('areaCode'));
    }


    public function create()
    {

        return view('areacode.create');
    }



    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:area_codes|max:255',
            'description'=>'required'
         ]);

        $ar = New AreaCode;
        $ar->name = $request->name;
        $ar->description = $request->description;
        $ar->user_id = Auth::id();
        $ar->save();

        return redirect(route('area_code.index'))->with('toast_success','Area Code Created');
    }


    public function show(AreaCode $areaCode)
    {
        //
    }


    public function edit(AreaCode $areaCode){
        if($areaCode->exists('id')){
            return view('areacode.edit', compact('areaCode'));
        }else{
            return response("Error");
        }

    }

    public function update(Request $request, AreaCode $areaCode)
    {
        $this->validate($request,[
            'name'=>'required|unique:area_codes|max:255',
            'description'=>'required'
         ]);

        //  dd($request);
        $ar = New AreaCode;
        $ar = AreaCode::find($areaCode->id);
        $ar->name = $request->name;
        $ar->description = $request->description;
        $ar->user_id = Auth::id();
        $ar->save();
        return redirect(route('area_code.index'))->with('toast_success','Area Code Updated');
    }

    public function destroy(AreaCode $areaCode)
    {
        //
    }
}
