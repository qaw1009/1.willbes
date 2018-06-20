@include('willbes.layouts.pc.header')

<body>
    <!-- Gnb -->
    @include('willbes.layouts.pc.gnb')

    <!-- topnav -->
    @include('willbes.layouts.pc.topnav')
    
        <!-- content -->
        @yield('content')

    <!-- footer -->
    @include('willbes.layouts.pc.footer')

    <!-- scripts -->
    @include('willbes.layouts.pc.footer_script')
</body>
</html>