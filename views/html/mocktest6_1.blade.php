@extends('willbes.pc.layouts.master')

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
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>수험정보</strong>
            <span class="depth-Arrow">></span><strong>모의고사</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mocktest INFOZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 모의고사
            </div>
        </div>
        <!-- "willbes-Mocktest INFOZONE -->

        <div class="willbes-Mypage-Tabs mt10">
            <ul class="tabMock three">
                <li><a class="on" href="#none">모의고사안내</a></li>
                <li><a href="{{ site_url('/home/html/mocktest6_2') }}">모의고사접수</a></li>
                <li><a href="{{ site_url('/home/html/mocktest6_3') }}">이의제기/정오표</a></li>
            </ul>
            <div class="willbes-Cart-Txt NG mt30 p_re">
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                · 모의고사 접수 프로세스<br/>
                                &nbsp; 접수할 모의고사명 클릭 → 접수 정보 입력 → 접수하기(결제대기) →  결제하기 → 결제완료 → 응시표 출력(해당 모의고사명 클릭)<br/>
                                · 나의 모의고사 접수현황은 내강의실 > 모의고사관리 > 접수현황에서 확인 가능합니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>

            <div class="mt10">
                <img src="{{ img_url('sub/mocktest_cop.jpg') }}" alt="경찰 통합목의고사">
                <img src="{{ img_url('sub/mocktest_gosi.jpg') }}" alt="공무원 통합목의고사">
            </div>

            <div class="willbes-Leclist c_both mt50">
                <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
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
                    </span>
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </span>
                </div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable mockTable under-gray bdt-gray tx-gray">
                        <colgroup>
                            <col style="width: 40px;">
                            <col style="width: 80px;">
                            <col style="width: 70px;">
                            <col style="width: 130px;">
                            <col style="width: 230px;">
                            <col style="width: 70px;">
                            <col style="width: 130px;">
                            <col style="width: 80px;">
                            <col style="width: 110px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></li></th>
                                <th>응시분야<span class="row-line">|</span></li></th>
                                <th>응시형태<span class="row-line">|</span></li></th>
                                <th>시험응시일<span class="row-line">|</span></li></th>
                                <th>모의고사명<span class="row-line">|</span></li></th>
                                <th>응시료<span class="row-line">|</span></li></th>
                                <th>접수기간<span class="row-line">|</span></li></th>
                                <th>진행상태<span class="row-line">|</span></li></th>
                                <th>나의 접수상태</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-no">8</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-form">Off</td>
                                <td class="w-date">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-list tx-left pl15"><a href="#none">7/2 전국모의고사-일방경찰</a></td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state">진행중</td>
                                <td class="w-user-state">미접수</td>
                            </tr>
                            <tr>
                                <td class="w-no">7</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-form">Online</td>
                                <td class="w-date">2018-10-10~</td>
                                <td class="w-list tx-left pl15">8/13 빅매지2-경행경채 모의고사</td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state tx-red">접수마감</td>
                                <td class="w-user-state tx-blue">결제대기</td>
                            </tr>
                            <tr>
                                <td class="w-no">6</td>
                                <td class="w-type">경행경채</td>
                                <td class="w-form">Off</td>
                                <td class="w-date">상시</td>
                                <td class="w-list tx-left pl15">7/2 전국모의고사-일방경찰</td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state">진행중</td>
                                <td class="w-user-state">결제완료</td>
                            </tr>
                            <tr>
                                <td class="w-no">5</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-form">Online</td>
                                <td class="w-date">2018-10-10</td>
                                <td class="w-list tx-left pl15">7/2 전국모의고사-일방경찰</td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state">진행중</td>
                                <td class="w-user-state tx-blue">결제대기</td>
                            </tr>
                            <tr>
                                <td class="w-no">4</td>
                                <td class="w-type">경행경채</td>
                                <td class="w-form">Off</td>
                                <td class="w-date">상시</td>
                                <td class="w-list tx-left pl15">7/2 전국모의고사-일방경찰</td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state tx-red">접수마감</td>
                                <td class="w-user-state">결제완료</td>
                            </tr>
                            <tr>
                                <td class="w-no">3</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-form">Online</td>
                                <td class="w-date">2018-10-10~</td>
                                <td class="w-list tx-left pl15">8/13 빅매지2-경행경채 모의고사</td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state tx-red">접수마감</td>
                                <td class="w-user-state">결제완료</td>
                            </tr>
                            <tr>
                                <td class="w-no">2</td>
                                <td class="w-type">경행경채</td>
                                <td class="w-form">Off</td>
                                <td class="w-date">상시</td>
                                <td class="w-list tx-left pl15">7/2 전국모의고사-일방경찰</td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state">진행중</td>
                                <td class="w-user-state">미접수</td>
                            </tr>
                            <tr>
                                <td class="w-no">1</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-form">Online</td>
                                <td class="w-date">2018-10-10</td>
                                <td class="w-list tx-left pl15">7/2 전국모의고사-일방경찰</td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state">진행중</td>
                                <td class="w-user-state tx-blue">결제대기</td>
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
        </div>
        <!-- willbes-Mypage-Tabs -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop