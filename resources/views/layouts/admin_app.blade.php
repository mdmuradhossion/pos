<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pos</title>
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"> -->
    <!-- Pignose Calender -->
    <link href="{{ asset('./plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('./plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/selectize.bootstrap3.min.css') }}"/>

</head>

<body>

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
                <a href="{{ url('/home') }}">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <!-- <img src="images/logo-text.png" alt=""> -->
                        <h4>Assistent</h4>
                    </span>
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
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
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
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
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
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>{{ Auth::user()->name }}</span>  <!-- <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i> -->
                            </a>
                            <!-- <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li>
                                        	<!-- <a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a> -->

                                        	<a  href="{{ route('logout') }}"
		                                       onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i> <span>Logout</span>
		                                    </a>

		                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                                        @csrf
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
                        <a class="has-arrow" href="{{ url('/home') }}" >

                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <!-- <ul aria-expanded="false">
                            <li><a href="./index.html">Home 1</a></li>
                            
                        </ul> -->
                    </li>

                    <li class="nav-label">users</li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-users"></i> <span class="nav-text">users</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/customer') }}">Customer</a></li>
                            <li><a href="{{ url('/supplier') }}">Suppliers</a></li>
                            <li><a href="{{ url('/accountholder') }}">Account Holder</a></li>
                        </ul>
                    </li>



                    <li class="nav-label">Transaction</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-fw fa-exchange"></i> <span class="nav-text">Transaction</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/transaction_form') }}">Transaction Create</a></li>
                            <li><a href="{{ url('/transaction') }}">Transaction List</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Purchase</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-fw fa-briefcase"></i> <span class="nav-text">Purchase</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/purchase_form') }}">Purchase Create</a></li>
                            <li><a href="{{ url('/purchase') }}">Purchase List</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Products</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Products</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/products') }}">Products List</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Category</a>
                                <ul aria-expanded="false">        
                                    <li><a href="{{ url('/category_form') }}">Category Create</a></li>
                                    <li><a href="{{ url('/category') }}">Category List</a></li>                                    
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Brand</a>
                                <ul aria-expanded="false">        
                                    <li><a href="{{ url('/brand_form') }}">Brand Create</a></li>
                                    <li><a href="{{ url('/brand') }}">Brand List</a></li>                                   
                                </ul>
                            </li>
                            
                            
                        </ul>
                    </li>

                    <li class="nav-label">Sales</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-fw fa-cart-plus"></i> <span class="nav-text">Sales</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/sales_form') }}">Sales Create</a></li>
                            <li><a href="{{ url('/sales') }}">Sales List</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Report</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-fw fa-tasks"></i> <span class="nav-text">Report</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Invoice</a></li>
                            <li><a href="#">Daily Book</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Stock</a>
                                <ul aria-expanded="false">        
                                    <li><a href="">Stores</a></li>
                                    <li><a href="">Product Short list</a></li>
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Ladger</a>
                                <ul aria-expanded="false"> 
                                    <li><a href="{{ url('/shop_ledgar') }}">Shops</a></li>       
                                    <li><a href="{{ url('/customer_ledgar') }}">Customer</a></li>
                                    <li><a href="{{ url('/supplier_ledgar') }}">Supplier</a></li>
                                    <li><a href="{{ url('/account_holder_ledgar') }}">Account Holder</a></li>    
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Purchase Product Return</a>
                                <ul aria-expanded="false"> 
                                    <li><a href="">Return</a></li>       
                                    <li><a href="">Return List</a></li>  
                                </ul>
                            </li>
                            
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Sale Product Return</a>
                                <ul aria-expanded="false"> 
                                    <li><a href="">Return</a></li>       
                                    <li><a href="">Return List</a></li>   
                                </ul>
                            </li>
                            <li><a href="#">Warranty</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Sattings</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa fa-gears"></i> <span class="nav-text">Sattings</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/sattings') }}">Sattings</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		@yield('content')
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">Murad</a> 2020</p>
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
    <script src="{{ asset('/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('/js/custom.min.js') }}"></script>
    <script src="{{ asset('/js/settings.js') }}"></script>
    <script src="{{ asset('/js/gleek.js') }}"></script>
    <script src="{{ asset('/js/styleSwitcher.js') }}"></script>

    <!-- Chartjs -->
    <script src="{{ asset('./plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('./plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('./plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('./plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('./plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('./plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('./plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('./plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('./plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('./plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

    <script src="{{ asset('./js/dashboard/dashboard-1.js') }}"></script>
    <!-- dataTables -->
    <script src="{{ asset('./plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('./plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('./plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

    <script src="{{ asset('./js/selectize.min.js') }}" ></script>    

    @extends('ajax.ajax')
</body>

</html>