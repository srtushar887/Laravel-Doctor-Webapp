<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 15:02:17 GMT -->
<head>
    <meta charset="utf-8" />
    <title> Xeloro - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/admin/')}}/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">
    <div class="header-border"></div>
    <header id="page-topbar">
        <div class="navbar-header">

            <div class="d-flex align-items-left">
                <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>


            </div>

            <div class="d-flex align-items-center">







                <div class="dropdown d-inline-block ml-2">
                    <button type="button" class="btn header-item waves-effect"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('assets/admin/')}}/images/users/avatar-2.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-sm-inline-block ml-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Inbox</span>
                            <span>
                                        <span class="badge badge-pill badge-info">3</span>
                                    </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Profile</span>
                            <span>
                                        <span class="badge badge-pill badge-warning">1</span>
                                    </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            Settings
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Lock Account</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Log Out</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <div class="navbar-brand-box">
                <a href="index.html" class="logo">
                    <i class="mdi mdi-album"></i>
                    <span>
                                Xeloro
                            </span>
                </a>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('admin.dashboard')}}" class="waves-effect"><i class="mdi mdi-home-analytics"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li>
                        <a href="{{route('admin.general.settings')}}" class="waves-effect"><i class="mdi mdi-home-analytics"></i>
                            <span>General Settings</span></a>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                class="mdi mdi-diamond-stone"></i><span>UI Elements</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="ui-buttons.html">Buttons</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('admin')



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        2020 © Xeloro.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by Myra
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Overlay-->
<div class="menu-overlay"></div>


<!-- jQuery  -->
<script src="{{asset('assets/admin/')}}/js/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/metismenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/waves.js"></script>
<script src="{{asset('assets/admin/')}}/js/simplebar.min.js"></script>


<!-- Sparkline Js-->
<script src="http://myrathemes.com/xeloro/layouts/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Js-->
<script src="http://myrathemes.com/xeloro/layouts/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Chart Custom Js-->
<script src="{{asset('assets/admin/')}}/pages/knob-chart-demo.js"></script>


<!-- Morris Js-->
<script src="http://myrathemes.com/xeloro/layouts/plugins/morris-js/morris.min.js"></script>

<!-- Raphael Js-->
<script src="http://myrathemes.com/xeloro/layouts/plugins/raphael/raphael.min.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets/admin/')}}/pages/dashboard-demo.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/theme.js"></script>

</body>


<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2020 15:03:30 GMT -->
</html>
