@include('html.layouts.header')

<body>
    <!-- Gnb -->
    @include('html.layouts.gnb_main')

    <!-- topnav -->
    @include('html.layouts.topnav')
    
        <!-- content -->
        @yield('content')

    <!-- footer -->
    @include('html.layouts.footer')
</body>
</html>