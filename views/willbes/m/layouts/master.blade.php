@include('willbes.m.layouts.header')

<body id="goTop">
<!-- Gnb -->
@include('willbes.m.layouts.gnb')

<!-- topnav -->
@include('willbes.m.layouts.topnav')

<!-- content -->
@yield('content')

<!-- footer -->
@include('willbes.m.layouts.footer')

<!-- scripts -->
@include('willbes.m.layouts.footer_script')

@if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development')
    {{-- 방문자 트래킹 (테스트) --}}
    <script src="/public/js/willbes/tracking.js?ver={{time()}}"></script>
@endif
</body>
</html>