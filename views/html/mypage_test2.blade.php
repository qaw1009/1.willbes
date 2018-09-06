@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass_index') }}">내강의실 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass1') }}">무한PASS존</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_online1') }}">온라인강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">온라인강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_online1') }}">수강대기강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online2') }}">수강중강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online3') }}">일시정지강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online4') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_acad1') }}">수강신청강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_acad2') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_test1') }}">모의고사관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">모의고사관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_test1') }}">접수현황</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test2') }}">온라인모의고사 응시</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test3') }}">성적결과</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">결제관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_payment1') }}">주문/배송조회</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment3') }}">포인트관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment4') }}">쿠폰/수강권관리</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_support1') }}">학습지원관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학습지원관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_support1') }}">쪽지관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support2') }}">알림관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support3') }}">상담내역</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">회원정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">회원정보</li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo1') }}">개인정보관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo2') }}">비밀번호변경</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>모의고사관리</strong>
            <span class="depth-Arrow">></span><strong>온라인모의고사 응시</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-TESTZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 온라인모의고사 응시
            </div>
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                - 온라인 응시기간 및 지정된 시간에만 응시가 가능하오니 시험기간을 엄수해 주세요.<br/>
                                - 임의로 시험을 중단하거나 임시저장만 한 상태에서 시험 종료 시, 시험결과를 확인할 수 없습니다.<br/>
                                - 모의고사 응시 창에서 응시 후, 답안지는 모두 체크하셔야 답안 제출이 가능합니다.<br/>
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
                        <select id="all" name="all" title="all" class="seleAll mr10 h30 f_left">
                            <option selected="selected">응시상태</option>
                            <option value="미확인쪽지">미응시</option>
                            <option value="확인쪽지">응시완료</option>
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
                        <col style="width: 120px;">
                        <col style="width: 280px;">
                        <col style="width: 90px;">
                        <col style="width: 130px;">
                        <col style="width: 120px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>응시분야<span class="row-line">|</span></li></th>
                            <th>시험응시일<span class="row-line">|</span></li></th>
                            <th>모의고사명<span class="row-line">|</span></li></th>
                            <th>응시상태<span class="row-line">|</span></li></th>
                            <th>나의응시일<span class="row-line">|</span></li></th>
                            <th>응시하기</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">8</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">미응시</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="openWin('TESTSTARTPASS')">응시하기</a></td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10~</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none">응시하기</a></td>
                        </tr>
                        <tr>
                            <td class="w-no">6</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">4</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
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

        <div id="TESTSTARTPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h960 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('TESTSTARTPASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">모의고사 응시</div> 
            <div class="lecMoreWrap">
                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li class="tit strong">· 응시 전 필독사항</li>
                        <li class="txt">- 온라인 응시기간 및 지정된 시간에만 응시가 가능하오니 <span class="tx-red">시험시간을 엄수</span>해 주세요.</li>
                        <li class="txt">- '시작하기'클릭 직후부터 시험이 시작되며 시험시간이 카운트다운 됩니다.</li>
                        <li class="txt">- 출제과목 순서대로 응시하거나, 응시자가 원하는 과목 순서대로 응시할 수 있습니다.</li>
                        <li class="txt">- 고민되는 문제는 '고민중'으로 체크 후 차후에 다시 정답을 체크해 주세요.</li>
                        <li class="txt">- 응시 중간에 우측 상단의 'X'를 클릭하거나, <span class="tx-red">임의로 시험을 중단 및 임시저장 후 제출 시, 시험결과를 확인할 수 없습니다.</span>(무효처리)</li>
                        <li class="txt">- <span class="tx-red">응시후 답안지는 모두 체크하셔야 답안 제출이 가능</span>합니다.</li>
                    </ul>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mb15 tx-gray">· 응시과목</div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable withdrawalTable under-gray bdt-gray tx-gray GM">
                                <colgroup>
                                    <col style="width: 20%;"/>
                                    <col style="width: 20%;"/>
                                    <col style="width: 20%;"/>
                                    <col style="width: 20%;"/>
                                    <col style="width: 20%;"/>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="Top" colspan="3">필수과목</th>
                                        <th>선택과목1</th>
                                        <th>선택과목2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="Top">국어</td>
                                        <td>영어</td>
                                        <td>한국사</td>
                                        <td>행정법</td>
                                        <td>행정학</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section pt30">
                        <div class="Search-Result strong mb15 tx-gray">· 응시기간 및 시험시간</div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable withdrawalTable under-gray bdt-gray tx-gray GM">
                                <colgroup>
                                    <col style="width: 50%;"/>
                                    <col style="width: 50%;"/>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="Top">응시기간</th>
                                        <th>시험시간</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="Top">2018-00-00 00:00 ~ 2018-00-00 00:00</td>
                                        <td>1시간 40분 (100분)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section pt30">
                        <div class="Search-Result strong mb15 tx-gray">· 응시기간 참고</div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable withdrawalTable under-gray bdt-gray tx-gray GM">
                                <colgroup>
                                    <col style="width: 25%;"/>
                                    <col style="width: 25%;"/>
                                    <col style="width: 25%;"/>
                                    <col style="width: 25%;"/>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="Top">응시기간</th>
                                        <th>시험시간</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="Top">2018-00-00 00:00 ~ 2018-00-00 00:00</td>
                                        <td>1시간 40분 (100분)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 모의고사 응시 : 응시전 -->
   
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop