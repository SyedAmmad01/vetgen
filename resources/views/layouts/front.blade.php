<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('front_assets') }}/assets/images/favicon.svg" type="image/x-icon" />
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template | @yield('page_title')</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('front_assets') }}/assets/css/lineicons.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('front_assets') }}/assets/css/materialdesignicons.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('front_assets') }}/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="{{ asset('front_assets') }}/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="{{ asset('front_assets') }}/assets/css/main.css" />


    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.3.6/css/dataTables.dataTables.min.css"> --}}


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">




</head>

<body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    @include('components.front_sidebar')

    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('components.front_header')
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        @yield('content')

        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        @include('components.front_footer')
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('front_assets') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front_assets') }}/assets/js/Chart.min.js"></script>
    <script src="{{ asset('front_assets') }}/assets/js/dynamic-pie-chart.js"></script>
    <script src="{{ asset('front_assets') }}/assets/js/moment.min.js"></script>
    <script src="{{ asset('front_assets') }}/assets/js/fullcalendar.js"></script>
    <script src="{{ asset('front_assets') }}/assets/js/jvectormap.min.js"></script>
    <script src="{{ asset('front_assets') }}/assets/js/world-merc.js"></script>
    <script src="{{ asset('front_assets') }}/assets/js/polyfill.js"></script>
    <script src="{{ asset('front_assets') }}/assets/js/main.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.6/js/dataTables.dataTables.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



    @yield('page-scripts')

</body>

</html>
