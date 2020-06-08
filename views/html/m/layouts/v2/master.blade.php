@include('html.m.layouts.v2.header')

<body id="goTop">
    <!-- Gnb -->
    @include('html.m.layouts.v2.gnb')

    <!-- topnav -->
    @include('html.m.layouts.v2.topnav')
    
        <!-- content -->
        @yield('content')

    <!-- footer -->
    @include('html.m.layouts.v2.footer')

    <!-- scripts -->
    @include('html.m.layouts.v2.footer_script')
</body>
</html>