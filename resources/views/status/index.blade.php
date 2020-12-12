@extends('layouts.master')

@section('content')
<div class="container">
    @include('status.edit')
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                <div class="card-header bg-orange">AWB ENTRY</div>

                <div class="card-body">

                    <form action="{{ route('status.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="awb">AWB</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="awb" id="awb" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="checkpoint_id">CHECK POINT</label><label class="text-danger">*</label>
                                    <select class="form-control form-control" name="checkpoint_id" id="checkpoint_id">
                                    <option value="" selected disabled>SELECT</option>
                                        @foreach ($checkpoint as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="ecomorddtt">STATUS DATE & TIME</label>
                              <i class="fa fa-calendar-alt"></i>
                              <div class="input-group date" id="p">
                                <input type="text" class="form-control datetimepicker" name="created_at" id="created_at" autocomplete="off" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                              </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="manifest">MANIFEST NO</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="manifest" id="manifest" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="areaCodes">AREA CODE</label><label class="text-danger">*</label>
                                    <select class="form-control form-control" name="areaCodes" id="areaCodes">
                                    <option value="" selected disabled>SELECT</option>
                                        @foreach ($areaCodes as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-purple" id="submit_button">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-maroon">AWB</div>
                <div class="card-body">

                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                          <th>AWB</th>
                          <th>CHECK POINT</th>
                          <th>UPDATED BY</th>
                          <th>MANIFEST</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $item)
                                <tr>
                                    <td>{{ $item->awb }}</td>
                                    <td>{{ $item->checkpoints }}</td>
                                    <td>{{ $item->updated_by }}</td>
                                    <td>{{ $item->manifest }}</td>
                                    <td>
                                        <a class="btn btn-small btn-success" href="{{ URL::to('status/' . $item->id) }}">Show</a>
                                        {{-- <a class="btn btn-small btn-info" href="{{ URL::to('status/' . $item->id . '/edit')}}">Edit</a> --}}
                                        {{-- <a href="{{ URL::to('status/' . $item->id).'/edit' }}" class="btn btn-xs bg-purple" data-bs-toggle="modal" data-bs-target="#exampleModal">EDIT<i class="fas fa-edit"></i></a> --}}
                                        <a href="" class="btn btn-xs bg-purple" data-id={{$item->id}} data-bs-toggle="modal" data-bs-target="#edit">EDIT<i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
