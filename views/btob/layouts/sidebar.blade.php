<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <!-- sidebar menu -->
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
                                            <li><a href="{{ site_url($smenu['MenuUrl']) }}" target="_{{ $smenu['UrlTarget'] }}">{{ $smenu['MenuName'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{ site_url($mmenu['MenuUrl']) }}" target="_{{ $mmenu['UrlTarget'] }}"><i class="fa {{ $mmenu['IconClassName'] }}"></i> {{ $mmenu['MenuName'] }}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="User" class="btn-btob-admin-modify">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </a>
            <a class="menu-toggle" data-toggle="tooltip" data-placement="top" title="Toggle sidebar">
                <span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Home" href="{{ site_url($__cfg['home_url']) }}">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ site_url('/auth/login/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
