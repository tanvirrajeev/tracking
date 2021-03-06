
<!DOCTYPE html>
<!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" /> --}}
        <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="/css/jquery.datetimepicker.css">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Power Line Air Express Ltd</title>

        {{-- <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome Icons -->
            <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}
            <link rel="stylesheet" href="/css/app.css">
            {{-- Datetime picker --}}
            {{-- <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet"> --}}
        </head>
        <body class="hold-transition sidebar-mini">
            <div class="wrapper">

                <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-orange elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('/img/plbd_logo.jpg') }}" alt="Powerline" class="brand-image "style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 13px; height: 1em;">Power Line Air Express Ltd.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}

        {{-- <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
              <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/status" class="nav-link {{ Request::is('status') ? 'active' : ''}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>AWB</p>
                    </a>
                    <a href="/search" class="nav-link {{ Request::is('search') ? 'active' : ''}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>SEARCH & UPDATE</p>
                    </a>
                    <a href="/tracking" class="nav-link {{ Request::is('tracking') ? 'active' : ''}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>TRACKING</p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
            </li>
        </ul> --}}
    </li>

    @if (Auth::user()->role_id == '3')
    <li class="nav-item">
        <a href="/area_code" class="nav-link {{ Request::is('area_code') ? 'active' : ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>AREA CODE</p>
        </a>
        <a href="/employee" class="nav-link {{ Request::is('employee') ? 'active' : ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>USER</p>
        </a>
        {{-- <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
            </p>
        </a> --}}
    </li>
    @endif

</ul>
<ul class="nav nav-sidebar flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    <i class="fas fa-sign-out-alt"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> --}}
    <!-- /.content-header -->
    <br>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                @yield('content')

            </div>
            <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        DEV: <a href="https://intrinsicbd.com">Intrinsic BD Ltd.</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020-2022 <a href="https://powerlinebd.net">Power Line Air Express Ltd</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

{{-- <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script> --}}
{{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script> --}}

{{-- <script src='/js/app.js'></script> --}}
<script src="{{ asset('js/bootstrap.js') }}"></script>
@include('sweetalert::alert')
{{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script> --}}

{{-- Jquery Datables --}}
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<script>
    // $(document).ready(function () {
    //   $('table').DataTable({
    //     "order": [[ 0, "desc" ]]
    //   });
    // });
</script>
<script>$('.datetimepicker').datetimepicker();</script>
<script src="/js/sweetalert2.js"></script>


</body>
</html>
