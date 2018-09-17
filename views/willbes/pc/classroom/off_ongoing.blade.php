@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-ACADZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 수강신청강좌
                </div>
            </div>
            <!-- willbes-Mypage-ACADZONE -->

            <div class="willbes-Leclist c_both">
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
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="willbes-Lec-Table NG d_block c_both">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                        <colgroup>
                            <col style="width: 510px;">
                            <col style="width: 160px;">
                            <col style="width: 150px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="w-data tx-left pl10">
                                <dl class="w-info">
                                    <dt>
                                        영어<span class="row-line">|</span>
                                        한덕현교수님
                                        <span class="NSK ml15 nBox n2">접수중</span>
                                    </dt>
                                </dl><br/>
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                            </td>
                            <td class="w-period">2018.10.20 ~ 2018.11.20</td>
                            <td class="w-schedule">
                                월 ~ 금<br/>
                                10회차
                            </td>
                            <td class="w-answer">
                                2018.00.00<br/>
                                개강
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left pl10">
                                <dl class="w-info">
                                    <dt>
                                        영어<span class="row-line">|</span>
                                        한덕현교수님
                                        <span class="NSK ml15 nBox n2">접수중</span>
                                    </dt>
                                </dl><br/>
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                            </td>
                            <td class="w-period">2018.10.20 ~ 2018.11.20</td>
                            <td class="w-schedule">
                                월,화,금<br/>
                                8회차
                            </td>
                            <td class="w-answer">
                                2018.00.00<br/>
                                개강
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left pl10">
                                <dl class="w-info">
                                    <dt>
                                        영어<span class="row-line">|</span>
                                        한덕현교수님
                                        <span class="NSK ml15 nBox n4">마감</span>
                                    </dt>
                                </dl><br/>
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                            </td>
                            <td class="w-period">2018.10.20 ~ 2018.11.20</td>
                            <td class="w-schedule">
                                화,금<br/>
                                8회차
                            </td>
                            <td class="w-answer">
                                <a href="#none"><span class="bBox blueBox NSK">보강동영상</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="tx-center">수강신청 강좌 정보가 없습니다.</td>
                        </tr>
                        </tbody>
                    </table>
                    <!--
                    <div class="Paging">
                        <ul>
                            <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                            <li><a href="#none">2</a><span class="row-line">|</span></li>
                            <li><a href="#none">3</a><span class="row-line">|</span></li>
                            <li><a href="#none">4</a><span class="row-line">|</span></li>
                            <li><a href="#none">5</a><span class="row-line">|</span></li>
                            <li><a href="#none">6</a><span class="row-line">|</span></li>
                            <li><a href="#none">7</a><span class="row-line">|</span></li>
                            <li><a href="#none">8</a><span class="row-line">|</span></li>
                            <li><a href="#none">9</a><span class="row-line">|</span></li>
                            <li><a href="#none">10</a></li>
                            <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                        </ul>
                    </div>
                    -->
                </div>
            </div>
            <!-- willbes-Leclist -->

        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop