@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-9">
            <div class="card">

                {{-- Validation Error Message --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-header bg-orange"><h3>{{ __('SHOW USER') }}</h3>
                    <a href="/employee/" class="btn btn-outline-warning btn-sm float-right"><i class="fas fa-backward"></i>&nbsp;</i>BACK</a>
                </div>

                <div class="card-body">

                    <form>
                        {{-- <form action="{{ route('order.store') }}" method="POST"> --}}
                        {{-- @csrf
                        @method('PUT') --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">NAME</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name}}" required autocomplete="off" autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">EMPLOYEE EMAIL</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $employee->email}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">PASSWORD</label><label class="text-danger">*</label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" >
                                    <small>Password must contain <strong class="text-danger">Charecters</strong> and <strong class="text-danger">Digits</strong></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="status">STATUS</label>
                                <select class="form-control form-control-sm" name="status" id="status">
                                    <option value="{{ $employee->status }}" selected readonly>{{ $employee->status }}</option>
                                        @if ($employee->status  == 'ACTIVE')
                                            <option value="INACTIVE">INACTIVE</option>
                                            @else
                                                <option value="ACTIVE">ACTIVE</option>
                                        @endif
                                </select>
                            </div>
                        </div>

                        {{-- <button type="submit" class="btn btn-dark" id="submit_button" >UPDATE</button> --}}
                        <a href="/employee" class="btn btn-dark">BACK</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
