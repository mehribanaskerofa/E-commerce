<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | M.A</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    {{--    <link rel="stylesheet" href="{{asset('_assets/plugins/fontawesome-free/css/all.min.css')}}">--}}
    <!-- IonIcons -->
    {{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'">--}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('_assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @yield('css')
    <meta name="csrf" content="{{csrf_token()}}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">


        <!-- Sidebar -->
        <div class="sidebar">


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    @include('admin.includes.menu')


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2023.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('_assets/js/jquery.min.js')}}"></script>
{{--<script src="https://code.jquery.com/jquery-3.6.4.min.js"--}}
{{--        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>--}}
{{--<!-- Bootstrap -->--}}

<script src="{{asset('_assets/js/bootstrap.bundle.min.js')}}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>--}}
<!-- AdminLTE -->
<script src="{{asset('_assets/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
{{--<script src="{{asset('_assets/plugins/chart.js/Chart.min.js')}}"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
<!-- AdminLTE for demo purposes -->
{{--<script src="{{asset('_assets/js/demo.js')}}"></script>--}}

<script src="{{asset('_assets/js/deleteform.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset('_assets/js/pages/dashboard3.js')}}"></script>--}}
@yield('js')
</body>
</html>
