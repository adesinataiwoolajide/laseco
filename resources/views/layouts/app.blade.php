<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? '' }} | Laseco</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="JETHRO">
    <link href="{{ asset('design/components/core/img/favicon.png')}}" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700,700i,900" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/font-feathericons/dist/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/font-linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/font-icomoon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/chart.js/dist/Chart.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/c3/c3.min.css')}}">
    <script type="text/javascript" src="{{ asset('design/data-tables/datatables.min.css')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('design/vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css')}}">
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

    <link rel="stylesheet" type="text/css" href=" {{ asset('design/data-tables/data-table-new.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('design/data-tables/data-table-new-css.css')}}">

    <script src="{{asset('design/localgovernments.js') }}"></script>

    <script src="{{ asset('design/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{ asset('design/vendors/summernote/dist/summernote.min.js')}}"></script>
    <script src="{{ asset('design/vendors/nestable/jquery.nestable.js')}}"></script>
    <script src="{{ asset('design/vendors/jquery-typeahead/dist/jquery.typeahead.min.js')}}"></script>
    <script src="{{ asset('design/vendors/autosize/dist/autosize.min.js')}}"></script>
    <script src="{{ asset('design/vendors/bootstrap-show-password/dist/bootstrap-show-password.min.js')}}"></script>

    <script src="{{ asset('design/vendors/html5-form-validation/dist/jquery.validation.min.js')}}"></script>
    <script src="{{ asset('design/vendors/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{ asset('design/vendors/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
    {{--  <script src="{{ asset('design/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('design/vendors/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>  --}}


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

    {{-- <script  type="text/javascript" src="{{ asset('design/fussion/chart.js')}}"></script>
    <script  type="text/javascript" src="{{ asset('design/fussion/theme.js')}}"></script> --}}

    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

</head>
<body class="air__menu--flyout air__menu--dark air__menu__submenu--blue">
    <div class="air__initialLoading"></div>
    <div class="air__layout air__layout--hasSider">

        @include('layouts.sidebar')
        {{-- @include('layouts.fusioncharts') --}}
        <div class="air__menuLeft__backdrop air__menuLeft__mobileActionToggle"></div>

        <div class="air__layout">
            <div class="air__layout__fixedHeader">
                <div class="air__utils__header">
                    <div class="air__topbar">
                        <div class="air__topbar__searchDropdown dropdown mr-md-4 mr-auto">
                            <div class="air__topbar__search dropdown-toggle" data-toggle="dropdown" data-offset="5,15">
                                <div class="air__topbar__searchContainer">
                                    <i class="air__topbar__searchIcon fe fe-search"></i>
                                    <input
                                    class="air__topbar__searchInput"
                                    type="text"
                                    placeholder="Start typing to search..."
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="dropdown mr-auto d-none d-md-block">
                            <a
                                href="#"
                                class="dropdown-toggle text-nowrap"
                                data-toggle="dropdown"
                                aria-expanded="false"
                                data-offset="0,15"
                                >
                                <i class="dropdown-toggle-icon fe fe-book-open"></i>
                                <span class="dropdown-toggle-text">Revenue History</span>
                            </a>
                            <div class="dropdown-menu" role="menu">

                                <a class="dropdown-item" href="javascript:void(0)">Project Management</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>

                        <div class="dropdown">
                            <a
                                href="#"
                                class="dropdown-toggle text-nowrap"
                                data-toggle="dropdown"
                                aria-expanded="false"
                                data-offset="5,15"
                                >
                                <img
                                    class="dropdown-toggle-avatar"
                                    
                                    src="{{ asset('design/components/core/img/jetrho.jpg')}}"
                                   
                                    style="width:50px; height:50px" alt="Name"
                                />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item" href="">
                                    <i class="dropdown-icon fe fe-lock"></i>
                                    Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout')}}">
                                    <i class="dropdown-icon fe fe-log-out"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>

                    <main class="py-4">
                        @yield('content')
                    </main>


                    <script>
                        /////////////////////////////////////////////////////////////////////////////////////////
                        // "ECOMMERCE" module scripts

                        ; (function ($) {
                        'use strict'
                        $(function () {
                            /////////////////////////////////////////////////////////////////////////////////////////

                            $('.air__ecommerce__productFavorite').on('click', function () {
                            $(this).toggleClass('text-dark')
                            })

                        })

                        })(jQuery)


                        function confirmToDelete(){
                            return confirm("Click Okay to Delete Details and Cancel to Stop");
                        }

                        function confirmToDeleteFile(){
                            return confirm("Click Okay to Delete a File for the RFQ and Cancel to Stop");
                        }

                        function confirmToDeleteAll(){
                            return confirm("Click Okay to Delete All Files for the RFQ and Cancel to Stop");
                        }

                        {{--  function confirmToEdit(){
                            return confirm("Click Okay to Edit and Cancel to Stop");
                        }  --}}

                        function confirmToRestore(){
                            return confirm("Click Okay to Restore The Deleted Data and Cancel to Stop");
                        }

                        function confirmToSuspend(){
                            return confirm("Click Okay to Suspend the user and Cancel to Stop");
                        }

                        function confirmToUnSuspend(){
                            return confirm("Click Okay to Un Suspend the user and Cancel to Stop");
                        }
                    </script>
                    <script>
                        /////////////////////////////////////////////////////////////////////////////////////////
                        // "ECOMMERCE" module scripts

                        ;(function($) {
                          'use strict'
                          $(function() {
                            /////////////////////////////////////////////////////////////////////////////////////////
                            $('#example1').DataTable({
                              lengthMenu: [[5, 10, 20, 30, 40,, 50 -1], [5, 10, 20, 30, 40, 50, 'All']],
                              responsive: true,
                              autoWidth: false,
                            })

                            $('#example2').DataTable({
                                autoWidth: true,
                                lengthMenu: [[5, 10, 20, 30, 40,, 50 -1], [5, 10, 20, 30, 40, 50, 'All']],
                                scrollX: true,
                                fixedColumns: true,
                            })

                            $('#example3').DataTable({
                            autoWidth: true,
                            lengthMenu: [[5, 10, 20, 30, 40,, 50 -1], [5, 10, 20, 30, 40, 50, 'All']],
                            responsive: true,
                            autoWidth: false,
                            })

                            $('#example4').DataTable({
                            autoWidth: true,
                            lengthMenu: [[5, 10, 20, 30, 40,, 50 -1], [5, 10, 20, 30, 40, 50, 'All']],
                            responsive: true,
                            autoWidth: false,
                            scrollX: true,
                            })
                            /////////////////////////////////////////////////////////////////////////////////////////
                          })
                        })(jQuery)
                      </script>


</body>
</html>
