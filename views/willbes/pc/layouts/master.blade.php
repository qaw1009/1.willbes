@include('willbes.pc.layouts.header')

<body class="{{ SUB_DOMAIN }}">
    <!-- Gnb -->
    @include('willbes.pc.layouts.gnb')

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