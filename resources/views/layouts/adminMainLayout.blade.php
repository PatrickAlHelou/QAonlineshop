<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{asset('assets/images/logo.svg')}}" class="mr-2" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="ti-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="ti-user mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <button class="btn btn-link preview-subject font-weight-normal" onclick="window.location.href='{{ route('notification') }}'">
                                    Notifications
                                </button>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="{{asset('assets/images/faces/face28.jpg')}}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="ti-settings text-primary"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
{{--                        <a class="dropdown-item" href="{{route('logout')}}">--}}
{{--                            <i class="ti-power-off text-primary"></i>--}}
{{--                            Logout--}}
{{--                        </a>--}}
                    </div>
                </li>
                <li class="nav-item nav-settings d-none d-lg-flex">
                    <a class="nav-link" href="#">
                        <i class="icon-ellipsis"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
{{--        @yield('nav')--}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @csrf
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#users_section" aria-expanded="false" aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Users</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="users_section">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.usersList')}}">Manage Users</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#orders_section" aria-expanded="false" aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Orders</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="orders_section">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.ordersList')}}">Manage Orders</a></li>
                        </ul>
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.orderHistory')}}">Order History</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#inventory" aria-expanded="false" aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Inventory</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="inventory">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.inventory')}}">Manage Inventory</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Category</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.categories')}}">Categories</a></li>
                        </ul>
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.subCategories')}}">Sub Categories</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#feedback" aria-expanded="false" aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Feedback</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="feedback">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{asset('assets/pages/forms/basic_elements.html')}}">Reviews</a></li>
                        </ul>
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{asset('assets/pages/forms/basic_elements.html')}}">Rates</a></li>
                        </ul>
                    </div>
                </li>
                {{--            <li class="nav-item">--}}
                {{--                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">--}}
                {{--                    <i class="icon-layout menu-icon"></i>--}}
                {{--                    <span class="menu-title">UI Elements</span>--}}
                {{--                    <i class="menu-arrow"></i>--}}
                {{--                </a>--}}
                {{--                <div class="collapse" id="ui-basic">--}}
                {{--                    <ul class="nav flex-column sub-menu">--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/ui-features/buttons.html')}}">Buttons</a></li>--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/ui-features/dropdowns.html')}}">Dropdowns</a></li>--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/ui-features/typography.html')}}">Typography</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                {{--            </li>--}}
                {{--            <li class="nav-item">--}}
                {{--                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">--}}
                {{--                    <i class="icon-columns menu-icon"></i>--}}
                {{--                    <span class="menu-title">Form elements</span>--}}
                {{--                    <i class="menu-arrow"></i>--}}
                {{--                </a>--}}
                {{--                <div class="collapse" id="form-elements">--}}
                {{--                    <ul class="nav flex-column sub-menu">--}}
                {{--                        <li class="nav-item"><a class="nav-link" href="{{asset('assets/pages/forms/basic_elements.html')}}">Basic Elements</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                {{--            </li>--}}
                {{--            <li class="nav-item">--}}
                {{--                <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">--}}
                {{--                    <i class="icon-bar-graph menu-icon"></i>--}}
                {{--                    <span class="menu-title">Charts</span>--}}
                {{--                    <i class="menu-arrow"></i>--}}
                {{--                </a>--}}
                {{--                <div class="collapse" id="charts">--}}
                {{--                    <ul class="nav flex-column sub-menu">--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/charts/chartjs.html')}}">ChartJs</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                {{--            </li>--}}
                {{--            <li class="nav-item">--}}
                {{--                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">--}}
                {{--                    <i class="icon-grid-2 menu-icon"></i>--}}
                {{--                    <span class="menu-title">Tables</span>--}}
                {{--                    <i class="menu-arrow"></i>--}}
                {{--                </a>--}}
                {{--                <div class="collapse" id="tables">--}}
                {{--                    <ul class="nav flex-column sub-menu">--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/tables/basic-table.html')}}">Basic table</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                {{--            </li>--}}
                {{--            <li class="nav-item">--}}
                {{--                <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">--}}
                {{--                    <i class="icon-contract menu-icon"></i>--}}
                {{--                    <span class="menu-title">Icons</span>--}}
                {{--                    <i class="menu-arrow"></i>--}}
                {{--                </a>--}}
                {{--                <div class="collapse" id="icons">--}}
                {{--                    <ul class="nav flex-column sub-menu">--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/icons/mdi.html')}}">Mdi icons</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                {{--            </li>--}}
                {{--            <li class="nav-item">--}}
                {{--                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">--}}
                {{--                    <i class="icon-head menu-icon"></i>--}}
                {{--                    <span class="menu-title">User Pages</span>--}}
                {{--                    <i class="menu-arrow"></i>--}}
                {{--                </a>--}}
                {{--                <div class="collapse" id="auth">--}}
                {{--                    <ul class="nav flex-column sub-menu">--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/login.html')}}"> Login </a></li>--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/register.html')}}"> Register </a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                {{--            </li>--}}
                {{--            <li class="nav-item">--}}
                {{--                <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">--}}
                {{--                    <i class="icon-ban menu-icon"></i>--}}
                {{--                    <span class="menu-title">Error pages</span>--}}
                {{--                    <i class="menu-arrow"></i>--}}
                {{--                </a>--}}
                {{--                <div class="collapse" id="error">--}}
                {{--                    <ul class="nav flex-column sub-menu">--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/error-404.html')}}"> 404 </a></li>--}}
                {{--                        <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/error-500.html')}}"> 500 </a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                {{--            </li>--}}
                {{--            <li class="nav-item">--}}
                {{--                <a class="nav-link" href="{{asset('assets/pages/documentation/documentation.html')}}">--}}
                {{--                    <i class="icon-paper menu-icon"></i>--}}
                {{--                    <span class="menu-title">Documentation</span>--}}
                {{--                </a>--}}
                {{--            </li>--}}
            </ul>
        </nav>
        <!-- partial -->
        @yield('content')
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/s/dataTables.select.min.js')}}j"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<script src="{{asset('assets/js/settings.js')}}"></script>
<script src="{{asset('assets/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/Chart.roundedBarCharts.js')}}"></script>
<!-- End custom js for this page-->
</body>

</html>

