<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.getappui.com/techmin/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Nov 2023 23:00:45 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Techmin - Bootstrap 5 Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('layouts/assets/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- Vector Map css -->
    <link rel="stylesheet"
        href="{{ asset('layouts/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('layouts/assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('layouts/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('layouts/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        @include('layouts.components.topbar')
        <!-- ========== Topbar End ========== -->

        <!-- Left Sidebar Start -->
        @include('layouts.components.sidebar')
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        @yield('content')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->


    <!-- Vendor js -->
    <script src="{{ asset('layouts/assets/js/vendor.min.js') }}"></script>









    <script src="{{ asset('layouts/assets/vendor/lucide/umd/lucide.min.js') }}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('layouts/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('layouts/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
    </script>
    <script
        src="{{ asset('layouts/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>


    <!-- Dashboard App js -->
    <script src="{{ asset('layouts/assets/js/pages/dashboard.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('layouts/assets/js/app.min.js') }}"></script>

</body>


<!-- Mirrored from techzaa.getappui.com/techmin/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Nov 2023 23:01:20 GMT -->

</html>
<!-- <div class="card border-0 bg-black">
 <div class="card-body pb-0">
  <div class="d-flex justify-content-between">
   <div>
    <p class="text-white fs-14 text-capitalize mb-2 fw-medium">Total revenue</p>
    <h3 class="text-white mb-2 fw-semibold">$24,590.43</h3>
   </div>
   <div
    class="avatar-sm bg-white text-black d-flex align-items-center justify-content-center">
    <i class="bi bi-shop-window fs-24"></i>
   </div>
  </div>
 </div>
 <div id="revenue-spark" class="apex-charts" data-colors="#ffffff"></div>
</div> -->
