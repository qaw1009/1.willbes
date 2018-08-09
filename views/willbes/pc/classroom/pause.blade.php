@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.www_menu')
        <div class="Depth">
            <img src="{{ img_url('sub/icon_home.gif') }}">
            <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>온라인강좌</strong>
            <span class="depth-Arrow">></span><strong>일시정지강좌</strong>
        </span>
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-ONLINEZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 일시정지강좌
                </div>
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif ">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">일시정지강좌</div>
                                <div class="Txt">
                                    - '일시정지해제'버튼을 클릭하시면 일시정지 상태가 해제되어 즉시 수강하실 수 있습니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-ONLINEZONE -->

            <div class="willbes-Mypage-Tabs mt60">
                <form method='get' action="{{site_url('/Classroom/Lecture/standby')}}">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                        <select id="process" name="process" title="process" class="seleProcess">
                            <option selected="selected">과정</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                        <select id="lec" name="lec" title="lec" class="seleLec">
                            <option selected="selected">과목</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                        <select id="Prof" name="Prof" title="Prof" class="seleProf">
                            <option selected="selected">교수님</option>
                            <option value="정채영">정채영</option>
                            <option value="기미진">기미진</option>
                            <option value="김세령">김세령</option>
                        </select>
                        <select id="Laststudy" name="Laststudy" title="Laststudy" class="seleStudy">
                            <option selected="selected">최종학습일순</option>
                            <option value="최근추가순">최근추가순</option>
                            <option value="종료임박순">종료임박순</option>
                        </select>
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="DetailWrap c_both">
                    <ul class="tabWrap tabDepthPass">
                        <li><a href="#Mypagetab1" class="on">단강좌 ({{count($lecList)}})</a></li>
                        <li><a href="#Mypagetab2">패키지강좌 ({{count($pkgList)}})</a></li>
                    </ul>
                    <div class="tabBox">
                        <div id="Mypagetab1" class="tabLink">
                            <div class="willbes-Lec-Table pt40 NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 820px;">
                                        <col style="width: 120px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $lecList as $row )
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        영어<span class="row-line">|</span>
                                                        한덕현교수님
                                                        <span class="NSK ml15 nBox n2">진행중</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="#none"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        영어<span class="row-line">|</span>
                                                        한덕현교수님
                                                        <span class="NSK ml15 nBox n2">진행중</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="#none"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="Mypagetab2" class="tabLink">
                            <div class="willbes-Lec-Table pt40 NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 820px;">
                                        <col style="width: 120px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $pkgList as $row )
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        영어<span class="row-line">|</span>
                                                        한덕현교수님
                                                        <span class="NSK ml15 nBox n4">완강</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지222</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="#none"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        영어<span class="row-line">|</span>
                                                        한덕현교수님
                                                        <span class="NSK ml15 nBox n2">진행중</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지333</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="#none"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-Mypage-Tabs -->

        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop