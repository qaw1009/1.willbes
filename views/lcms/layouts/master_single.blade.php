{{-- 로그인 페이지와 같은 단독 레이아웃 --}}
@include('lcms.layouts.header')

<body class="single">
<div class="container body">
    <div class="main_container">

        <!-- page content -->
        <div class="col-md-12 text-center">
            @yield('content')
        </div>
        <!-- /page content -->

        <div class="clearfix"></div>
    </div>
</div>
{{-- Main Scripts --}}
@include('lcms.layouts.footer_script')
</body>
</html>
