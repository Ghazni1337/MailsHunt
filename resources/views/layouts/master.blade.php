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
        <script type='text/javascript'>
        var page_data = {!! pageJsonData() !!};
      </script>
    </head>

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