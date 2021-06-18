<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ auth()->user()->api_token }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/logo-min.png')}}">
    <title>CCJL | HOME</title>
    @yield('css')
    <link href="{{asset('eliteadmin/inverse/dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body class="fixed-layout skin-purple">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">CENTRO COMERCIAL JOSE LUIS</p>
        </div>
    </div>
    <div id="main-wrapper">
        @include('eliteadmin.header')
        @include('eliteadmin.aside')
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('eliteadmin.footer')
    </div>
    <script src="{{asset('eliteadmin/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('eliteadmin/inverse/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('eliteadmin/inverse/dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('eliteadmin/inverse/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('eliteadmin/inverse/dist/js/waves.js')}}"></script>
    @include('alerts.main')
    @yield('js')
</body>

</html>