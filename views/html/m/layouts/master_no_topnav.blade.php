@include('html.m.layouts.header')

<body id="goTop">
    <!-- Gnb -->
    @include('html.m.layouts.gnb')

        <!-- content -->
        @yield('content')

    <!-- footer -->
    @include('html.m.layouts.footer')

    <!-- scripts -->
    @include('html.m.layouts.footer_script')
</body>
</html>