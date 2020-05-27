 <!DOCTYPE html>
<!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
  -->
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - BAF Admin</title>
        <link href="{{ asset("/assets/css/styles.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/assets/css/customstyle.css")}}" rel="stylesheet" type="text/css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.0.4/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.0.4/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.0.4/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
  <link href="{{ asset("/assets/AdminLTE-3.0.4/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
  <!-- Toastr -->
  <link href="{{ asset("/assets/AdminLTE-3.0.4/plugins/toastr/toastr.min.css")}}" rel="stylesheet" type="text/css" />



  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.0.4/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/assets/AdminLTE-3.0.4/dist/css/adminlte.min.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
  <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition sidebar-mini layout-fixed">

  @include('layouts.header')
    <!-- Main Header -->
    <div class="wrapper" >
    <!-- Sidebar -->
    @include('layouts.sidebar')

    
    <div class="content-wrapper">
    @yield('content')
    </div>

</div>
    <!-- /.content-wrapper -->
    <!-- Footer -->
    <!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->




       <!-- jQuery -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/jquery/jquery.min.js")}}" type="text/javascript"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/bootstrap/js/bootstrap.bundle.min.js")}}" type="text/javascript"></script>

<!-- ChartJS -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/chart.js/Chart.min.js")}}" type="text/javascript"></script>

<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/datatables/jquery.dataTables.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}" type="text/javascript"></script>


<!-- overlayScrollbars -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/dist/js/adminlte.min.js")}}" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/dist/js/demo.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/jquery-mousewheel/jquery.mousewheel.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/raphael/raphael.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/jquery-mapael/jquery.mapael.min.js")}}" type="text/javascript"></script>
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/jquery-mapael/maps/usa_states.min.js")}}" type="text/javascript"></script>

<script  src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/daterangepicker/daterangepicker.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript" ></script>

<!-- SweetAlert2 -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/sweetalert2/sweetalert2.min.js")}}" type="text/javascript"></script>
<!-- Toastr -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/toastr/toastr.min.js")}}" type="text/javascript"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset ("/assets/AdminLTE-3.0.4/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}" type="text/javascript"></script>

<script src="{{ asset ("/assets/js/customapp.js")}}" type="text/javascript"></script>



        </div>
        
  </body>
</html>