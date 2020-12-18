@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                                    <label for="awb-checkpoint">CHECK POINT</label>
                                    <select class="form-control form-control" name="awb-checkpoint" id="awb-checkpoint">
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
                                    <button type="submit" class="btn bg-pink" id="search_awb_update">UPDATE</button>
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

                <div class="card-body" id="card-manifest">

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
                                    <select class="form-control form-control" name="areaCodes" id="search_areaCodes">
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
                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="manifest-checkpoint">CHECK POINT</label>
                                        <select class="form-control form-control" name="manifest-checkpoint" id="manifest-checkpoint">
                                        @foreach ($checkPoints as $item)
                                            <option id="{{ $item->id}}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <label for="manifest_date">DATE & TIME</label>
                                    <i class="fa fa-calendar-alt"></i>
                                    <div class="input-group date" id="p">
                                      <input type="text" class="form-control datetimepicker" name="manifest_date" id="manifest_date" autocomplete="off"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="button" class="btn bg-pink" id="search_area_update">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- Display Table Card  --}}
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


<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function (){

        var m =$('#card-manifest');

        //SweetAlert2 Toast for AWB Update confirmation
        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000
                        });

        $('#search_awb_update').click(function(){
            updateawb();
        });

        // Manifest card update button action
        $("#search_area_update").click(function() {
            var manifest = m.find('#manifest').val();
            var date = m.find('#manifest_date').val();
            if(manifest && date != ''){
                Swal.fire({
                title: 'Are you sure?',
                text: "You want to update status for all AWB under this Area Code?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        updatearea();
                    }
                })
            }else{
                Swal.fire({
                title: 'Fill up all fields',
                text: "All field is necessary to update AWB by Area Code",
                icon: 'warning',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes, Update!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
            }
        });

        // Update funcion called by Update button action click function()
        function updatearea (){
            var m =$('#card-manifest');
            var manifest = m.find('#manifest').val();
            // var areaCodes = m.find('#search_areaCodes').val();
            // var checkpoint = m.find('#manifest-checkpoint').val();
            var areaCodesId = m.find('#search_areaCodes option:selected').attr('id');
            var checkpointId = m.find('#manifest-checkpoint option:selected').attr('id');
            var date = m.find('#manifest_date').val();

            // console.log(manifest);
            // console.log(areaCodes);
            // console.log(checkpoint);
            // console.log(areaCodesId);
            // console.log(checkpointId);




            $.ajax({
                type: 'post',
                url: "{{ url('/update-area') }}",
                data: {_token: CSRF_TOKEN, manifest: manifest, areaCodesId: areaCodesId,checkpointId: checkpointId, date: date},
                success:function(data){
                    // console.log(data);
                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'AWB UPDATED!'
                    });
                    location.reload();
                }

            });


        }




    });

</script>



@endsection