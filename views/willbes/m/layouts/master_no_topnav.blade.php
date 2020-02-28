@include('willbes.m.layouts.header')

<body id="goTop">
<!-- Gnb -->
@include('willbes.m.layouts.gnb')

<!-- topnav -->
{{--@include('willbes.m.layouts.topnav')--}}

<!-- content -->
@yield('content')

<!-- footer -->
{{--@include('willbes.m.layouts.footer')--}}

<!-- scripts -->
@include('willbes.m.layouts.footer_script')
</body>
</html>