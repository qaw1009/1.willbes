@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-TESTZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 접수현황
                </div>
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                - 해당 모의고사명 클릭시 접수내역 확인 및 응시표를 출력할 수 있습니다.(단, 환불 완료된 모의고사는 응시표 출력불가능)<br/>
                                - 접수상태가 '결제대기'인 경우 해당 모의고사명 클릭시 결제(접수)하기가 가능합니다.<br/>
                                - 온라인 모의고사(응시형태가 Online인 경우)는 내강의실 > 모의고사관리 > 온라인 모의고사 응시메뉴에서 응시해 주시기 바랍니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-TESTZONE -->

            <div class="willbes-Leclist c_both mt60">
                <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    → 총 <a class="num tx-light-blue strong" href="#none">4</a>건
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                    <div class="willbes-Lec-Search GM f_right">
                        <select id="route" name="route" title="route" class="seleRoute mr10 h30 f_left">
                            <option selected="selected">접수루트</option>
                            <option value="학원">학원</option>
                            <option value="온라인">온라인</option>
                        </select>
                        <select id="state" name="state" title="state" class="seleState mr10 h30 f_left">
                            <option selected="selected">접수상태</option>
                            <option value="결제완료">결제완료</option>
                            <option value="결제대기">결제대기</option>
                            <option value="환불완료">환불완료</option>
                            <option value="접수마감">접수마감</option>
                        </select>
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </span>
                </div>
                <div class="LeclistTable pointTable">
                    <table cellspacing="0" cellpadding="0" class="listTable testTable under-gray bdt-gray tx-gray">
                        <colgroup>
                            <col style="width: 60px;">
                            <col style="width: 70px;">
                            <col style="width: 90px;">
                            <col style="width: 80px;">
                            <col style="width: 100px;">
                            <col style="width: 210px;">
                            <col style="width: 90px;">
                            <col style="width: 120px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>응시분야<span class="row-line">|</span></li></th>
                            <th>응시형태<span class="row-line">|</span></li></th>
                            <th>시험응시일<span class="row-line">|</span></li></th>
                            <th>모의고사명<span class="row-line">|</span></li></th>
                            <th>접수루트<span class="row-line">|</span></li></th>
                            <th>접수일<span class="row-line">|</span></li></th>
                            <th>결제(접수)상태</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-no">8</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Off</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list"><a href="#none">7/2 전국모의고사-일방경찰</a></td>
                            <td class="w-route">학원</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-process">공무원</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Online</td>
                            <td class="w-date">2018-10-10~</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-route">학원</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state tx-blue">결제대기</td>
                        </tr>
                        <tr>
                            <td class="w-no">6</td>
                            <td class="w-process">임용</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-form">Off</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-route">온라인</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">환불완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Online</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-route">온라인</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state tx-red">접수마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">4</td>
                            <td class="w-process">임용</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-form">Off</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-route">온라인</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-process">공무원</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Online</td>
                            <td class="w-date">2018-10-10~</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-route">학원</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state tx-blue">결제대기</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-process">임용</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-form">Off</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-route">온라인</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">환불완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Online</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-route">온라인</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state tx-red">접수마감</td>
                        </tr>
                        </tbody>
                    </table>
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