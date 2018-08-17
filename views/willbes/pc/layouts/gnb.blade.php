<div id="Gnb" class="NSK Gnb-md">
    <div class="toggle-Btn gnb-Close">
        <a href="#none">
            <div class="Txt c_both">숨김</div><span class="arrow-Btn">></span>
        </a>
    </div>
    <div class="logo">
        <a href="{{ app_url('/', 'www') }}"><img src="{{ $__cfg['Logo'] }}" onerror="this.src='{{ img_url('gnb/logo.gif') }}'"></a>
    </div>

    @if(empty($__cfg['GNBMenu']['ActiveGroupMenuIdx']) === true)
        <!-- main slider -->
        <div class="sliderGNB bSlider">
            <div class="slider">
                <div><img src="{{ img_url('sample/gnb1.jpg') }}"></div>
                <div><img src="{{ img_url('sample/gnb2.jpg') }}"></div>
                <div><img src="{{ img_url('sample/gnb3.jpg') }}"></div>
                <div><img src="{{ img_url('sample/gnb4.jpg') }}"></div>
            </div>
        </div>
    @else
        <!-- gnb site menu -->
        <div class="topView">
            @php $menu_group_row = $__cfg['GNBMenu']['TreeMenu'][$__cfg['GNBMenu']['ActiveGroupMenuIdx']] @endphp
            <h1>
                <img src="{{ img_url('gnb/icon_' . $menu_group_row['UrlSubDomain'] . '.gif') }}">{{ $menu_group_row['MenuName'] }}
            </h1>
            <h4>
                <ul>
                    @foreach($menu_group_row['Children'] as $menu_idx => $menu_row)
                        @if($menu_row['MenuType'] == 'GN')
                            <li class="dropdown">
                                <a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}</a>
                                @if(isset($menu_row['Children']) === true)
                                    <div class="left-drop-Box">
                                        <ul>
                                            @foreach(element('Children', $menu_row) as $menu_child_idx => $menu_child_row)
                                                <li><a href="{{ $menu_child_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_child_row['MenuName'] }}</a></li>
                                            @endforeach
                                        </ul>
                                        <div class="sliderView bSlider">
                                            <div class="slider">
                                                <div><img src="{{ img_url('sample/gnb5.jpg') }}"></div>
                                                <div><img src="{{ img_url('sample/gnb6.jpg') }}"></div>
                                                <div><img src="{{ img_url('sample/gnb7.jpg') }}"></div>
                                                <div><img src="{{ img_url('sample/gnb8.jpg') }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @elseif($menu_row['MenuType'] == 'GA')
                            <li class="Acad">
                                <a class="willbes-Acad-Tit" href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}</a>
                                <dl class="sns-Btn">
                                    <dt>
                                        <a href="#none">
                                            <img src="{{ img_url('gnb/icon_facebook.gif') }}">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="#none">
                                            <img src="{{ img_url('gnb/icon_linkedin.gif') }}">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="#none">
                                            <img src="{{ img_url('gnb/icon_twitter.gif') }}">
                                        </a>
                                    </dt>
                                </dl>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </h4>
        </div>
    @endif
    <!-- gnb menu -->
    <div class="gnb-List">
        @foreach($__cfg['GNBMenu']['TreeMenu'] as $menu_group_id => $menu_group_row)
            @if(is_numeric($menu_group_id) === true)
                {{-- 예외메뉴 (미노출)이 아닐 경우만 노출 --}}
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
                            <dt><a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}</a></dt>
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
                <img src="{{ img_url('gnb/icon_setting.gif') }}">
                <div class="Txt">통합사이트<br/>환경설정</div>
            </a>
            <!-- willbes Setting -->
            <div id="SettingForm" class="Layer-Box" style="display: none">
                <a class="closeBtn" href="#none" onclick="closeWin('SettingForm')">
                    <img src="{{ img_url('gnb/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black bdb-black2 NSK">
                    윌비스 통합 <span class="tx-dark-blue">사이트 환경설정</span>
                </div>
                <div class="Layer-Login GM tx-left">
                    <div class="chkBox-Save">
                        <div class="tx-gray">
                            <strong>추후 접속 시 현재 페이지를</strong>
                        </div>
                        <span>
                            <input type="checkbox" id="PAGE_SAVE" name="PAGE_SAVE" class="iptSave">
                            <label for="PAGE_SAVE" class="labelSave tx-gray">시작페이지로</label>
                        </span>
                        <span>
                            <input type="checkbox" id="BOOKMARK_SAVE" name="BOOKMARK_SAVE" class="iptSave">
                            <label for="BOOKMARK_SAVE" class="labelSave tx-gray">즐겨찾기로</label>
                        </span>
                    </div>
                    <div class="chkBox-Save">
                        <div class="tx-gray">
                            <strong>추후 접속 시 윌비스 통합 네비게이션 영역을</strong>
                        </div>
                        <span>
                            <input type="radio" id="FOLD_SAVE" name="FOLD_SAVE" class="iptSave">
                            <label for="FOLD_SAVE" class="labelSave tx-gray">숨김</label>
                        </span>
                        <span>
                            <input type="radio" id="UNFOLD_SAVE" name="UNFOLD_SAVE" class="iptSave">
                            <label for="UNFOLD_SAVE" class="labelSave tx-gray">펼침</label>
                        </span>
                    </div>
                </div>
                <div class="Layer-Btn NSK widthAuto320">
                    <span>
                        <button type="submit" onclick="" class="cf-Btn bg-dark-gray bd-gray">
                            <span>닫기</span>
                        </button>
                    </span>
                    <span>
                        <button type="submit" onclick="" class="cf-Btn bg-blue bd-dark-blue">
                            <span>적용</span>
                        </button>
                    </span>
                </div>
            </div>
            <!-- End willbes Setting -->
        </li>
        <li>
            <a class="intro" href="#none">
                <img src="{{ img_url('gnb/icon_intro.gif') }}">
                <div class="Txt">윌비스<br/>회사소개</div>
            </a>
        </li>
    </ul>
</div>