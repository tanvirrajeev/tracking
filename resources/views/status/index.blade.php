@extends('layouts.master')

@section('content')
<div class="container">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('status.edit')
    @include('status.show')
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

                <div class="card-header bg-orange">AWB ENTRY</div>

                <div class="card-body">

                    <form action="{{ route('status.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="awb">AWB</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="awb" id="awb" value="{{ old('awb') }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="checkpoint_id">CHECK POINT</label><label class="text-danger">*</label>
                                    <select class="form-control form-control" name="checkpoint_id" id="checkpoint_id">
                                    <option value="" selected disabled>SELECT</option>
                                        @foreach ($checkpoint as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="ecomorddtt">STATUS DATE & TIME</label>
                              <i class="fa fa-calendar-alt"></i>
                              <div class="input-group date" id="p">
                                <input type="text" class="form-control datetimepicker" name="created_at" id="created_at" value="{{ old('created_at') }}" autocomplete="off" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                              </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="manifest">MANIFEST NO</label><label class="text-danger">*</label>
                                    <input type="text" class="form-control" name="manifest" id="manifest" value="{{ old('manifest') }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="areaCodes">AREA CODE</label><label class="text-danger">*</label>
                                    <select class="form-control form-control" name="areaCodes" id="areaCodes">
                                    <option value="" selected disabled>SELECT</option>
                                        @foreach ($areaCodes as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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


        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-maroon">AWB</div>
                <div class="card-body">

                    <table id="awbtables" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                          <th>AWB</th>
                          <th>CHECK POINT</th>
                          <th>UPDATED BY</th>
                          <th>MANIFEST</th>
                          {{-- <th>AREA CODE</th> --}}
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
        ajax: '{!! route('status.awblist') !!}',
        // columnDefs: [{ "orderable": false, "targets": '_all' }],
        columns: [
            { data: 'awb', name: 'awb' },
            { data: 'checkpoints', name: 'checkpoints' },
            { data: 'updated_by', name: 'updated_by' },
            { data: 'manifest', name: 'manifest' },
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
            alert("AWB Deleted!");
              $('#awbtables').DataTable().draw(false);
          });
      }else
          alert("You have cancelled!");
  });
  </script>


@endsection
