@extends('layouts.master')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-orange"><h3>{{ __('USERS') }}</h3>
                    <a href="/employee/create" class="btn btn-outline-warning btn-sm float-right"><i class="fas fa-plus fa-lg">&nbsp;</i>CREATE USER</a>
                </div>
                <div class="card-body">
                    <table class="table border" id="userlist">
                        <thead>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- DataTalbe for Admin Order page --}}
<script>
    $(document).ready( function () {
    $('#userlist').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        // order: [0, 'desc'],
        ajax: '{!! route('employee.userlist') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }
        ],
        initComplete: function () {
            this.api().columns([0,1]).every(function () {
            var column = this;
            var input = document.createElement("input");
            $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
                column.search($(this).val(), false, false, true).draw();
                });
            });
        }
    });
});
</script>

@endsection
