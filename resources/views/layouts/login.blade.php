<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | LASECO</title>

    <link href="{{ asset('design/components/core/img/favicon.png')}}" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i,900" rel="stylesheet">

    <!-- VENDORS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/font-feathericons/dist/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/font-linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/font-icomoon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/chart.js/dist/Chart.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/c3/c3.min.css')}}">
    <link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
      href="{{ asset('design/vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/fullcalendar/dist/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/ionrangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/bootstrap-sweetalert/dist/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/nprogress/nprogress.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/summernote/dist/summernote.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/dropify/dist/css/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/jquery-steps/demo/css/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')}}">


    <script src="{{ asset('design/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('design/vendors/popper.js/dist/umd/popper.js')}}"></script>
    <script src="{{ asset('design/vendors/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{ asset('design/vendors/jquery-mousewheel/jquery.mousewheel.min.js')}}"></script>
    <script src="{{ asset('design/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{ asset('design/vendors/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('design/vendors/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ asset('design/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('design/vendors/jqvmap/dist/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{ asset('design/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{ asset('design/vendors/d3/d3.min.js')}}"></script>
    <script src="{{ asset('design/vendors/d3-dsv/dist/d3-dsv.js')}}"></script>
    <script src="{{ asset('design/vendors/d3-time-format/dist/d3-time-format.js')}}"></script>
    <script src="{{ asset('design/vendors/c3/c3.min.js')}}"></script>
    <script src="{{ asset('design/vendors/peity/jquery.peity.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('design/data-tables/datatables.min.css')}}"></script>
    <script type="text/javascript" src="{{ asset('design/data-tables/datatables.min.js')}}"></script>
    <script src="{{ asset('design/vendors/editable-table/mindmup-editabletable.js')}}"></script>
    <script src="{{ asset('design/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('design/vendors/tempus-dominus-bs4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{ asset('design/vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('design/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('design/vendors/ionrangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{ asset('design/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')}}"></script>
    <script src="{{ asset('design/vendors/bootstrap-sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{ asset('design/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{ asset('design/vendors/summernote/dist/summernote.min.js')}}"></script>
    <script src="{{ asset('design/vendors/nestable/jquery.nestable.js')}}"></script>
    <script src="{{ asset('design/vendors/jquery-typeahead/dist/jquery.typeahead.min.js')}}"></script>
    <script src="{{ asset('design/vendors/autosize/dist/autosize.min.js')}}"></script>
    <script src="{{ asset('design/vendors/bootstrap-show-password/dist/bootstrap-show-password.min.js')}}"></script>
    <script src="{{ asset('design/vendors/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{ asset('design/vendors/html5-form-validation/dist/jquery.validation.min.js')}}"></script>
    <script src="{{ asset('design/vendors/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{ asset('design/vendors/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
    <script src="{{ asset('design/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('design/vendors/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('design/vendors/d3-dsv/dist/d3-dsv.js')}}"></script>
    <script src="{{ asset('design/vendors/d3-time-format/dist/d3-time-format.js')}}"></script>
    <script src="{{ asset('design/vendors/techan/dist/techan.min.js')}}"></script>
    <script src="{{ asset('design/vendors/Stickyfill/dist/stickyfill.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/vendors/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/core/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/widgets/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/system/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/menu-left/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/menu-top/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/footer/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/footer-dark/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/topbar/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/topbar-dark/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/subbar/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/sidebar/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/chat/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/apps/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/apps/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/extra-apps/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/ecommerce/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/components/dashboards/crypto-terminal/style.css')}}">

    <script src="{{ asset('design/components/core/index.js')}}"></script>
    <script src="{{ asset('design/components/menu-left/index.js')}}"></script>
    <script src="{{ asset('design/components/menu-top/index.js')}}"></script>
    <script src="{{ asset('design/components/sidebar/index.js')}}"></script>
    <script src="{{ asset('design/components/topbar/index.js')}}"></script>
    <script src="{{ asset('design/components/chat/index.js')}}"></script>

  <script>
    $(document).ready(function () {
      $('.air__initialLoading').delay(200).fadeOut(400)
    })
  </script>

</head>
<body >

    <main class="py-4">
        @yield('content')
    </main>

</body>
</html>
