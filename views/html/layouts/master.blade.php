@include('html.layouts.header')

<body>
    <!-- Gnb -->
    @include('html.layouts.gnb')

    <!-- cop online top banner-->
    @include('html.layouts.cop_topBnr')

    <!-- topnav -->
    @include('html.layouts.topnav')
    
        <!-- content -->
        @yield('content')

    <!-- footer -->
    @include('html.layouts.footer')
</body>
</html>