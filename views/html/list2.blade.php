@extends('html.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li>
                    <a href="#none">패키지</a>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="/public/img/front/sub/icon_home.gif"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>패키지</strong></span>
        <span class="2depth"><span class="depth-Arrow">></span><strong>선택패키지</strong></span>
    </div>
    <div class="Content p_re">
        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li><a href="#none">전체</a></li>
                <li class="on"><a href="#none">이론과정</a></li>
                <li><a href="#none">심화과정</a></li>
                <li><a href="#none">문제풀이</a></li>
                <li><a href="#none">특강</a></li>
            </ul>
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable">
                    <colgroup>
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="tx-gray">대비년도</th>
                            <td colspan="8" class="tx-left">
                                <span>
                                    <input type="radio" id="YEAR_SAVE_ALL" name="YEAR_SAVE_ALL" class="iptSave">
                                    <label for="YEAR_SAVE_ALL" class="yearSave">전체</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2019" name="YEAR_SAVE_2019" class="iptSave">
                                    <label for="YEAR_SAVE_2019" class="yearSave">2019년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2018" name="YEAR_SAVE_2018" class="iptSave">
                                    <label for="YEAR_SAVE_2018" class="yearSave">2018년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2017" name="YEAR_SAVE_2017" class="iptSave">
                                    <label for="YEAR_SAVE_2017" class="yearSave">2017년</label>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Bnr">
            <img src="/public/img/front/sample/bnr1.jpg">
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Lec-Search">
            <div class="inputBox p_re">
                <label for="SEARCH" class="labelSearch" style="display: block;">강의명</label>
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>
            <div class="InfoBtn"><a href="#none">수강신청안내 <span>▶</span></a></div>
        </div>

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">선택패키지</div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table d_block">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 95px;">
                        <col style="width: 665px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list bg-light-white">이론</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2017 9급 공무원 이론 선택형 종합 패키지 - 30일완성</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>패키지상세정보</strong></dt>
                                    <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                                <div class="priceWrap">
                                    <span class="price tx-blue">190,000원</span>
                                    <span class="discount">(↓70%)</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td class="w-list bg-light-white">이론</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2017 9급 공무원 이론 선택형 종합 패키지 - 60%할인</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>패키지상세정보</strong></dt>
                                    <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                                <div class="priceWrap">
                                    <span class="price tx-blue">280,000원</span>
                                    <span class="discount">(↓60%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div>
            <!-- TopBtn-->
        </div>
        <!-- willbes-Lec -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">추천패키지</div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table d_block">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 95px;">
                        <col style="width: 665px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list bg-light-white">이론</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>패키지상세정보</strong></dt>
                                    <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                        <span class="nBox n3">예정</span>
                                        <span class="nBox n4">완강</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                                <div class="priceWrap">
                                    <span class="price tx-blue">156,000원</span>
                                    <span class="discount">(↓40%)</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td class="w-list bg-light-white">문제풀이</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>패키지상세정보</strong></dt>
                                    <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n4">완강</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                                <div class="priceWrap">
                                    <span class="price tx-blue">72,000원</span>
                                    <span class="discount">(↓60%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div>
            <!-- TopBtn-->
        </div>
        <!-- willbes-Lec -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="/public/img/front/sample/banner_180605.jpg">     
    </div>
</div>
<!-- End Container -->
@stop