@extends('layouts.master')

@section('content')
<div class="container">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-maroon">TRACKING</div>
                <div class="card-body">

                    <table id="awbtables" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>AWB</th>
                          <th>CHECK POINT</th>
                          <th>UPDATED BY</th>
                          <th>CREATED AT</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- DataTalbles --}}
<script>
$(document).ready( function () {
    $('#awbtables').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        order: [0, 'desc'],
        ajax: '{!! route('tracking.tracking_list') !!}',
        // columnDefs: [{ "orderable": false, "targets": '_all' }],
        columns: [
            { data: 'status_id', name: 'status_id' },
            { data: 'awb', name: 'awb' },
            { data: 'checkpoints', name: 'checkpoints' },
            { data: 'updated_by', name: 'updated_by' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>

<script>
    $('#awbtables').on('click', '.btn-delete[data-remote]', function (e) {
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var url = $(this).data('remote');
      console.log(url);
      // confirm then
      if (confirm('Are you sure you want to delete this?')) {
          $.ajax({
              url: url,
              type: 'DELETE',
              dataType: 'json',
              data: {method: '_DELETE', submit: true}
          }).always(function (data) {
              $('#awbtables').DataTable().draw(false);
          });
      }else
          alert("You have cancelled!");
  });
  </script>

@endsection
