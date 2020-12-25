@extends('layouts.master')

@section('content')
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

                <div class="card-header bg-orange">
                    <h3 class="card-title">AREA CODE EDIT</h3>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-warning btn-sm float-right">BACK</a>
                </div>

                <div class="card-body">

                    <form action="/area_code/{{ $areaCode->id }}" method="POST" id="orderform">
                        {{-- $order->id --}}
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name">AREA CODE</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$areaCode->name}}" autocomplete="off" required>
                                </div>
                            </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="description">DESCRIPTION</label><label class="text-danger">*</label>
                                        <input type="text" class="form-control" name="description" id="description" value="{{$areaCode->description}}" autocomplete="off" required>
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
    </div>


@endsection
