<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>backendcast bootstrap 4 &amp; angular 5 backend template, Шаблон админки | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet"/>
    <!-- PLUGINS STYLES-->
    <link href="{{asset('backend/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet"/>
    <!-- THEME STYLES-->
    <link href="{{asset('backend/css/main.min.css')}}" rel="stylesheet"/>
    <!-- PAGE LEVEL STYLES-->
</head>
@viteReactRefresh
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
<script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('backend/vendors/chart.js/dist/Chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/jvectormap/jquery-jvectormap-us-aea-en.js')}}" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset('backend/js/app.min.js')}}" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{asset('backend/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>
</body>

</html>
