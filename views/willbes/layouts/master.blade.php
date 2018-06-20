@include('willbes.layouts.header')

<body>
    <!-- Gnb -->
    @include('willbes.layouts.gnb')

    <!-- topnav -->
    @include('willbes.layouts.topnav')
    
        <!-- content -->
        @yield('content')

    <!-- footer -->
    @include('willbes.layouts.footer')

    <!-- scripts -->
    @include('willbes.layouts.footer_script')
</body>
</html>