<div class="col-md-12 top_col">
    <div class="row main_top_header lms">
        <div class="col-md-12 mt-10">
            <div class="col-md-4 logo">
                <img src="https://static.willbes.net/public/images/btob/{{ sess_data('btob.btob_id') }}_logo.png" alt="BtoB 로고" class="ml-15">
                <img src="/public/img/logo.png" alt="윌비스 로고" class="ml-20"/>
            </div>
            <div class="col-md-5">
            </div>
            <div class="col-md-3 nav_login">
                <div class="pull-right">
                    <div class="pull-left mr-20 mt-5">
                        {{ date('Y.m.d') }}
                        <span class="block ml-5 mr-5">|</span>
                        <a href="#" class="btn-btob-admin-modify">{{ sess_data('btob.admin_name') }} <span class="blue">[{{ $__auth['Role']['RoleName'] }}]</span></a>
                    </div>
                    <div class="pull-left mr-15 mt-5">
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation"><a href="{{ site_url($__cfg['home_url']) }}" class="no-padding"><i class="fa fa-lg fa-home dark-blue"></i></a>
                        </ul>
                    </div>
                    <div class="pull-left">
                        <a href="{{ site_url('/auth/login/logout') }}"><button class="btn btn-success btn-sm mr-15">로그아웃</button></a>
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
                    <a href="{{ site_url($__cfg['home_url']) }}" class="cs-pointer">메인</a>
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
