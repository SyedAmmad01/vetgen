<!DOCTYPE html>
<html lang="en">
<head>
{{-- <title>HexaBit</title> --}}
<!-- Title Page-->
<title>SMS System | @yield('page_title')</title>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="HexaBit Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, www.thememakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('front_assets') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('front_assets') }}/assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('front_assets') }}/assets/css/main.css">
<link rel="stylesheet" href="{{ asset('front_assets') }}/assets/css/color_skins.css">
<link rel="stylesheet" href="{{ asset('front_assets') }}/assets/sweetalert2/sweetalert2.min.css">


</head>
<body>

    <body class="theme-orange">
        <!-- WRAPPER -->
        <div id="wrapper">
            <nav class="navbar navbar-fixed-top w-100">
                <div class="container-fluid">
                    <div class="navbar-left">
                        <div class="logo">
                            <img src="{{ asset('front_assets') }}/assets/images/diamond.png"
                                style="width: 30px; margin-bottom: -28px;">
                        </div>
                        <h4 style="font-weight: 900; color: white; margin-left: 40px;">Status hero</h4>
                    </div>
                    <div class="navbar-right">
                        <div class="heading-nav">
                            <button type="button" class="btn btn-danger">Dashboard</button>
                        </div>
                    </div>
                </div>
            </nav>
       @yield('content')
        <!-- END WRAPPER -->
        {{-- @yield('after-page') --}}



<script src="{{ asset('front_assets') }}/assets/bundles/libscripts.bundle.js"></script>
<script src="{{ asset('front_assets') }}/assets/bundles/vendorscripts.bundle.js"></script>

<script src="{{ asset('front_assets') }}/assets/bundles/mainscripts.bundle.js"></script>
<script src="{{asset('front_assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('front_assets')}}/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{asset('front_assets/js/daniDev.js')}}"></script>


@yield('page-script')

</body>
</html>
