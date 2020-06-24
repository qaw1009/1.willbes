<!-- Header -->
<div id="Header" class="NG c_both">
    <div class="widthAutoFull">
    @if($__cfg['SiteCode'] == config_item('app_intg_site_code'))
        {{-- 통합사이트 --}}
        <div class="Menu-List p_re">
            <div>
                <button type="button" class="home" onclick="document.location='{{ front_app_url('/home/index', 'www') }}';">
                    <span class="hidden">통합메인으로 이동</span>
                </button>
                <div class="logo">
                    <a href="{{ front_app_url('/home/index', 'www') }}"><img src="{{ img_url('m/main/logo.png') }}"></a>
                </div>
                <button type="button" class="mypage Menu_open" data-navi="mypage">
                    <span class="hidden">내강의실</span>
                </button>
                <ul class="myLog tx-black NG">
                    @if(strpos(strtoupper(current_url()), '/MEMBER/JOIN') === false)
                        @if(sess_data('is_login') === true)
                            <li class="Login">
                                <a class="Tit" href="{{ front_app_url('/member/logout/', 'www') }}">로그아웃</a>
                            </li>
                        @else
                            <li class="joinUs">
                                <a class="Tit" href="{{ app_url('/member/join/?ismobile=1&sitecode='.config_app('SiteCode'), 'www') }}">회원가입</a>
                                <span class="row-line">|</span>
                            </li>
                            <li class="Login">
                                <a class="Tit" href="{{ app_url('/member/login/?rtnUrl='.rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www') }}">로그인</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    @else
        {{-- 개별사이트 --}}
        <div id="Header" class="NG c_both">
            <div class="widthAutoFull">
                {{-- 네비게이션영역 --}}
                <div class="Menu-List p_re">
                    <div class="main">
                        <button type="button" class="menubar Menu_open" data-navi="menubar">
                            <span class="hidden">사이트메뉴</span>
                        </button>
                        <button type="button" class="mypage Menu_open" data-navi="mypage">
                            <span class="hidden">내강의실</span>
                        </button>
                        <div class="logo">
                            @if(array_has($__cfg['SiteMenu'], 'TreeMenu.GNB') === true)
                                <a href="{{ array_get($__cfg['SiteMenu'], 'TreeMenu.GNB.MenuUrl', '#none') }}" class="siteTitle NSK-Black">
                                    {{ array_get($__cfg['SiteMenu'], 'TreeMenu.GNB.MenuName', '') }}
                                </a>
                            @else
                                <a href="{{ front_url('/home/index', false, true) }}" class="siteTitle NSK-Black">
                                    {{ get_var(element('SiteNickName', $__cfg), str_replace_array(['윌비스', '온라인', ' '], '', $__cfg['HeadTitle'])) }}
                                </a>
                            @endif
                        </div>
                        <button type="button" class="basket" onclick="document.location='{{ front_url('/cart/index') }}';">
                            <span class="hidden">장바구니</span>
                        </button>
                    </div>
                </div>

                {{-- GNB메뉴영역 --}}
                @if(empty($__cfg['SiteMenu']['TreeMenu']['GNB']['Children']) === false)
                    {{-- 모바일GNB (전체보기) 메뉴 설정 --}}
                    @include('willbes.m.layouts.mega_menu')
                    {{--// 모바일GNB (전체보기) 메뉴 설정 --}}

                    <div class="subMenuBox c_both">
                        <ul class="subMenu">
                        @foreach($__cfg['SiteMenu']['TreeMenu']['GNB']['Children'] as $menu_idx => $menu_row)
                            @php $_smenu_pl_perc = (($loop->index - 1) * 25) + 7; @endphp
                            <li class="sMenuList">
                                @if(empty($menu_row['MenuSubType']) === false)
                                    {{-- 모바일GNB (전체보기) 메뉴 --}}
                                    @hasSection('mega_menu_' . $menu_row['MenuSubType'])
                                        <a href="#none" class="moreMenu">{{ $menu_row['MenuName'] }}<span class="rowLine"></span></a>
                                        <div class="dropBox dropBox2">
                                            @yield('mega_menu_' . $menu_row['MenuSubType'])
                                        </div>
                                    @else
                                        {{-- 모바일GNB (전체보기) 메뉴 내용이 없을 경우 (장바구니와 같이 카테고리 코드가 없는 경우) --}}
                                        <a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}<span class="rowLine"></span></a>
                                    @endif
                                @else
                                    @if(isset($menu_row['Children']) === true)
                                        <a href="#none" class="moreMenu">{{ $menu_row['MenuName'] }}<span class="rowLine"></span></a>
                                        <div class="dropBox">
                                            <ul>
                                            @foreach($menu_row['Children'] as $child_menu_idx => $child_menu_row)
                                                <li style="padding-left: {{ $_smenu_pl_perc }}%"><a href="{{ $child_menu_row['MenuUrl'] }}" target="_{{ $child_menu_row['UrlTarget'] }}">{{ $child_menu_row['MenuName'] }}</a></li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        {{-- 자식메뉴가 없을 경우 --}}
                                        <a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}<span class="rowLine"></span></a>
                                    @endif
                                @endif
                            </li>
                        @endforeach
                        </ul>
                    </div>
                @else
                    <div class="c_both {{ $__cfg['IsPassSite'] === false ? 'mb10' : '' }}"></div>
                @endif

                {{-- 검색영역 --}}
                @if($__cfg['IsPassSite'] === false)
                <div class="searchBox">
                    <div>
                        <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                            <input type="hidden" id="unifiedSearch_cate" name="cate" value="{{$__cfg['CateCode']}}">
                            <input type="search" id="unifiedSearch_text" name="searchfull_text" data-form="unifiedSearch_form" class="unifiedSearch" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                            <label for="search"><button type="button" id="btn_unifiedSearch" data-form="unifiedSearch_form" class="btn_unifiedSearch" title="검색">검색</button></label>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    @endif
    </div>
</div>
