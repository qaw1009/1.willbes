<!-- aside -->
<div id="aside">
    <div class="asideBox">
        {{-- LNB 메뉴영역 --}}
        <div id="navi_menubar" class="navi d_none">
            @if($__cfg['SiteCode'] != config_item('app_intg_site_code'))
                <h2 class="NGEB">
                    <img src="{{ img_url('m/main/icon_' . $__cfg['SiteGroupId'] . '.png') }}" class="clogo">
                    {{ get_var(element('SiteNickName', $__cfg), str_replace_array(['윌비스', '온라인', ' '], '', $__cfg['HeadTitle'])) }}
                </h2>
                <ul class="NGEB">
                @if(empty($__cfg['SiteMenu']['TreeMenu']['LNB']) === false)
                    @foreach($__cfg['SiteMenu']['TreeMenu']['LNB'] as $menu_idx => $menu_row)
                        @if(isset($menu_row['Children']) === true)
                            <li class="ListTit">
                                <h1 class="NGEB">
                                    {{ $menu_row['MenuName'] }}
                                    @if(empty($menu_row['MenuIcon']) === false)<img src="{{$menu_row['MenuIcon']}}">@endif
                                </h1>
                            </li>

                            @foreach($menu_row['Children'] as $child_menu_idx => $child_menu_row)
                                <li class="ListBox">
                                    <div class="List">
                                        <a href="{{ $child_menu_row['MenuUrl'] }}" target="_{{ $child_menu_row['UrlTarget'] }}">{{ $child_menu_row['MenuName'] }}</a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            {{-- 자식메뉴가 없을 경우 --}}
                            <li class="ListBox">
                                <div class="List">
                                    <a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}</a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endif
                </ul>
            @endif
        </div>

        {{-- 내강의실 메뉴영역 --}}
        <div id="navi_mypage" class="navi d_none">
            <ul class="NGEB">
                <li class="ListTit"><h1 class="NGEB">내강의실</h1></li>
                @if(sess_data('is_login') == true && empty(sess_data('mem_ssamid')) == false)
                    <li class="ListBox">
                        <div class="List NGEB"><a href="{{ front_app_url('/classroom/home/gotoSsam/', 'www', false, true) }}" target="_blank">이전 내강의실 보기</a></div>
                    </li>
                @endif
                @if(sess_data('mem_interest') != '718009')
                {{-- 임용관련 메뉴 안보이게하기 --}}
                <li class="ListBox">
                    <div class="List NGEB"><a href="{{ front_app_url('/classroom/pass/index', 'www', false, true) }}">무한 PASS존</a></div>
                </li>
                @endif
                <li class="ListBox">
                    <div class="List NGEB">온라인강좌</div>
                    <div class="List-Depth">
                        <ul>
                            <li><a href="{{ front_app_url('/classroom/on/list/standby', 'www', false, true) }}">· 수강대기 강좌</a></li>
                            <li><a href="{{ front_app_url('/classroom/on/list/ongoing', 'www', false, true) }}">· 수강중인 강좌</a></li>
                            <li><a href="{{ front_app_url('/classroom/on/list/pause', 'www', false, true) }}">· 일시정지 강좌</a></li>
                            <li><a href="{{ front_app_url('/classroom/on/list/end', 'www', false, true) }}">· 수강종료 강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li class="ListBox">
                    <div class="List NGEB">학원강좌</div>
                    <div class="List-Depth">
                        <ul>
                            <li><a href="{{ front_app_url('/classroom/off/list/ongoing', 'www', false, true) }}">· 수강신청 강좌</a></li>
                            <li><a href="{{ front_app_url('/classroom/off/list/end', 'www', false, true) }}">· 수강종료 강좌</a></li>
                            <li><a href="{{ front_app_url('/classroom/on/bogang', 'www', false, true) }}">· 보강/복습동영상</a></li>
                        </ul>
                    </div>
                </li>
                <li class="ListBox">
                    <div class="List NGEB"><a href="{{ front_app_url('/classroom/order/index', 'www', false, true) }}">주문/배송조회</a></div>
                </li>
                <li class="ListBox">
                    <div class="List NGEB"><a href="{{ front_app_url('/classroom/point/index', 'www', false, true) }}">포인트 관리</a></div>
                </li>
                <li class="ListBox">
                    <div class="List NGEB"><a href="{{ front_app_url('/classroom/coupon/index', 'www', false, true) }}">쿠폰/수강권 관리</a></div>
                </li>
                <li class="ListBox">
                    <div class="Depth">
                        <ul>
                            <li><a href="{{ front_cate_url('/support/notice/index', 's_cate_code') }}">· 공지사항</a></li>
                            <li><a href="{{ front_cate_url('/support/faq/index') }}">· FAQ</a></li>
                            <li><a href="{{ front_cate_url('/support/qna/index', 's_cate_code') }}">· {{ $__cfg['SiteGroupCode'] == '1011' ? '동영상 상담실' : '1:1 상담' }}</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        {{-- 우측 공통영역 --}}
        <div class="rMenu">
            <ul>
                <li><a href="#none" class="Menu_close"><span class="hidden">닫기</span></a></li>
                <li><a href="{{ front_app_url('/home/index', 'www', false, true) }}">윌비스홈</a></li>
                @if(strpos(strtoupper(current_url()), '/MEMBER/JOIN') === false)
                    @if(sess_data('is_login') === true)
                        <li><a href="{{ front_app_url('/member/logout/', 'www', false, true) }}">로그아웃</a></li>
                    @else
                        <li><a href="{{ app_url('/member/login/?rtnUrl='.rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www') }}" class="tx-red">로그인</a></li>
                        <li><a href="{{ app_url('/member/join/?ismobile=1&sitecode='.config_app('SiteCode'), 'www') }}">회원가입</a></li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
