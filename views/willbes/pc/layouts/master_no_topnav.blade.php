@include('willbes.pc.layouts.header')

<body>
    <!-- Gnb -->
    @include('willbes.pc.layouts.gnb')

        <!-- content -->
        @yield('content')

    <!-- footer -->
    @include('willbes.pc.layouts.footer')

    <!-- scripts -->
    @include('willbes.pc.layouts.footer_script')

    <!-- post content -->
    @yield('post_content')
</body>
</html>