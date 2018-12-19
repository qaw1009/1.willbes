@include('willbes.app.layouts.header')

<body id="goTop">
<!-- Gnb -->
@include('willbes.app.layouts.gnb')

<!-- topnav -->
@include('willbes.app.layouts.topnav')

<!-- content -->
@yield('content')

<!-- footer -->
@include('willbes.app.layouts.footer')

<!-- scripts -->
@include('willbes.app.layouts.footer_script')
</body>
</html>