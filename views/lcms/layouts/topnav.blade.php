<div class="col-md-12 top_col">
    <div class="row main_top_header {{ APP_NAME }}">
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
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ $menu['MenuUrl'] }}" class="dark-blue">{{ $menu['MenuName'] }}</a></li>
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
            <ul class="nav nav-tabs bar_tabs pl-10">
                <li role="presentation">
                    <a href="{{ site_url(get_var(element('home_url', $__settings), $__cfg['home_url'])) }}" class="cs-pointer">메인</a>
                </li>
                @if(isset($__menu['GNB']) === true)
                    @foreach($__menu['GNB'] as $bmenu)
                        @php
                            $css_right_menu = $loop->count > 15 && $loop->remaining <= 2 ? 'right-menu' : '';
                        @endphp

                        @if(isset($bmenu['Children']) === true)
                            <li role="presentation" class="dropdown">
                                <a id="{{ $bmenu['TreeNum'] }}" href="#">
                                    {{ $bmenu['MenuName'] }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($bmenu['Children'] as $midx => $mmenu)
                                        @if(isset($mmenu['Children']) === true)
                                            <li role="presentation" class="dropdown-submenu">
                                                <a id="{{ $mmenu['TreeNum'] }}" href="#">{{ $mmenu['MenuName'] }}</a>
                                                <ul class="dropdown-menu animated fadeIn {{ $css_right_menu }}">
                                                    @foreach($mmenu['Children'] as $sidx => $smenu)
                                                        <li role="presentation"><a tabindex="-1" href="{{ site_url($smenu['MenuUrl']) }}" target="_{{ $smenu['UrlTarget'] }}" class="{{ isset($__menu['CURRENT']['MenuIdx']) && $sidx == $__menu['CURRENT']['MenuIdx'] ? 'current' : '' }}">{{ $smenu['MenuName'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li role="presentation"><a tabindex="-1" href="{{ site_url($mmenu['MenuUrl']) }}" target="_{{ $mmenu['UrlTarget'] }}" class="{{ isset($__menu['CURRENT']['MenuIdx']) && $midx == $__menu['CURRENT']['MenuIdx'] ? 'current' : '' }}">{{ $mmenu['MenuName'] }}</a></li>
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
