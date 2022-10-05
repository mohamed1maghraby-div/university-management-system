<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminDashboard/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminDashboard/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('adminDashboard/fonts/SansPro/SansPro.min.css') }}">
  @if (App::getLocale() == 'ar')
    <!-- arabic style -->
    <link rel="stylesheet" href="{{ asset('adminDashboard/css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminDashboard/css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('adminDashboard/css/mycustomstyle.css') }}">
  @endif
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminDashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('style')
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
      @include('partial.header')
      @include('partial.sidebar')
      @include('partial.flash')
      @yield('content')
      <button type="button" class="btn btn-danger swalDefaultError">
        Launch Error Toast
      </button>
      @include('partial.footer')
  </div>

  <!-- jQuery -->
  <script src="{{ asset('adminDashboard/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminDashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminDashboard/dist/js/adminlte.min.js') }}"></script>
  <!-- SweetAlert2 -->
<script src="{{ asset('adminDashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>

@yield('script')

  @livewireScripts
</body>
</html>
