<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    @hasSection('meta')
        @yield('meta')
    @else
        <title>CMS Project</title>
    @endif
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet"/>
    <!-- PLUGINS STYLES-->
    <link href="{{asset('backend/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/vendors/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toaster.min.css')}}" rel="stylesheet" />

    <!-- THEME STYLES-->
    <link href="{{asset('backend/css/main.min.css')}}" rel="stylesheet"/>

    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset('backend/css/nam.css')}}?v={{date('d')}}.{{time()}}" rel="stylesheet"/>

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
        <div id="app" class="page-content fade-in-up">
            @yield('content')
            <div id="app"></div>
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
!-- CORE SCRIPTS-->
<script src="{{asset('common/axios.js')}}" type="text/javascript"></script>
<script src="{{asset('common/vue3.js')}}"></script>

<script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/jquery-knob/dist/jquery.knob.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/moment/min/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/jquery-minicolors/jquery.minicolors.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/toaster.js')}}" type="text/javascript"></script>

<script src="{{asset('common/api.js')}}?v={{time()}}" type="text/javascript"></script>
<script src="{{asset('backend/js/admin.js')}}?v={{time()}}" type="text/javascript"></script>
<script src="{{asset('backend/js/app.min.js')}}" type="text/javascript"></script>
@stack('vue')

<!-- PAGE LEVEL SCRIPTS-->
</body>

</html>
