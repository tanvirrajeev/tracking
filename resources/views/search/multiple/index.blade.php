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
                    @method('PUT')
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
                                                            <input type="text" name="awb_1_multiple" id="awb_1_multiple" class="textinput form-control" required autocomplete="off" />
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
                                <label for="awb_date">CHECK POINT</label><label class="text-danger">*</label>
                                <select class="form-control form-control" name="awb_checkpoint" id="awb_checkpoint">
                                @foreach ($checkPoints as $item)
                                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="awb_date">DATE & TIME</label><label class="text-danger">*</label>
                            <i class="fa fa-calendar-alt"></i>
                            <div class="input-group date" id="p">
                              <input type="text" class="form-control datetimepicker" name="awb_date" id="awb_date" required autocomplete="off"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
