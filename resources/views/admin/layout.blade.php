<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet"/>
    <!-- PLUGINS STYLES-->
    <link href="{{asset('admin/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet"/>
    <!-- THEME STYLES-->
    <link href="{{asset('admin/css/main.min.css')}}" rel="stylesheet"/>
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START HEADER-->
    @include('admin.inc.header')
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    @include('admin.inc.sidebar')

    <!-- END SIDEBAR-->
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            @yield('content')
        </div>
        <!-- END PAGE CONTENT-->
        @include('admin.inc.footer')
    </div>
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
<script src="{{asset('admin/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('admin/vendors/chart.js/dist/Chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/vendors/jvectormap/jquery-jvectormap-us-aea-en.js')}}" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset('admin/js/app.min.js')}}" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{asset('admin/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>
</body>

</html>