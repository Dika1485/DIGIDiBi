<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DIGIDiBi - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        #clockdiv{
            /* font-family: sans-serif; */
            /* color: #fff; */
            display: inline-block;
            /* font-weight: 100; */
            text-align: center;
            /* font-size: 30px; */
        }
        #clockdiv > div{
            padding: 10px;
            border-radius: 3px;
            /* background: #00BF96; */
            display: inline-block;
        }
        /* #clockdiv div > span{
            padding: 15px;
            border-radius: 3px;
            background: #00816A;
            display: inline-block;
        } */
        /* smalltext{
            padding-top: 5px;
            font-size: 16px;
        } */
    </style>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('img/digidibiwhite.png')}}" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                		<img src="{{asset('img/digidibiwhite.png')}}" width="60%">
<!--                    <i class="fas fa-laugh-wink"></i>-->
                </div>
                <div class="sidebar-brand-text mx-3">DIGIDiBi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
<!--            <hr class="sidebar-divider">-->

            <!-- Heading -->
<!--            <div class="sidebar-heading">-->
<!--                Interface-->
<!--            </div>-->

            <!-- Nav Item - Pages Collapse Menu -->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"-->
<!--                    aria-expanded="true" aria-controls="collapseTwo">-->
<!--                    <i class="fas fa-fw fa-cog"></i>-->
<!--                    <span>Components</span>-->
<!--                </a>-->
<!--                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
<!--                    <div class="bg-white py-2 collapse-inner rounded">-->
<!--                        <h6 class="collapse-header">Custom Components:</h6>-->
<!--                        <a class="collapse-item" href="buttons.html">Buttons</a>-->
<!--                        <a class="collapse-item" href="cards.html">Cards</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->

            <!-- Nav Item - Utilities Collapse Menu -->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"-->
<!--                    aria-expanded="true" aria-controls="collapseUtilities">-->
<!--                    <i class="fas fa-fw fa-wrench"></i>-->
<!--                    <span>Utilities</span>-->
<!--                </a>-->
<!--                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"-->
<!--                    data-parent="#accordionSidebar">-->
<!--                    <div class="bg-white py-2 collapse-inner rounded">-->
<!--                        <h6 class="collapse-header">Custom Utilities:</h6>-->
<!--                        <a class="collapse-item" href="utilities-color.html">Colors</a>-->
<!--                        <a class="collapse-item" href="utilities-border.html">Borders</a>-->
<!--                        <a class="collapse-item" href="utilities-animation.html">Animations</a>-->
<!--                        <a class="collapse-item" href="utilities-other.html">Other</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"-->
<!--                    aria-expanded="true" aria-controls="collapsePages">-->
<!--                    <i class="fas fa-fw fa-folder"></i>-->
<!--                    <span>Pages</span>-->
<!--                </a>-->
<!--                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">-->
<!--                    <div class="bg-white py-2 collapse-inner rounded">-->
<!--                        <h6 class="collapse-header">Login Screens:</h6>-->
<!--                        <a class="collapse-item" href="login.html">Login</a>-->
<!--                        <a class="collapse-item" href="register.html">Register</a>-->
<!--                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>-->
<!--                        <div class="collapse-divider"></div>-->
<!--                        <h6 class="collapse-header">Other Pages:</h6>-->
<!--                        <a class="collapse-item" href="404.html">404 Page</a>-->
<!--                        <a class="collapse-item" href="blank.html">Blank Page</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->

            <!-- Nav Item - Charts -->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="charts.html">-->
<!--                    <i class="fas fa-fw fa-chart-area"></i>-->
<!--                    <span>Charts</span></a>-->
<!--            </li>-->

            <!-- Nav Item - Tables -->
            @if(Auth::user()->role=="Admin")
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/users">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/rent">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Rental</span></a>
            </li>
            @endif

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/order">
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>Order</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/packagetype">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Package Type</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/history">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!--<div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>-->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
<!--                    <form-->
<!--                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">-->
<!--                        <div class="input-group">-->
<!--                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."-->
<!--                                aria-label="Search" aria-describedby="basic-addon2">-->
<!--                            <div class="input-group-append">-->
<!--                                <button class="btn btn-primary" type="button">-->
<!--                                    <i class="fas fa-search fa-sm"></i>-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
<!--                        <li class="nav-item dropdown no-arrow d-sm-none">-->
<!--                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"-->
<!--                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                <i class="fas fa-search fa-fw"></i>-->
<!--                            </a>-->
                            <!-- Dropdown - Messages -->
<!--                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"-->
<!--                                aria-labelledby="searchDropdown">-->
<!--                                <form class="form-inline mr-auto w-100 navbar-search">-->
<!--                                    <div class="input-group">-->
<!--                                        <input type="text" class="form-control bg-light border-0 small"-->
<!--                                            placeholder="Search for..." aria-label="Search"-->
<!--                                            aria-describedby="basic-addon2">-->
<!--                                        <div class="input-group-append">-->
<!--                                            <button class="btn btn-primary" type="button">-->
<!--                                                <i class="fas fa-search fa-sm"></i>-->
<!--                                            </button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </form>-->
<!--                            </div>-->
<!--                        </li>-->

                        <!-- Nav Item - Alerts -->
<!--                        <li class="nav-item dropdown no-arrow mx-1">-->
<!--                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"-->
<!--                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                <i class="fas fa-bell fa-fw"></i>-->
                                <!-- Counter - Alerts -->
<!--                                <span class="badge badge-danger badge-counter">3+</span>-->
<!--                            </a>-->
                            <!-- Dropdown - Alerts -->
<!--                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"-->
<!--                                aria-labelledby="alertsDropdown">-->
<!--                                <h6 class="dropdown-header">-->
<!--                                    Alerts Center-->
<!--                                </h6>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="mr-3">-->
<!--                                        <div class="icon-circle bg-primary">-->
<!--                                            <i class="fas fa-file-alt text-white"></i>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="small text-gray-500">December 12, 2019</div>-->
<!--                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="mr-3">-->
<!--                                        <div class="icon-circle bg-success">-->
<!--                                            <i class="fas fa-donate text-white"></i>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="small text-gray-500">December 7, 2019</div>-->
<!--                                        $290.29 has been deposited into your account!-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="mr-3">-->
<!--                                        <div class="icon-circle bg-warning">-->
<!--                                            <i class="fas fa-exclamation-triangle text-white"></i>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="small text-gray-500">December 2, 2019</div>-->
<!--                                        Spending Alert: We've noticed unusually high spending for your account.-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>-->
<!--                            </div>-->
<!--                        </li>-->

                        <!-- Nav Item - Messages -->
<!--                        <li class="nav-item dropdown no-arrow mx-1">-->
<!--                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"-->
<!--                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                <i class="fas fa-envelope fa-fw"></i>-->
                                <!-- Counter - Messages -->
<!--                                <span class="badge badge-danger badge-counter">7</span>-->
<!--                            </a>-->
                            <!-- Dropdown - Messages -->
<!--                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"-->
<!--                                aria-labelledby="messagesDropdown">-->
<!--                                <h6 class="dropdown-header">-->
<!--                                    Message Center-->
<!--                                </h6>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="dropdown-list-image mr-3">-->
<!--                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"-->
<!--                                            alt="...">-->
<!--                                        <div class="status-indicator bg-success"></div>-->
<!--                                    </div>-->
<!--                                    <div class="font-weight-bold">-->
<!--                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a-->
<!--                                            problem I've been having.</div>-->
<!--                                        <div class="small text-gray-500">Emily Fowler · 58m</div>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="dropdown-list-image mr-3">-->
<!--                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"-->
<!--                                            alt="...">-->
<!--                                        <div class="status-indicator"></div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="text-truncate">I have the photos that you ordered last month, how-->
<!--                                            would you like them sent to you?</div>-->
<!--                                        <div class="small text-gray-500">Jae Chun · 1d</div>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="dropdown-list-image mr-3">-->
<!--                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"-->
<!--                                            alt="...">-->
<!--                                        <div class="status-indicator bg-warning"></div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="text-truncate">Last month's report looks great, I am very happy with-->
<!--                                            the progress so far, keep up the good work!</div>-->
<!--                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="dropdown-list-image mr-3">-->
<!--                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"-->
<!--                                            alt="...">-->
<!--                                        <div class="status-indicator bg-success"></div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone-->
<!--                                            told me that people say this to all dogs, even if they aren't good...</div>-->
<!--                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>-->
<!--                            </div>-->
<!--                        </li>-->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->username}}</span>
                                <i class="rounded-circle fas fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/dashboard/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
<!--                                <a class="dropdown-item" href="#">-->
<!--                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                                    Settings-->
<!--                                </a>-->
<!--                                <a class="dropdown-item" href="#">-->
<!--                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                                    Activity Log-->
<!--                                </a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{number_format($month,2,',','.')}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{number_format($year,2,',','.')}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$all}}</div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$inqueue}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <!-- <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6> -->
                                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart of Progress</h6>
                                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPie"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> In Queue
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Wash
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Ironing
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Packing
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Being Delivered
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Percentage of Complete Progress</h6>
                                </div>
                                <div class="card-body">
                                    @if($all!=0)
                                    <h4 class="small font-weight-bold">In Queue<span
                                            class="float-right">{{number_format(($all-$inqueue)/$all*100, 2)}}%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{($all-$inqueue)/$all*100}}%"
                                            aria-valuenow="{{($all-$inqueue)/$all*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Wash<span
                                            class="float-right">{{number_format(($all-$wash)/$all*100, 2)}}%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{($all-$wash)/$all*100}}%"
                                            aria-valuenow="{{($all-$wash)/$all*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Ironing <span
                                            class="float-right">{{number_format(($all-$ironing)/$all*100, 2)}}%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: {{($all-$ironing)/$all*100}}%"
                                            aria-valuenow="{{($all-$ironing)/$all*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Packing <span
                                            class="float-right">{{number_format(($all-$packing)/$all*100, 2)}}%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{($all-$packing)/$all*100}}%"
                                            aria-valuenow="{{($all-$packing)/$all*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Being Delivered <span
                                            class="float-right">{{number_format(($all-$delivered)/$all*100, 2)}}%</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{($all-$delivered)/$all*100}}%"
                                            aria-valuenow="{{($all-$delivered)/$all*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @else
                                    <h4 class="small font-weight-bold">In Queue<span
                                            class="float-right">100%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Wash<span
                                            class="float-right">100%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Ironing <span
                                            class="float-right">100%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Packing <span
                                            class="float-right">100%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Being Delivered <span
                                            class="float-right">100%</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Color System -->
                            <!-- <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                        @if(Auth::user()->role!="Admin")

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4" id="rental_now">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Rent Deadline</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="{{asset('img/undraw_posting_photo.svg')}}" alt="..."> -->
                                    </div>
                                    <p class="text-danger font-weight-bold">This is timer of your rent deadline !!!</p>
                                    <div id="clockdiv" class="text-white">
                                        <div class="bg-info">
                                            <span class="days" id="day"></span>
                                            <div class="smalltext">Days</div>
                                        </div>
                                        <div class="bg-info">
                                            <span class="hours" id="hour"></span>
                                            <div class="smalltext">Hours</div>
                                        </div>
                                        <div class="bg-info">
                                            <span class="minutes" id="minute"></span>
                                            <div class="smalltext">Minutes</div>
                                        </div>
                                        <div class="bg-info">
                                            <span class="seconds" id="second"></span>
                                            <div class="smalltext">Seconds</div>
                                        </div>
                                        <p id="demo" class="text-danger text-lg font-weight-bold"></p>
                                    </div>
                                    <!-- <p>Month&emsp;<button class="btn btn-danger">-</button><button class="btn btn-white">1</button><button class="btn btn-primary">+</button></p> -->
                                    <p></p>
                                    <div>
                                        For Next One Month,</br>
                                        <button type="submit" id="pay-button" class="btn btn-success">
                                            Renew Rent Now
                                        </button>
                                    </div>
                                    <form action="/dashboard" id="submit_form" method="POST">
                                    	@csrf
                                        <input type="hidden" name="json" id="json_callback">
                                    </form>
                                    <!-- <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a> -->
                                </div>
                            </div>

                            <!-- Approach -->
                            <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div> -->

                        </div>
                        @endif
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; DIGIDiBi 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Logout') }}</a>
                    <!-- <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">{{ __('Log Out') }}</x-jet-dropdown-link> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-RGC0_Tjcsh2Hdoec"></script>
    <script>
        var deadline = new Date("{{Auth::user()->deadline}}").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();var t = deadline - now;
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((t % (1000 * 60)) / 1000);
            document.getElementById("day").innerHTML =days ;
            document.getElementById("hour").innerHTML =hours;
            document.getElementById("minute").innerHTML = minutes;
            document.getElementById("second").innerHTML =seconds;
            if (t < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "TIME UP !!!";
                document.getElementById("day").innerHTML ='0';
                document.getElementById("hour").innerHTML ='0';
                document.getElementById("minute").innerHTML ='0';
                document.getElementById("second").innerHTML = '0';
            }
        }, 1000);
    </script>
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
            send_response_to_form(result)
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
            send_response_to_form(result)
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
            send_response_to_form(result)
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
      function send_response_to_form(result){
      	document.getElementById('json_callback').value=JSON.stringify(result);
      	$('#submit_form').submit();
      }
    </script>
    <script>
var ctx = document.getElementById("myChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [{{$jan}}, {{$feb}}, {{$mar}}, {{$apr}}, {{$mei}}, {{$jun}}, {{$jul}}, {{$aug}}, {{$sep}}, {{$oct}}, {{$nov}}, {{$dec}}],
    //   data: [100000, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
            beginAtZero: true,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp. ' + number_format(value) + ',00';
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel) + ',00';
        }
      }
    }
  }
});
    </script>
    <script>
var ctx = document.getElementById("myPie");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["In Queue", "Wash", "Ironing", "Packing", "Being Delivered"],
    datasets: [{
    //   data: [55, 30, 15],
      data: [{{$inqueue}}, {{$wash}}, {{$ironing}}, {{$packing}}, {{$delivered}}],
      backgroundColor: ['#e74a3b', '#f6c23e', '#4e73df', '#36b9cc', '#1cc88a'],
      hoverBackgroundColor: ['#d74a3b', '#e6c23e', '#3e73df', '#26b9cc', '#0cc88a'],
      hoverBorderColor: ['#e74a3b', '#f6c23e', '#4e73df', '#36b9cc', '#1cc88a'],
    //   hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
    </script>
</body>

</html>
