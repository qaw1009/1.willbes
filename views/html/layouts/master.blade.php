@include('html.layouts.header')

<body>
    <!-- Gnb -->
    @include('html.layouts.gnb')
    <!-- /Gnb -->

    <!-- topnav -->
    @include('html.layouts.topnav')
    <!-- /topnav -->
    
        <!-- content -->
        @yield('content')
        <!-- /content -->

    <!-- footer -->
    @include('html.layouts.footer')
    <!-- /footer -->
</body>
</html>