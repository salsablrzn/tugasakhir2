<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="description" content="Miminium Admin Template v.1">
    <meta name="author" content="Isna Nur Azis">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SDN TAPAAN 1 KOTA PASURUAN</title>
 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/datatable.min.css')}}">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="{{asset('asset/css/plugins/font-awesome.min.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('asset/css/plugins/simple-line-icons.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('asset/css/plugins/animate.min.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('asset/css/plugins/fullcalendar.min.css')}}"/>
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <!-- end: Css -->

    <link rel="shortcut icon" href="{{asset('logo.jpeg')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          
          @include('layout/header')

        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->

            @include('layout/sidebar')
          <!-- end: Left Menu -->


        
          <!-- start: content -->
            
            @yield('konten')

          <!-- end: content -->

    
          <!-- start: right menu -->
           
          <!-- end: right menu -->
          
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="{{asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{asset('asset/js/jquery.ui.min.js') }}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js') }}"></script>
   
    
    <!-- plugins -->
    <script src="{{asset('asset/js/plugins/moment.min.js') }}"></script>
    <script src="{{asset('asset/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{asset('asset/js/plugins/jquery.nicescroll.js') }}"></script>
    {{-- <script src="{{asset('asset/js/plugins/jquery.vmap.min.js') }}"></script>
    <script src="{{asset('asset/js/plugins/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{asset('asset/js/plugins/jquery.vmap.sampledata.js') }}"></script> --}}
    <script src="{{asset('asset/js/plugins/chart.min.js') }}"></script>


    <!-- custom -->
     <script src="{{asset('asset/js/main.js') }}"></script>
     <script src="{{asset('asset/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script>
        $(document).ready(function() {
            $('#datatables-example').DataTable({});
        })
    </script>
    @yield('script')
  <!-- end: Javascript -->
  </body>
</html>