@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-maroon">
                    <h3 class="card-title">AREA CODE</h3>
                    <a href="area_code/create" class="btn btn-outline-warning btn-sm float-right">CREATE AREA CODE</a>
                </div>
                <div class="card-body">

                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                          <th>AREA CODE</th>
                          <th>DESCRIPTION</th>
                          <th>UPDATED BY</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($areaCode as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->updated_by }}</td>
                                    <td>
                                        <a href="/area_code/{{$item->id}}/edit/" class="btn btn-xs bg-purple">EDIT</a>
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
