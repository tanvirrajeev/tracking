<?php

namespace App\Http\Controllers;

use App\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{

    public function index(){

        return view('tracking.index');
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
        //
    }

    public function update(Request $request, Tracking $tracking){
        //
    }

    public function destroy(Tracking $tracking){
        //
    }
}
