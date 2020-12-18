@extends('layouts.master')

@section('content')
<div class="container">
    @include('status.edit')
    @include('status.show')
    <div class="row justify-content-center">
        {{-- AWB Modal  --}}
        <div class="col-md-6">
            <div class="card">

                <div class="card-header bg-orange">SEARCH & UPDATE BY AWB</div>

                <div class="card-body">

                    <form action="{{ route('search.getawb') }}" method="GET">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="awb">AWB</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="awb" id="awb" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <br>
                                <div class="form-group pt-2">
                                    <button type="submit" class="btn bg-purple" id="search_awb">SEARCH</button>
                                    {{-- <button type="submit" class="btn bg-maroon" id="search_awb">UPDATE BY AWB</button> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="areaCodes">CHECK POINT</label>
                                    <select class="form-control form-control" name="areaCodes" id="search_area_code">
                                    @foreach ($checkPoints as $item)
                                        <option id="{{ $item->id}}">{{ $item->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-pink" id="search_area">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- Manifest Modal  --}}
        <div class="col-md-6">
            <div class="card">

                <div class="card-header bg-orange">SEARCH & UPDATE BY AREA CODE</div>

                <div class="card-body">

                    <form action="{{ route('search.getawb') }}" method="GET">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="manifest">MANIFEST NO</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="manifest" id="manifest" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="areaCodes">AREA CODE</label><label class="text-danger">*</label>
                                    <select class="form-control form-control" name="areaCodes" id="search_area_code">
                                    @foreach ($areaCodes as $item)
                                        <option id="{{ $item->id}}">{{ $item->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <br>
                                <div class="form-group pt-2">
                                    <button type="submit" class="btn bg-purple" id="search_manifest">SEARCH</button>
                                    {{-- <button type="submit" class="btn bg-maroon" id="search_awb">UPDATE BY AWB</button> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-11">
                                    <div class="form-group">
                                        <label for="manifest-checkpoint">CHECK POINT</label>
                                        <select class="form-control form-control" name="manifest-checkpoint" id="manifest-checkpoint">
                                        @foreach ($checkPoints as $item)
                                            <option id="{{ $item->id}}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="button" class="btn bg-pink" id="search_area">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- Display Table Modal  --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-maroon">AWB</div>
                <div class="card-body">

                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                          <th>AWB</th>
                          <th>CHECK POINT</th>
                          {{-- <th>UPDATED BY</th> --}}
                          <th>MANIFEST</th>
                          <th>AREA CODE</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $item)
                                <tr>
                                    <td>{{ $item->awb }}</td>
                                    <td>{{ $item->checkpoints }}</td>
                                    {{-- <td>{{ $item->updated_by }}</td> --}}
                                    <td>{{ $item->manifest }}</td>
                                    <td>{{ $item->areacode }}</td>
                                    <td>
                                        {{-- <a class="btn btn-small btn-success" href="{{ URL::to('status/' . $item->id) }}">Show</a> --}}
                                        <a href="" class="btn btn-xs btn-success" data-id={{$item->id}} data-bs-toggle="modal" data-bs-target="#show">SHOW<i class="fas fa-edit"></i></a>
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
