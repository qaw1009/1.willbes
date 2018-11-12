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
                <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사안내</a></li>
                <li><a href="{{ site_url('/home/html/mocktest6_2') }}">모의고사접수</a></li>
                <li><a class="on" href="#none">이의제기/정오표</a></li>
            </ul>
            <div class="willbes-Cart-Txt NG mt30 p_re">
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                · 응시중인 모의고사만 이의제기 등록이 가능합니다.(단, 내가 응시한 모의고사만 이의제기 등록 가능)<br/>
                                · 응시기간 종료시 이의제기 등록이 불가능합니다.<br/>
                                · 이의제기 및 정오표 보기는 응시기간과 무관하게 확인할 수 있습니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div class="willbes-Leclist c_both mt60">
                <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
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
                            <col style="width: 50px;">
                            <col style="width: 80px;">
                            <col style="width: 570px;">
                            <col style="width: 70px;">
                            <col style="width: 70px;">
                            <col style="width: 100px;">
                        </colgroup>
                        <thead>
                            <tr class="two">
                                <th rowspan="2">No<span class="row-line">|</span></li></th>
                                <th rowspan="2">응시분야<span class="row-line">|</span></li></th>
                                <th rowspan="2">모의고사명<span class="row-line">|</span></li></th>
                                <th class="bd-none" colspan="2">이의제기</li></th>
                                <th rowspan="2"><span class="row-line" style="float: left;">|</span>정오표보기</th>
                            </tr>
                            <tr class="two">
                                <th>보기<span class="row-line">|</span></li></th>
                                <th>등록</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-no">8</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-list tx-left pl20">7/5 전국모의고사-일방경찰</td>
                                <td class="w-test"><a class="tx-light-blue" href="{{ site_url('/home/html/mocktest6_3_1') }}">9개</a></td>
                                <td class="w-state"><a href="#none">[등록]</a></td>
                                <td class="w-graph"><a class="tx-light-blue" href="{{ site_url('/home/html/mocktest6_3_2') }}">8개</a></td>
                            </tr>
                            <tr>
                                <td class="w-no">7</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-list tx-left pl20">7/2 전국모의고사-일방경찰</td>
                                <td class="w-test"><a class="tx-light-blue" href="#none">1개</a></td>
                                <td class="w-state"><a href="#none">[등록]</a></td>
                                <td class="w-graph"><a class="tx-light-blue" href="#none">7개</a></td>
                            </tr>
                            <tr>
                                <td class="w-no">6</td>
                                <td class="w-type">경행경채</td>
                                <td class="w-list tx-left pl20">8/13 빅매지2-경행경채 모의고사</td>
                                <td class="w-test"><a class="tx-light-blue" href="#none">2개</a></td>
                                <td class="w-state"><a href="#none">[등록]</a></td>
                                <td class="w-graph"><a class="tx-light-blue" href="#none">6개</a></td>
                            </tr>
                            <tr>
                                <td class="w-no">5</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-list tx-left pl20">8/13 빅매지2-경행경채 모의고사</td>
                                <td class="w-test"><a class="tx-light-blue" href="#none">3개</a></td>
                                <td class="w-state"><a href="#none">[등록]</a></td>
                                <td class="w-graph"><a class="tx-light-blue" href="#none">5개</a></td>
                            </tr>
                            <tr>
                                <td class="w-no">4</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-list tx-left pl20">7/2 전국모의고사-일방경찰</td>
                                <td class="w-test"><a class="tx-light-blue" href="#none">9개</a></td>
                                <td class="w-state"><a href="#none">[등록]</a></td>
                                <td class="w-graph"><a class="tx-light-blue" href="#none">4개</a></td>
                            </tr>
                            <tr>
                                <td class="w-no">3</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-list tx-left pl20">8/13 빅매지2-경행경채 모의고사</td>
                                <td class="w-test"><a class="tx-light-blue" href="#none">9개</a></td>
                                <td class="w-state"><a href="#none">[등록]</a></td>
                                <td class="w-graph"><a class="tx-light-blue" href="#none">3개</a></td>
                            </tr>
                            <tr>
                                <td class="w-no">2</td>
                                <td class="w-type">경행경채</td>
                                <td class="w-list tx-left pl20">8/13 빅매지2-경행경채 모의고사</td>
                                <td class="w-test"><a class="tx-light-blue" href="#none">9개</a></td>
                                <td class="w-state"><a href="#none">[등록]</a></td>
                                <td class="w-graph"><a class="tx-light-blue" href="#none">2개</a></td>
                            </tr>
                            <tr>
                                <td class="w-no">1</td>
                                <td class="w-type">경행경채</td>
                                <td class="w-list tx-left pl20">7/5 전국모의고사-일방경찰</td>
                                <td class="w-test"><a class="tx-light-blue" href="#none">9개</a></td>
                                <td class="w-state"><a href="#none">[등록]</a></td>
                                <td class="w-graph"><a class="tx-light-blue" href="#none">0개</a></td>
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