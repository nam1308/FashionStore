<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>backendcast bootstrap 4 &amp; angular 5 backend template, Шаблон админки | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet"/>
    <!-- THEME STYLES-->
    <link href="{{asset('backend/css/main.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/css/nam.css')}}?v={{date('d')}}.{{time()}}" rel="stylesheet"/>
    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset('backend/css/pages/auth-light.css')}}" rel="stylesheet"/>
    @stack('styles')
</head>
<body class="bg-white-300">
<div class="content">
    <div id="app"></div>
    @yield('content')
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS -->

<script src="{{asset('common/vue3.js')}}"></script>

<script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS -->
<script src="{{asset('common/axios.js')}}" type="text/javascript"></script>
<script src="{{asset('common/api.js')}}?v={{time()}}" type="text/javascript"></script>
<script src="{{asset('backend/js/app.js')}}" type="text/javascript"></script>

@stack('vue')
@stack('js')
</body>
</html>
