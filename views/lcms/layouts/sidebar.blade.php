<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <!-- sidebar menu -->
        {{--<div class="navbar nav_title">
            <a id="menu_toggle" class="site_title"><i class="fa fa-bars no-margin"></i> <span>시스템 공통관리</span></a>
        </div>
        <div class="clearfix"></div>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{ site_url('sample/index') }}"><i class="fa fa-file-text"></i> 샘플-인덱스</a>
                    <li><a href="{{ site_url('sample/list') }}"><i class="fa fa-file-text"></i> 샘플-리스트</a>
                    <li><a href="{{ site_url('sample/paging') }}"><i class="fa fa-file-text"></i> 샘플-페이징</a>
                    <li><a href="{{ site_url('sys/code/index') }}"><i class="fa fa-code"></i> 공통코드 관리</a></li>
                    <li><a href="{{ site_url('sys/menu/index') }}"><i class="fa fa-link"></i> 메뉴 관리</a></li>
                    <li><a><i class="fa fa-user-plus"></i> 운영자 관리<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ site_url('sys/admin/index') }}">운영자 정보관리</a></li>
                            <li><a href="{{ site_url('sys/role/index') }}">권한유형 관리</a></li>
                            <li><a href="{{ site_url('sys/loginLog/index') }}">운영자 접속관리</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>--}}
        <div class="navbar nav_title">
            <a id="menu_toggle" class="menu-toggle site_title"><i class="fa fa-bars no-margin"></i> <span>{{ $__menu['LNB']['MenuName'] or '' }}</span></a>
        </div>
        <div class="clearfix"></div>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    @if(isset($__menu['LNB']['Children']) === true)
                        @foreach($__menu['LNB']['Children'] as $mmenu)
                            @if(isset($mmenu['Children']) === true)
                                <li><a><i class="fa {{ $mmenu['IconClassName'] }}"></i> {{ $mmenu['MenuName'] }}<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        @foreach($mmenu['Children'] as $smenu)
                                            <li><a href="{{ site_url($smenu['MenuUrl']) }}">{{ $smenu['MenuName'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ site_url($mmenu['MenuUrl']) }}"><i class="fa {{ $mmenu['IconClassName'] }}"></i> {{ $mmenu['MenuName'] }}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings" class="btn-cog">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a class="menu-toggle" data-toggle="tooltip" data-placement="top" title="Toggle sidebar">
                <span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Home" href="{{ site_url(get_var(element('home_url', $__settings), $__cfg['home_url'])) }}">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ site_url('/lcms/auth/login/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
