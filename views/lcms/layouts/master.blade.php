@include('lcms.layouts.header')

<body class="top_nav_fixed footer_fixed nav-{{ get_var(element('sidebar_size', $__settings), 'md') }}">
<div class="container body">
    <div class="main_container">
        <!-- topnav -->
        @include('lcms.layouts.topnav')
        <!-- /topnav -->

        <div class="clearfix"></div>

        <!-- sidebar -->
        @include('lcms.layouts.sidebar')
        <!-- /sidebar -->

        <div class="clearfix"></div>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    {{--<h4>@yield('page_title')</h4>--}}
                    <h4>{!! $__menu['CURRENT']['UrlRouteName'] or '' !!}</h4>
                </div>
                <div class="title_right">
                    <p class="text-right">
                        <a id="btn_favorite" href="#none"><i class="fa fa-lg fa-star-o @if(element('IsFavorite', $__menu['CURRENT']) === true) red @endif"></i></a>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
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
<script type="text/javascript">
    $(document).ready(function() {
        // 즐겨찾기 버튼 클릭
        $('#btn_favorite').on('click', function() {
            var is_regist = $(this).children('i').prop('class').indexOf('red') < 0;
            var msg = (is_regist === true) ? '즐겨찾기에 추가하시겠습니까?' : '즐겨찾기를 삭제하시겠습니까?';

            if (!confirm(msg)) {
                return;
            }

            var data = {
                '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                'menu_idx' : '{{ element('MenuIdx', $__menu['CURRENT']) }}'
            };
            sendAjax('{{ site_url('/sys/adminSettings/favorite') }}', data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showError, false, 'POST');
        });
    });
</script>
</body>
</html>
