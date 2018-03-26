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
{{-- Main Scripts --}}
@include('lcms.layouts.footer_script')
</body>
</html>
