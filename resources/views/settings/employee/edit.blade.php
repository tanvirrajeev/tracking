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

                <div class="card-header bg-navy"><h3>{{ __('EDIT USER') }}</h3>
                    <a href="/employee/" class="btn btn-outline-warning btn-sm float-right"><i class="fas fa-backward"></i>&nbsp;</i>BACK</a>
                </div>

                <div class="card-body">

                    <form action="/employee/{{ $sltuser->id }}" method="POST">
                        {{-- <form action="{{ route('order.store') }}" method="POST"> --}}
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">NAME</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $sltuser->name}}" required autocomplete="off" autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">EMPLOYEE EMAIL</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $sltuser->email}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="username">USERNAME</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $sltuser->username}}" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">PASSWORD</label><label class="text-danger">*</label>
                                    <input type="password" class="form-control" id="password" name="password"  autocomplete="off" >
                                    <small>Password must contain <strong class="text-danger">Charecters</strong> and <strong class="text-danger">Digits</strong></small>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="address">ADDRESS</label><label class="text-danger">*</label>
                            <textarea class="form-control" rows="4" id="address" name="address" required autocomplete="off">{{ $sltuser->address}}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="phone">PHONE</label>
                                    <input type="text" class="form-control" id="phone" name="phone" maxlength="14" value="{{ $sltuser->phone}}" autocomplete="off">
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="branch">BRANCH</label>
                                    <select class="form-control form-control-sm" name="branch" id="branch">
                                        <option value="{{ $sltbranch->id }}" selected readonly>{{ $sltbranch->name }}</option>
                                        @foreach ($branch as $item)
                                            @if ($sltbranch->id  !== $item->id)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="role">ROLE</label>
                                    <select class="form-control form-control-sm" name="role" id="role">
                                        <option value="{{ $sltrole->id }}" selected readonly>{{ $sltrole->name }}</option>
                                        @foreach ($role as $item)
                                            @if ($sltrole->id  !== $item->id)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="status">STATUS</label>
                                <select class="form-control form-control-sm" name="status" id="status">
                                    <option value="{{ $sltuser->status }}" selected readonly>{{ $sltuser->status }}</option>
                                        @if ($sltuser->status  == 'ACTIVE')
                                            <option value="INACTIVE">INACTIVE</option>
                                            @else
                                                <option value="ACTIVE">ACTIVE</option>
                                        @endif
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark" id="submit_button" >UPDATE</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
