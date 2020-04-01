<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Important CSS -->
    @stack('css')
    <link rel="stylesheet" href="{{ asset('backend') }}/css/dataTables.bootstrap4.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('backend.includes.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.includes.aside')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header -->
            @yield('head-tab')
            <!-- /.content-header -->
            <!-- Dashboard Charts -->
            @yield('charts')
            <!-- Dashboard Charts -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        @include('backend.includes.footer')
        <!-- /.footer -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js')}}"></script>

    <!-- Scripts App js-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('backend/ckeditor/ckeditor.js')}}"></script>
    <!-- page script -->
    @stack('scripts')

</body>

</html>
