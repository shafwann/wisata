<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin {{ Auth::user()->name }}</title>
    <link href="{{ url('assets/img/Logo.png') }}" rel="icon" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('superadmin') }}" class="brand-link">
                <img src="{{ url('img/favicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-1"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Pesona Desa</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::getUser()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('superadmin') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('superadmin/daftar-admin') }}" class="nav-link bg-primary">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Daftar Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('superadmin/kategori') }}" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>
                                    Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('logout') }}" class="nav-link bg-danger">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Log Out
                                </p>
                            </a>
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- form start -->
                    <form action="{{ url('/superadmin/daftar-admin/proses-tambah') }}" class="card card-default"
                        method="POST" id="myform">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="role_id" id="role_id">
                                        <option value="">Pilih Role</option>
                                        <option value="2">Admin Kabupaten</option>
                                        <option value="3">Admin Desa</option>
                                    </select>
                                </div>
                            </div>
                            {{-- OPSI ADMIN KABUPATEN --}}
                            <div data-parent="2" style="display: none;">
                                <div class="form-group row">
                                    <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="province_id" id="province-2">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($data['data'] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regency" class="col-sm-2 col-form-label">Kabupaten</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="regency_id" id="regency-2">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- OPSI ADMIN DESA --}}
                            <div data-parent="3" style="display: none;">
                                <div class="form-group row">
                                    <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="province_id" id="province-3">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($data['data'] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regency" class="col-sm-2 col-form-label">Kabupaten</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="regency_id" id="regency-3">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="district_id" id="district-3">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="village" class="col-sm-2 col-form-label">Desa</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="village_id" id="village-3">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- OPSI ADMIN WISATA --}}
                            <div data-parent="4" style="display: none;">
                                <div class="form-group row">
                                    <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="province_id" id="province-4">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($data['data'] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regency" class="col-sm-2 col-form-label">Kabupaten</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="regency_id" id="regency-4">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="district_id" id="district-4">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="village" class="col-sm-2 col-form-label">Desa</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="village_id" id="village-4">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Masukkan Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Nomor
                                    Handphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Nomor Handphone">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary float-right">Tambah</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('AdminLTE/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ url('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('AdminLTE/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('AdminLTE/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('AdminLTE/dist/js/pages/dashboard.js') }}"></script>

    {{-- AJAX DROPDOWN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            $("select").on("change", function() {
                if ($(this).val() === "") {
                    $("[data-parent]").hide();
                } else {
                    var selected = $(this).val();

                    //show input
                    var selectedparent = $("div[data-parent='" + selected + "']");
                    selectedparent.show().siblings("[data-parent]").hide();

                    //remove disabled to every input in selectedparent
                    selectedparent.find("select").removeAttr("disabled");
                    //disabled input other input that not in selectedparent
                    selectedparent.siblings("[data-parent]").find("select").attr("disabled", "disabled");

                    //Ajax
                    $('#province-' + selected).on('change', function() {
                        var province_id = $('#province-' + selected).val();
                        $.ajax({
                            type: "POST",
                            url: "{{ route('getRegency') }}",
                            data: {
                                province_id: province_id
                            },
                            success: function(msg) {
                                $('#regency-' + selected).html(msg);
                                $('#district-' + selected).html('');
                                $('#village-' + selected).html('');
                            },
                            error: function(data) {
                                console.log('error', data)
                            },
                        })
                    })
                    $('#regency-' + selected).on('change', function() {
                        var regency_id = $('#regency-' + selected).val();

                        $.ajax({
                            type: "POST",
                            url: "{{ route('getDistrict') }}",
                            data: {
                                regency_id: regency_id
                            },
                            success: function(msg) {
                                $('#district-' + selected).html(msg);
                                $('#village-' + selected).html('');
                            },
                            error: function(data) {
                                console.log('error', data)
                            },
                        })
                    })
                    $('#district-' + selected).on('change', function() {
                        var district_id = $('#district-' + selected).val();

                        $.ajax({
                            type: "POST",
                            url: "{{ route('getVillage') }}",
                            data: {
                                district_id: district_id
                            },
                            success: function(msg) {
                                $('#village-' + selected).html(msg);
                            },
                            error: function(data) {
                                console.log('error', data)
                            },
                        })
                    })
                }
            })
        });
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</body>

</html>
