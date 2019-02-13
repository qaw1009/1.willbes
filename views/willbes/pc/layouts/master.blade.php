@include('willbes.pc.layouts.header')

<body>
    <!-- Gnb -->
    @include('willbes.pc.layouts.gnb')

    <!-- cop online top banner-->
    @include('willbes.pc.layouts.cop_topBnr')

    <!-- topnav -->
    @include('willbes.pc.layouts.topnav')
    
        <!-- content -->
        @yield('content')

    <!-- footer -->
    @include('willbes.pc.layouts.footer')

    <!-- scripts -->
    @include('willbes.pc.layouts.footer_script')
</body>
</html>