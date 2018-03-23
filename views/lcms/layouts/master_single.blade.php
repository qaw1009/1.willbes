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
<!-- Main Scripts -->
<!-- multifield -->
<script src="/public/vendor/validator/multifield.js"></script>
<script src="/public/js/util.js"></script>
<script src="/public/js/validation_util.js"></script>
<script src="/public/js/lcms/app.js"></script>
</body>
</html>
