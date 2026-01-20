<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template | @yield('page_title')</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/assets/css/main.css" />
</head>

<body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    @include('components.admin_sidebar')

    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('components.admin_header')
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        @yield('content')

        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        @include('components.admin_footer')
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('admin_assets') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/Chart.min.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/dynamic-pie-chart.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/moment.min.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/fullcalendar.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/jvectormap.min.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/world-merc.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/polyfill.js"></script>
    <script src="{{ asset('admin_assets') }}/assets/js/main.js"></script>

    @yield('page-scripts')

</body>

</html>
