@include('willbes.pc.layouts.header')

<body>
    <!-- Gnb -->
    @include('willbes.pc.layouts.gnb')

    <!-- top banner-->
    @include('willbes.pc.layouts.topbnr')

    <!-- topnav -->
    @include('willbes.pc.layouts.topnav')
    
        <!-- content -->
        @yield('content')

    <!-- quicknav -->
    @include('willbes.pc.layouts.quickbnr')

    <!-- footer -->
    @include('willbes.pc.layouts.footer')

    <!-- scripts -->
    @include('willbes.pc.layouts.footer_script')

    <!-- post content -->
    @yield('post_content')

    {{-- 방문자 트래킹 --}}
    <script src="/public/js/willbes/tracking.js?ver={{time()}}"></script>
</body>
</html>