@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container">
    <div class="row justify-content-center">
        {{-- Manifest Card  --}}
        <div class="col-md-6">
            <div class="card">

                <div class="card-header bg-orange">
                    CHANGE MANIFEST
                    <a href="/search" class="btn btn-outline-warning btn-sm float-right">BACK</a>
                </div>

                <div class="card-body" id="card-manifest">

                    <form action="{{ route('search.getmanifest') }}" method="GET">
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="manifest">MANIFEST NO</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="manifest" id="manifest" autocomplete="off" autofocus required>
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
                                        <label for="manifest_to">CHANGE MANIFEST TO</label>
                                        <input type="text" class="form-control" name="manifest_to" id="manifest_to" autocomplete="off" >
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
                                </tr>
                            @endforeach
                        </tbody>
                        {{ $statuses->links() }}
                        {{-- {{ $statuses->onEachSide(5)->links() }} --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function (e){
        // e.preventDefault();
        // e.stopImmediatePropagation();

        var m =$('#card-manifest');

        //SweetAlert2 Toast for AWB Update confirmation
        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000
                        });

        // $('#search_awb_update').click(function(){
        //     var awb = a.find('#awb').val();
        //     var date = a.find('#awb_date').val();

        //     if(awb && date != ''){
        //         Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You want to update status?",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, Update!'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 updateawb();
        //             }
        //         })
        //     }else{
        //         Swal.fire({
        //         title: 'Fill up all fields',
        //         text: "All fields are necessary to update AWB",
        //         icon: 'warning',
        //         // showCancelButton: true,
        //         // confirmButtonColor: '#3085d6',
        //         // cancelButtonColor: '#d33',
        //         // confirmButtonText: 'Yes, Update!'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 // location.reload();
        //             }
        //         })
        //     }
        // });

        // Manifest card update button action
        $("#search_area_update").click(function() {
            // var date = m.find('#manifest_date').val();
            if(manifest != ''){
                Swal.fire({
                title: 'Are you sure?',
                text: "You want to change Manifest?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        changemanifest();
                    }
                })
            }else{
                Swal.fire({
                title: 'Fill up all fields',
                text: "All fields are necessary to change Manifest",
                icon: 'warning',
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes, Update!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // location.reload();
                    }
                })
            }
        });

        //Change Manifest Function
        function changemanifest(){
            // var awb = a.find('#awb').val();
            // var checkpointId = a.find('#awb-checkpoint option:selected').attr('id');
            // var date = a.find('#awb_date').val();

            var manifest = m.find('#manifest').val();
            var manifest_to = m.find('#manifest_to').val();
            // alert(checkpoint);

            $.ajax({
                type: 'post',
                url: "{{ url('/search/change-manifest') }}",
                data: {_token: CSRF_TOKEN, manifest: manifest, manifest_to: manifest_to},
                success:function(data){
                    // alert(data);
                    // console.log(data);

                    if(data == '1'){
                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: 'Manifest Number Changed!'
                        });
                        location.reload();
                    }else{
                        Swal.fire({
                        title: 'Manifest Not Found',
                        text: "Check Manifest number whether it is correct or not",
                        icon: 'warning',
                        // showCancelButton: true,
                        // confirmButtonColor: '#3085d6',
                        // cancelButtonColor: '#d33',
                        // confirmButtonText: 'Yes, Update!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // location.reload();
                            }
                        })
                    }
                }
            });
            e.stopImmediatePropagation();
        }
    });

</script>
@endsection

