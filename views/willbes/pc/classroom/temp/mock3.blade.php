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
                    · 성적결과
                </div>
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                - 내강의실 > 모의고사관리 > 온라인모의고사 응시메뉴에서 정답제출을 처리한 모의고사의 성적 결과만 확인 가능합니다.<br/>
                                - 성적결과는 오프라인 시험응시일이 마감된 이후 3~5일 안에 제공됩니다.<br/>
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
                            <col style="width: 120px;">
                            <col style="width: 280px;">
                            <col style="width: 70px;">
                            <col style="width: 70px;">
                            <col style="width: 85px;">
                            <col style="width: 95px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>응시분야<span class="row-line">|</span></li></th>
                            <th>나의응시일<span class="row-line">|</span></li></th>
                            <th>모의고사명<span class="row-line">|</span></li></th>
                            <th>총점<span class="row-line">|</span></li></th>
                            <th>평균<span class="row-line">|</span></li></th>
                            <th>성적표<span class="row-line">|</span></li></th>
                            <th>부록</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-no">8</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list"><a href="#none" onclick="openWin('MEMOPASS')">7/2 전국모의고사-일방경찰</a></td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">60</td>
                            <td class="w-report">집계중</td>
                            <td class="w-file">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-process">공무원</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-date">2018-10-10~</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">60</td>
                            <td class="w-report tx-red"><a href="#none">성적확인</a></td>
                            <td class="w-file on tx-blue">
                                <a href="#none">[문제/해설]</a><br/>
                                <a href="#none">[오답노트]</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-no">6</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">50</td>
                            <td class="w-report tx-red">성적확인</td>
                            <td class="w-file on tx-blue">
                                <a href="#none">[문제/해설]</a><br/>
                                <a href="#none">[오답노트]</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">40</td>
                            <td class="w-report tx-red">성적확인</td>
                            <td class="w-file">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">4</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">90</td>
                            <td class="w-report tx-red">성적확인</td>
                            <td class="w-file">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">60</td>
                            <td class="w-report tx-red">성적확인</td>
                            <td class="w-file">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">50</td>
                            <td class="w-report tx-red">성적확인</td>
                            <td class="w-file">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">40</td>
                            <td class="w-report tx-red">성적확인</td>
                            <td class="w-file">&nbsp;</td>
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