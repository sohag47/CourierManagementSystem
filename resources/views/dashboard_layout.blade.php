<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> @yield('title') - ARK Currier Service</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard/images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('dashboard/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <link href="{{ asset('dashboard/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

</head>

<body>
    @php
    $auth_user_info = \App\Models\User::with('roles')->where('id', '=', Auth::user()->id)->get()->toArray();
    @endphp
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ url('/') }}">
                    <h4>ARK Currier Service</h4>
                    {{-- <b class="logo-abbr"><img src="{{ asset('dashboard/images/logo.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('dashboard/images/logo-compact.png') }}"
                            alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('dashboard/images/logo-text.png') }}" alt="">
                    </span> --}}
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                {{-- <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                    class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard"
                            aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div> --}}
                <div class="header-right">
                    <ul class="clearfix">
                        {{-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg"
                                                    alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg"
                                                    alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg"
                                                    alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg"
                                                    alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li> --}}
                        {{-- <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                                <span>English</span> <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="#" class="log-user">
                                <span>{{ Auth::user()->name }} | {{ Auth::user()->email }}</span>
                            </a>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                @if (Auth::user()->photo)
                                <img src="{{asset('photo/user_photo')}}/{{Auth::user()->photo}}" height="40" width="40"
                                    alt="">
                                @else
                                <img src="{{ asset('dashboard/images/user/1.png') }}" height="40" width="40" alt="">
                                @endif

                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>


                                        <li>
                                            <a href="{{ route('user_profile', ['id'=>Auth::user()->id])}}"><i
                                                    class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        {{-- <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span>
                                                <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li> --}}

                                        <hr class="my-2">
                                        {{-- <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock
                                                    Screen</span></a>
                                        </li> --}}
                                        <li>
                                            {{-- <a href="page-login.html">
                                                <i class="icon-key"></i>
                                                <span>Logout</span>
                                            </a> --}}
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    <i class="icon-key"></i>
                                                    {{ __('Log Out') }}
                                                </a>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="{{ route('dashboard')}}" aria-expanded="false">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                            <span class="nav-text">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    @if ($auth_user_info[0]['roles']['title'] == "Super Admin")
                    <!--Settings-->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="nav-text">Settings
                            </span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('user.index') }}">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Users
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('role.index')}}">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                    Role
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('address.index')}}">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                    Address
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('price.index')}}">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    Price
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if ($auth_user_info[0]['roles']['title'] == "Super Admin" || $auth_user_info[0]['roles']['title']
                    == "Staff")
                    <!--Manage Branch-->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-industry" aria-hidden="true"></i>
                            <span class="nav-text">Manage Branch
                            </span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('branch.index')}}">
                                    <i class="fa fa-university" aria-hidden="true"></i>
                                    <span class="nav-text">Branch
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('branch_setup')}}">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                    Branch User Setup
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if ($auth_user_info[0]['roles']['title'] == "Super Admin" || $auth_user_info[0]['roles']['title']
                    == "Staff" || $auth_user_info[0]['roles']['title']
                    == "Delivery Man")
                    <!--Manage Shipment-->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <span class="nav-text">Manage Shipment
                            </span>
                        </a>
                        <ul aria-expanded="false">
                            @if ($auth_user_info[0]['roles']['title'] == "Super Admin" ||
                            $auth_user_info[0]['roles']['title']
                            == "Staff")
                            <li>
                                <a href="{{ route('courier.index') }}">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    Pending Order
                                </a>
                            </li>
                            @endif
                            {{-- @if ($auth_user_info[0]['roles']['title'] == "Super Admin" ||
                            $auth_user_info[0]['roles']['title']
                            == "Staff") --}}
                            <li>
                                <a href="{{ route('order-received') }}">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                    Recieved Order
                                </a>
                            </li>
                            {{-- @endif
                            @if ($auth_user_info[0]['roles']['title'] == "Super Admin" ||
                            $auth_user_info[0]['roles']['title']
                            == "Delivery Man") --}}
                            <li>
                                <a href="{{ route('order-transfer-list') }}">
                                    <i class="fa fa-truck " aria-hidden="true"></i>
                                    Transfer Order
                                </a>
                            </li>
                            {{-- @endif
                            @if ($auth_user_info[0]['roles']['title'] == "Super Admin" ||
                            $auth_user_info[0]['roles']['title']
                            == "Staff") --}}
                            <li>
                                <a href="{{ route('order-delivery-list') }}">
                                    <i class="fa fa-cubes" aria-hidden="true"></i>
                                    Delivery Order
                                </a>
                            </li>
                            {{-- @endif
                            @if ($auth_user_info[0]['roles']['title'] == "Super Admin" ||
                            $auth_user_info[0]['roles']['title']
                            == "Delivery Man") --}}
                            <li>
                                <a href="{{ route('order-complete') }}">
                                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                                    Order Distributes
                                </a>
                            </li>
                            <li>
                                {{-- @endif
                                @if ($auth_user_info[0]['roles']['title'] == "Super Admin" ||
                                $auth_user_info[0]['roles']['title']
                                == "Staff" || $auth_user_info[0]['roles']['title']
                                == "Delivery Man") --}}
                            <li>
                                <a href="{{ route('order-history')}}">
                                    <i class="fa fa-history" aria-hidden="true"></i>
                                    Order History
                                </a>
                            </li>
                            {{-- @endif --}}
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            @include('dashboard_messages')
            @yield('breadcrumb')
            @yield('content')
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; {{ date("Y") }}
                    <a href="{{ url('/')}}">
                        ARK Currier Service
                    </a>
                    All rights reserved.
                    {{-- Designed & Developed by
                    <a href="https://sohag47.github.io/">
                        Minhazul Islam Sohag
                    </a> --}}
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('dashboard/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/settings.js') }}"></script>
    <script src="{{ asset('dashboard/js/gleek.js') }}"></script>
    <script src="{{ asset('dashboard/js/styleSwitcher.js') }}"></script>

    <!-- Chartjs -->
    <script src="{{ asset('dashboard/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('dashboard/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('dashboard/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('dashboard/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('dashboard/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('dashboard/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

    <script src="{{ asset('dashboard/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>

    <script src="{{ asset('dashboard/js/dashboard/dashboard-1.js') }}"></script>

</body>

</html>