{{--@include('html.layouts.header')--}}
@include('willbes.pc.layouts.header')

<body>
    <!-- Gnb -->
    {{--@include('html.layouts.gnb_main')--}}
    @include('willbes.pc.layouts.gnb')

    <!-- cop online top banner-->
    @include('html.layouts.cop_topBnr')

    <!-- topnav -->
    @include('html.layouts.topnav')
    
        <!-- content -->
        @yield('content')

    <!-- footer -->
    {{--@include('html.layouts.footer')--}}
    <!-- footer -->
    @include('willbes.pc.layouts.footer')

    <!-- scripts -->
    @include('willbes.pc.layouts.footer_script')
</body>
</html>