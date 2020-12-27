<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index(){

        return view('settings.employee.index');
    }

    public function userlist(){
        $data = DB::table('users')
                // ->where('ecomstatus', 'ARRIVED')
                // ->join('statuses', 'statuses.id', '=', 'orders.status_id')
                // ->select('orders.id as id','ecomordid','consigneename','statuses.name as statusname','note','orders.created_at','awb')
                // ->where('statuses.flag', '99')
                // ->where('users.branch_id', '<>', '99')
                ->get();

        return Datatables::of($data)     // View Order Page Datatable
        //setting up id to every row
        ->setRowId(function ($data) {
            return $data->id;
            })
        ->addColumn('action', function( $data) {
            return  '<a href="/employee/'.$data->id.'" class="btn btn-xs btn-primary">SHOW</a>
            <a href="/employee/'.$data->id.'/edit" class="btn btn-xs bg-maroon">EDIT</a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create(){

        return view('settings.employee.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|min:6|regex:/[a-z]/|regex:/[0-9]/',
            'status'=>'required'
         ]);

        $emp = New User;
        $emp->name = $request->name;
        $emp->email = $request->email;
        $emp->password = Hash::make($request->password);
        $emp->role_id = 1;
        $emp->status = $request->status;
        $emp->save();

        return redirect(route('employee.index'))->with('toast_success','User Created');
    }

    public function show(Employee $employee){
        //
    }

    public function edit(Employee $employee){
        // dd($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
