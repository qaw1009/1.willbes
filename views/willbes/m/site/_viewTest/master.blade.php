@include('willbes.m.site._viewTest.header')

<body id="goTop">
<!-- Gnb -->
@include('willbes.m.layouts.gnb')

<!-- topnav -->
@include('willbes.m.site._viewTest.topnav')

<!-- content -->
@yield('content')

<!-- footer -->
@include('willbes.m.layouts.footer')

<!-- scripts -->
@include('willbes.m.layouts.footer_script')

{{-- 방문자 트래킹 --}}
<script src="/public/js/willbes/tracking.js?ver={{time()}}"></script>
</body>
</html>