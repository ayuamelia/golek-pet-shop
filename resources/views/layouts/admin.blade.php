<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin GPS | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset ('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset ('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset ('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset ('bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset ('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset ('dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{route('allpetshop')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>G</b>PS</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>GPS</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    @if (Auth::user()->isAdmin())
                    <li><a href="{{route('allpetshop')}}">Main Website</a></li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">Hello, {{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu" role="menu" style="width: auto">
                            <li>
                                <a href="/profile">Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @elseif (Auth::user()->isAdminPetshop())
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">Hello, {{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu" role="menu" style="width: auto">
                                    <li>
                                        <a href="/profile">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @endif

                        </ul>

                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side menu -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <!--Dashboard-->
                <li>
                    <a href="/admin/dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->isAdmin())
                <!--Petshop-->
                <li class="treeview">
                    <a href="#">
                        <i class="ion ion-ios-home"></i> <span>Petshop</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/petshops"><i class="fa fa-circle-o"></i>Data</a></li>
                        <li><a href="/admin/createPetshopForm"><i class="fa fa-circle-o"></i> Create New</a></li>
                    </ul>
                </li>
                <!--User-->
                <li class="treeview">
                    <a href="#">
                        <i class="ion ion-ios-person"></i> <span>User</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/users"><i class="fa fa-circle-o"></i> Data</a></li>
                        <li><a href="/admin/createUserForm"><i class="fa fa-circle-o"></i> Create New</a></li>
                    </ul>
                </li>
                <!--Pet-->
                <li class="treeview">
                    <a href="#">
                        <i class="ion ion-ios-paw"></i> <span>Pet</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/pets"><i class="fa fa-circle-o"></i> Data</a></li>
                    </ul>
                </li>
                <!--Reservation-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder "></i> <span>Reservation</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/reservations"><i class="fa fa-circle-o"></i> Data</a></li>
                    </ul>
                </li>
                <!--Report-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book "></i> <span>Report</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/reportPetshop"><i class="fa fa-circle-o"></i>Petshop</a></li>
                        <li><a href="/admin/reportUser"><i class="fa fa-circle-o"></i>User</a></li>
                        <li><a href="/admin/reportPet"><i class="fa fa-circle-o"></i>Pet</a></li>
                        <li><a href="/admin/reportReservation"><i class="fa fa-circle-o"></i>Reservation</a></li>
                    </ul>
                </li>


                <!--admin petshop-->
                @elseif (Auth::user()->isAdminPetshop())
                <!--Petshop-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Petshop</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/data"><i class="fa fa-circle-o"></i>Data</a></li>
                    </ul>
                </li>
                <!--Reservation-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Reservation</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/reservationData"><i class="fa fa-circle-o"></i> Data</a></li>
                    </ul>
                </li>

                <!--Report-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book "></i> <span>Report</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/reportReservationPetshop"><i class="fa fa-circle-o"></i>Reservation</a></li>
                    </ul>
                </li>

                @endif
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('body')

    </div>
    <!-- /.content-wrapper -->


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset ('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset ('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset ('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{asset ('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{asset ('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{asset ('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{asset ('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{asset ('bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset ('dist/js/pages/dashboard2.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ('dist/js/demo.js') }}"></script>
<script src="{{asset ('ad.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-46680343-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-46680343-1');
</script>
</body>
</html>
