@include('lcms.layouts.header')

<body class="no_sidebar top_nav_fixed footer_fixed">
<div class="container body">
    <div class="main_container">
        <!-- topnav -->
        @include('lcms.layouts.topnav')
        <!-- /topnav -->

        <div class="clearfix"></div>

        <!-- page content -->
        <div class="right_col bg-white" role="main">
            <div class="row ml-0 mr-0">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @yield('content')
                </div>
            </div>
            <div class="clearfix"></div>
            <br/>
        </div>
        <!-- /page content -->

        <div class="clearfix"></div>

        <!-- footer content -->
        @include('lcms.layouts.footer')
        <!-- /footer content -->
    </div>
</div>
<!-- Main Scripts -->
<!-- multifield -->
<script src="/public/vendor/validator/multifield.js"></script>
<script src="/public/js/util.js"></script>
<script src="/public/js/validation_util.js"></script>
<script src="/public/js/lcms/app.js"></script>
</body>
</html>
