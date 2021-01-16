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

                <div class="card-header bg-orange"><h3>{{ __('EDIT TRACKING') }}</h3>
                    <a href="/tracking/" class="btn btn-outline-warning btn-sm float-right"><i class="fas fa-backward"></i>&nbsp;</i>BACK</a>
                </div>

                <div class="card-body">

                    <form action="/tracking/{{ $tracking->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-2">
                                <label for="id">ID</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $tracking->status_id}}" required autocomplete="off" readonly>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="awb">AWB</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" id="awb" name="awb" value="{{ $tracking->awb}}" required autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="user_id">UPDATED BY</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" id="user" name="user" value="{{ $updatedBy->name}}" autocomplete="off" required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="checkpoint">CHECKPOINTS</label>
                                    <select class="form-control form-control" name="checkpoint" id="checkpoint" required autofocus>
                                        <option value="{{$sltCheckPoints->checkpoint}}" selected>{{$sltCheckPoints->checkpoint_name}}</option>
                                    @if ($checkPoints->count() > 1)
                                        @foreach ($checkPoints as $item)
                                            <option
                                                @if ($item->id != $sltCheckPoints->checkpoint)
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="status_date">STATUS DATE & TIME</label>
                                <i class="fa fa-calendar-alt"></i>
                                <div class="input-group date" id="p">
                                  <input type="text" class="form-control datetimepicker" name="status_date" id="status_date" value="{{ $tracking->status_date}}" autocomplete="off" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
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
