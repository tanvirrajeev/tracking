@extends('layouts.master')

@section('content')
<div class="container">
    @include('status.edit')
    @include('status.show')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

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
                            <div class="col-4">
                                <br>
                                <div class="form-group pt-2">
                                    <button type="submit" class="btn bg-purple" id="search_awb">SEARCH AWB ONLY</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="areaCodes">AREA CODE</label>
                                    <select class="form-control form-control" name="areaCodes" id="search_area_code">
                                    @foreach ($areaCodes as $item)
                                        <option id="{{ $item->id}}">{{ $item->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-pink" id="search_area">SEARCH</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>







    </div>
</div>





@endsection
