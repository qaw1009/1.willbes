{{-- 로그인 페이지와 같은 단독 레이아웃 --}}
@include('btob.layouts.header')

<body class="single">
<div class="container body no-bgcolor">
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
@include('btob.layouts.footer_script')
</body>
</html>
