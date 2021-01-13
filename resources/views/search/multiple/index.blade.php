@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header bg-orange">
                MULTIPLE AWB UPDATE
                <a href="/search" class="btn btn-outline-warning btn-sm float-right">BACK</a>
            </div>

            <div class="card-body" id="card-awb">

                <form action="{{ route('search.updatemultipleawb') }}" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row">
                        <div class="col-8">
                            <div class="well clearfix">
                                <div id="czContainer">
                                    <div id="first">
                                        <div class="recordset">
                                            <div class="fieldRow clearfix">
                                                    <div id="div_id_stock_1_service" class="form-group">
                                                        <label for="id_stock_1_product" class="control-label  requiredField">
                                                            AWB<span class="asteriskField text-danger">*</span>
                                                        </label>
                                                        <div class="controls ">
                                                            <input type="text" name="stock_1_product" id="id_stock_1_product" class="textinput form-control" autocomplete="off" />
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group">
                                <select class="form-control form-control" name="awb-checkpoint" id="awb-checkpoint">
                                @foreach ($checkPoints as $item)
                                    <option id="{{ $item->id}}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <button type="submit" class="btn bg-pink" id="search_awb_update">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
<script src="/js/jquery.czMore-1.5.3.2.js"></script>
<script type="text/javascript">
    //One-to-many relationship plugin by Yasir O. Atabani. Copyrights Reserved.
    $("#czContainer").czMore();
</script>

@endsection
