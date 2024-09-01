<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <title>Kuliah PBKK Kelas B 2024</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tambahkan "/" diawal, artinya dari directory public --}}

    {{-- Css Aplikasi --}}
    <link rel="stylesheet" href="/css/app.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">TUGAS 1</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ session('user_name','Fairna') }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ url('/basic-routing') }}" class="nav-link {{ request()->is('basic-routing*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Basic Routing</p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/param-routing') }}" class="nav-link {{ request()->is('param-routing*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Route Parameters</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/named-routing') }}" class="nav-link {{ request()->is('named-routing*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Named Routes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/group-routing') }}" class="nav-link {{ request()->is('group-routing*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Route Groups</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/fallback-routing') }}" class="nav-link {{ request()->is('fallback-routing*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fallback Routes</p>
                            </a>
                        </li>
                        <li data-pertemuan="1" class="nav-item has-treeview {{ request()->is('pertemuan1/*') ? 'menu-open' : '' }} ">
                            <a href="#" class="nav-link {{ request()->is('pertemuan1/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Pertemuan 1
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('genap-ganjil') }}" class="nav-link {{ request()->routeIs('genap-ganjil') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Genap Ganjil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fibonacci') }}" class="nav-link {{ request()->routeIs('fibonacci') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fibonacci</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('bilangan-prima') }}" class="nav-link {{ request()->routeIs('bilangan-prima') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bilangan Prima</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/adminlte/" class="nav-link" target="_blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Template AdminLTE</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu
            </div>
            /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                @yield('title')
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="container-fluid">
                @yield('alert')
                @yield('content')
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    {{-- Tambahkan "/" diawal, artinya dari directory public --}}
    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/js/demo.js"></script>
    @yield('script')
</body>

</html>