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

    <!-- footer -->
    @include('willbes.pc.layouts.footer')

    <!-- scripts -->
    @include('willbes.pc.layouts.footer_script')

    <!-- post content -->
    @yield('post_content')

    @if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development')
        {{-- 방문자 트래킹 (테스트) --}}
        <script src="/public/js/willbes/tracking.js?ver={{time()}}"></script>
    @endif
</body>
</html>