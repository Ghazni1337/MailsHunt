<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MailsHunt - {{$title}}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/icon-kit/dist/css/iconkit.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/ionicons/dist/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/jvectormap/jquery-jvectormap.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/weather-icons/css/weather-icons.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/c3/c3.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/owl.carousel/dist/admin/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/owl.carousel/dist/admin/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/dist/css/theme.min.css')}}">
        <script src="{{asset('admin/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        {{-- <script type='text/javascript'>
        var page_data = {!! pageJsonData() !!};
      </script> --}}
    </head>
        <body>

        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                                </div>
                            </div>
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                                <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                    <h4 class="header">Notifications</h4>
                                    <div class="notifications-wrap">
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">Invitation accepted</span> 
                                                <span class="media-content">Your have been Invited ...</span>
                                            </span>
                                        </a>
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <img src="{{asset('assets/img/users/1.jpg')}}" class="rounded-circle" alt="">
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">Steve Smith</span> 
                                                <span class="media-content">I slowly updated projects</span>
                                            </span>
                                        </a>
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-calendar"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">To Do</span> 
                                                <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                                <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="ik ik-mail"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Accounts"><i class="ik ik-users"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Sales"><i class="ik ik-shopping-cart"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Purchase"><i class="ik ik-briefcase"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Pages"><i class="ik ik-clipboard"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Chats"><i class="ik ik-message-square"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Contacts"><i class="ik ik-map-pin"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Blocks"><i class="ik ik-inbox"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Events"><i class="ik ik-calendar"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Notifications"><i class="ik ik-bell"></i></a>
                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="More"><i class="ik ik-more-horizontal"></i></a>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="img/user.jpg" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a>
                                    <a class="dropdown-item" href="login.html"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                
            @include('layouts.sidebar')

        @yield('content')

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('admin/src/js/vendor/jquery-3.3.1.min.js')}}"><\/script>')</script>
        <script src="{{asset('admin/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('admin/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('admin/plugins/screenfull/dist/screenfull.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap.min.js')}}"></script>
        <script src="{{asset('admin/plugins/jvectormap/tests/admin/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('admin/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script src="{{asset('admin/plugins/d3/dist/d3.min.js')}}"></script>
        <script src="{{asset('admin/plugins/c3/c3.min.js')}}"></script>
        <script src="{{asset('admin/js/tables.js')}}"></script>
        <script src="{{asset('admin/js/widgets.js')}}"></script>
        <script src="{{asset('admin/js/charts.js')}}"></script>
        <script src="{{asset('admin/dist/js/theme.min.js')}}"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>