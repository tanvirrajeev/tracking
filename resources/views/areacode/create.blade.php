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

                <div class="card-header bg-orange">AREA CODE ENTRY</div>

                <div class="card-body">

                    <form action="{{ route('area_code.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="awb">AREA CODE</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="awb" id="awb" autocomplete="off" required>
                                </div>
                            </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="manifest">DESCRIPTION</label><label class="text-danger">*</label>
                                        <input type="text" class="form-control" name="manifest" id="manifest" autocomplete="off" required>
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
