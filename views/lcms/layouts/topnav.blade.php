<div class="col-md-12 top_col">
    <div class="row main_top_header @if(SUB_DOMAIN == 'wbs')wbs @else(SUB_DOMAIN == 'lms')lms @endif">
        <div class="col-md-12 mt-10">
            <div class="col-md-4 logo">
                <img src="/public/img/logo.png" class="ml-15 mr-20"/>
                <span class="blue valign-middle">{{ $__cfg['site_title'] }}</span>
            </div>
            @if(SUB_DOMAIN != 'tzone')
                <div class="col-md-5">
                    <ul class="nav nav-tabs bar_tabs">
                        <li role="presentation" class="@if(SUB_DOMAIN == 'wbs') active @endif"><a href="{{ app_url('/', 'wbs') }}" class="">WBS</a></li>
                        <li role="presentation" class="@if(SUB_DOMAIN == 'lms') active @endif"><a href="{{ app_url('/', 'lms') }}" class="">LMS</a></li>
                    </ul>
                </div>
            @else
                <div class="col-md-5">
                </div>
            @endif
            <div class="col-md-3 nav_login">
                <div class="pull-right">
                    <div class="pull-left mr-20 mt-5">
                        {{ date('Y.m.d') }}
                        <span class="block ml-5 mr-5">|</span>
                        <a href="#" class="btn-admin-modify">{{ sess_data('admin_name') }} <span class="blue">[{{ $__auth['Role']['RoleName'] }}]</span></a>
                    </div>
                    <div class="pull-left mr-15 mt-5">
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="mr-5"><a href="#" class="btn-cog no-padding"><i class="fa fa-lg fa-cog dark-blue"></i></a>
                            <li role="presentation" class="mr-5">
                                <a href="#none" class="dropdown-toggle no-padding" role="button" id="favorite" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-lg fa-star-o @if(element('IsFavorite', $__menu['CURRENT']) === true) red @endif"></i>
                                </a>
                                @if(isset($__settings['favorite']) === true)
                                <ul class="dropdown-menu" role="menu" aria-labelledby="favorite">
                                    @foreach($__settings['favorite'] as $menu_idx => $menu)
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ $menu['MenuUrl'] }}">{{ $menu['MenuName'] }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            <li role="presentation"><a href="{{ site_url(get_var(element('home_url', $__settings), $__cfg['home_url'])) }}" class="no-padding"><i class="fa fa-lg fa-home dark-blue"></i></a>
                        </ul>
                    </div>
                    <div class="pull-left">
                        <a href="{{ site_url('/lcms/auth/login/logout') }}"><button class="btn btn-success btn-sm mr-15">로그아웃</button></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row main_top_menu mt-10">
        <div class="col-md-12">
            {{--
            <div class="navbar navbar-default no-border bdb-line" role="navigation">
                <div class="container-fluid bg-white-only">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <!--<ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Right Menu</a></li>
                        </ul>-->
                        <ul class="nav navbar-nav">
                            <li class=""><a href="#">Home</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu 1 <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-level">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                    <li class="dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
            --}}
            <ul class="nav nav-tabs bar_tabs">
                <li role="presentation" class="active">
                    <a href="{{ site_url(get_var(element('home_url', $__settings), $__cfg['home_url'])) }}" class="cs-pointer">메인</a>
                </li>
                @if(isset($__menu['GNB']) === true)
                    @foreach($__menu['GNB'] as $bmenu)
                        @if(isset($bmenu['Children']) === true)
                            <li role="presentation" class="dropdown">
                                <a id="{{ $bmenu['TreeNum'] }}" href="#">
                                    {{ $bmenu['MenuName'] }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($bmenu['Children'] as $mmenu)
                                        @if(isset($mmenu['Children']) === true)
                                            <li role="presentation" class="dropdown-submenu">
                                                <a id="{{ $mmenu['TreeNum'] }}" href="#">{{ $mmenu['MenuName'] }}</a>
                                                <ul class="dropdown-menu animated fadeIn">
                                                    @foreach($mmenu['Children'] as $smenu)
                                                        <li role="presentation"><a tabindex="-1" href="{{ site_url($smenu['MenuUrl']) }}">{{ $smenu['MenuName'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li role="presentation"><a tabindex="-1" href="{{ site_url($mmenu['MenuUrl']) }}">{{ $mmenu['MenuName'] }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li role="presentation"><a href="#">{{ $bmenu['MenuName'] }}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>