<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{asset('admin_assets')}}/assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign In | PlainAdmin Demo | @yield('page_title')</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/css/lineicons.css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/css/main.css" />
  </head>
  <body>
    <div id="preloader">
      <div class="spinner"></div>
    </div>

    @yield('auth_content')


    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{asset('admin_assets')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('admin_assets')}}/assets/js/Chart.min.js"></script>
    <script src="{{asset('admin_assets')}}/assets/js/dynamic-pie-chart.js"></script>
    <script src="{{asset('admin_assets')}}/assets/js/moment.min.js"></script>
    <script src="{{asset('admin_assets')}}/assets/js/fullcalendar.js"></script>
    <script src="{{asset('admin_assets')}}/assets/js/jvectormap.min.js"></script>
    <script src="{{asset('admin_assets')}}/assets/js/world-merc.js"></script>
    <script src="{{asset('admin_assets')}}/assets/js/polyfill.js"></script>
    <script src="{{asset('admin_assets')}}/assets/js/main.js"></script>
  </body>
</html>
