@php
    // 네비게이션 설정에 따른 변수값 셋팅
    $_gnb_size = get_var(get_cookie('_wb_client_gnb_size'), 'md');
    $_gnb_img_size = $_gnb_size == 'md' ? '' : '_sm';
    $_gnb_open = $_gnb_size == 'md' ? 'Close' : 'Open';
    $_gnb_text = $_gnb_size == 'md' ? '숨김' : '열기';
    // 사이트설정 로고 이미지가 아닌 디자인 이미지 경로로 변경 (숨김 버튼 클릭시 이미지 경로가 초기화되기 때문에)
    //$_gnb_logo = $_gnb_size == 'md' ? $__cfg['Logo'] : str_replace('.', $_gnb_img_size . '.', $__cfg['Logo']);
    $_gnb_logo = $_gnb_size == 'md' ? img_url('gnb/logo.gif') : img_url('gnb/logo' . $_gnb_img_size . '.gif');
@endphp
<div id="Gnb" class="NGR Gnb-{{ $_gnb_size }}">
    <div class="toggle-Btn gnb-{{ $_gnb_open }}">
        <a href="#none">
            <div class="Txt c_both">{{ $_gnb_text }}</div><span class="arrow-Btn">></span>
        </a>
    </div>
    <div class="logo">
        <a href="{{ app_url('/', 'www') }}"><img src="{{ $_gnb_logo }}"></a>
    </div>

    @if(empty($__cfg['GNBMenu']['ActiveGroupMenuIdx']) === true)
        <!-- main slider -->
        {!! banner('네비게이션_Top', 'sliderGNB', config_item('app_intg_site_code'), '0') !!}
    @else
        <!-- gnb site menu -->
        <div class="topView">
            @php $menu_group_row = $__cfg['GNBMenu']['TreeMenu'][$__cfg['GNBMenu']['ActiveGroupMenuIdx']]; @endphp
            <h1>
                <img src="{{ img_url('gnb/icon_' . $menu_group_row['UrlSubDomain'] . '.gif') }}">{{ $menu_group_row['MenuName'] }}
            </h1>
            <h4>
                <ul>
                    @foreach($menu_group_row['Children'] as $menu_idx => $menu_row)
                        @if($menu_row['MenuType'] == 'GN')
                            @php $active_class = empty($__cfg['CateCode']) === false && strpos($menu_row['MenuUrl'], $__cfg['CateCode']) > -1 ? 'strong' : ''; @endphp
                            <li class="dropdown">
                                <a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}" class="{{ $active_class }}">{{ $menu_row['MenuName'] }}</a>
                                @if(isset($menu_row['Children']) === true)
                                    <div class="left-drop-Box">
                                        <ul>
                                            @foreach(element('Children', $menu_row) as $menu_child_idx => $menu_child_row)
                                                <li><a href="{{ $menu_child_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_child_row['MenuName'] }}</a></li>
                                            @endforeach
                                        </ul>
                                        {{--<div class="sliderViewWrap"></div>--}}
                                    </div>
                                @endif
                            </li>
                        @elseif($menu_row['MenuType'] == 'GA')
                            @php $active_class = $__cfg['IsPassSite'] === true ? 'strong' : ''; @endphp
                            <li class="Acad">
                                <a class="willbes-Acad-Tit {{ $active_class }}" href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}</a>                                
                                <dl class="sns-Btn">
                                    @if($__cfg['SiteGroupCode'] === '1001')
                                    <!--경찰--> 
                                    <dt>
                                        <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank">
                                            <img src="{{ img_url('gnb/icon_youtube.png') }}" title="유튜브">
                                        </a>
                                    </dt> 
                                    <dt>
                                        <a href="https://www.instagram.com/willbescop" target="_blank">
                                            <img src="{{ img_url('gnb/icon_Instagram.png') }}" title="인스타그램">
                                        </a>
                                    </dt>                                 
                                    <dt>
                                        <a href="https://tv.naver.com/willbescop" target="_blank">
                                            <img src="{{ img_url('gnb/icon_navertv.png') }}" title="네이버TV">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="http://blog.naver.com/PostList.nhn?blogId=willbes79&from=postList&categoryNo=65" target="_blank">
                                            <img src="{{ img_url('gnb/icon_blog.png') }}" title="블로그">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="https://www.facebook.com/willbescop" target="_blank">
                                            <img src="{{ img_url('gnb/icon_facebook.png') }}" title="페이스북">
                                        </a>
                                    </dt>                           
                                    @endif

                                    @if($__cfg['SiteGroupCode'] === '1002')
                                    <!--공무원-->
                                    <dt>
                                        <a href="https://www.youtube.com/channel/UCsNPdhwjR37qVtuePB599KQ" target="_blank">
                                            <img src="{{ img_url('gnb/icon_youtube.png') }}" title="유튜브">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="{{ site_url('/pass/promotion/index/cate/3048/code/1104') }}" target="_blank">
                                            <img src="{{ img_url('gnb/icon_kakao.png') }}" title="카카오톡">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="https://tv.naver.com/willbes79" target="_blank">
                                            <img src="{{ img_url('gnb/icon_navertv.png') }}" title="네이버TV">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="https://blog.naver.com/willbes79" target="_blank">
                                            <img src="{{ img_url('gnb/icon_blog.png') }}" title="블로그">
                                        </a>
                                    </dt>                                    
                                    <dt>
                                        <a href="https://www.facebook.com/willbesgosi" target="_blank">
                                            <img src="{{ img_url('gnb/icon_facebook.png') }}" title="페이스북">
                                        </a>
                                    </dt>                                   
                                    
                                    @endif
                                </dl>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </h4>
        </div>
        {{-- main sub menu slider (set html 방식, 배너사용안함) --}}
        {{--{!! banner('네비게이션_레이어', 'sliderView', config_item('app_intg_site_code'), '0', 'sliderViewWrap') !!}--}}
    @endif
    <!-- gnb menu -->
    <div class="gnb-List">
        @foreach($__cfg['GNBMenu']['TreeMenu'] as $menu_group_id => $menu_group_row)
            @if(is_numeric($menu_group_id) === true && $menu_group_id != $__cfg['GNBMenu']['ActiveGroupMenuIdx'])
                {{-- 일반메뉴이면서 접근 사이트와 다른 그룹메뉴만 노출 --}}
                <div class="gnb-List-Tit">
                    <a href="{{ $menu_group_row['MenuUrl'] }}" target="_{{ $menu_group_row['UrlTarget'] }}">
                        <div class="willbes-icon_sm">
                            <img src="{{ img_url('gnb/icon_' . $menu_group_row['UrlSubDomain'] . '_sm.gif') }}">
                        </div>
                        <span class="Txt">{{ $menu_group_row['MenuName'] }}<span class="arrow-Btn">></span></span>
                    </a>
                </div>
                <div class="gnb-List-Depth">
                    <dl>
                        @foreach(element('Children', $menu_group_row) as $menu_idx => $menu_row)
                            <dt class="{{ $menu_row['MenuType'] }}"><a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}</a></dt>
                        @endforeach
                    </dl>
                </div>
            @endif
        @endforeach
    </div>
    <!-- gnb site setting -->
    <ul class="gnb-List-Sub p_re">
        <li>
            <a class="setting" href="#none" onclick="openWin('SettingForm')">
                <img src="{{ img_url('gnb/icon_setting' . $_gnb_img_size . '.gif') }}">
                <div class="Txt">통합사이트<br/>환경설정</div>
            </a>
            <!-- willbes Setting -->
            <div id="SettingForm" class="Layer-Box" style="display: none">
                <a class="closeBtn" href="#none" onclick="closeWin('SettingForm')">
                    <img src="{{ img_url('gnb/close.png') }}">
                </a>
                <form id="setting_form" name="setting_form" method="POST" onsubmit="return false;">
                    <div class="Layer-Tit tx-dark-black bdb-black2 NSK">
                        윌비스 통합 <span class="tx-dark-blue">사이트 환경설정</span>
                    </div>
                    <div class="Layer-Login GM tx-left">
                        <div class="chkBox-Save">
                            <div class="tx-gray">
                                <strong>추후 접속 시 현재 페이지를</strong>
                            </div>
                            {{--<span>
                                <input type="checkbox" id="add_startpage" name="add_startpage" class="iptSave" onclick="">
                                <label for="add_startpage" class="labelSave tx-gray">시작페이지로</label>
                            </span>--}}
                            <span>
                                <input type="checkbox" id="add_favorite" name="add_favorite" class="iptSave" onclick="">
                                <label for="add_favorite" class="labelSave tx-gray">즐겨찾기로</label>
                            </span>
                        </div>
                        <div class="chkBox-Save">
                            <div class="tx-gray">
                                <strong>추후 접속 시 윌비스 통합 네비게이션 영역을</strong>
                            </div>
                            <span>
                                <input type="radio" id="fold_gnb" name="gnb_size" value="sm" class="iptSave"{!! $_gnb_size == 'sm' ? ' checked="checked"' : '' !!}>
                                <label for="fold_gnb" class="labelSave tx-gray">숨김</label>
                            </span>
                            <span>
                                <input type="radio" id="unfold_gnb" name="gnb_size" value="md" class="iptSave"{!! $_gnb_size == 'md' ? ' checked="checked"' : '' !!}>
                                <label for="unfold_gnb" class="labelSave tx-gray">펼침</label>
                            </span>
                        </div>
                    </div>
                    <div class="Layer-Btn NSK widthAuto320">
                        <span>
                            <button type="button" class="cf-Btn bg-dark-gray bd-gray" onclick="closeWin('SettingForm')">
                                <span>닫기</span>
                            </button>
                        </span>
                        <span>
                            <button type="button" name="btn_setting_apply" class="cf-Btn bg-blue bd-dark-blue">
                                <span>적용</span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- End willbes Setting -->
        </li>
        <li>
            <a class="intro" href="//{{app_to_env_url('www.willbes.net/company/')}}">
                <img src="{{ img_url('gnb/icon_intro' . $_gnb_img_size . '.gif') }}">
                <div class="Txt">윌비스<br/>회사소개</div>
            </a>
        </li>
    </ul>
</div>