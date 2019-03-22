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
            <span class="depth-Arrow">></span><strong>접수현황</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-TESTZONE c_both">
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                - 해당 모의고사명 클릭시 접수내역 확인 및 응시표를 출력할 수 있습니다.(단, 환불 완료된 모의고사는 응시표 출력불가능)<br/>
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
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                    <select id="route" name="route" title="route" class="seleRoute mr10 h30 f_left">
                        <option selected="selected">과정</option>
                        <option value="학원">학원</option>
                        <option value="온라인">온라인</option>
                    </select>
                    <select id="state" name="state" title="state" class="seleState mr10 h30 f_left">
                        <option selected="selected">결제상태</option>
                        <option value="결제완료">결제완료</option>
                        <option value="결제대기">결제대기</option>
                        <option value="환불완료">환불완료</option>
                        <option value="접수마감">접수마감</option>
                    </select>
                </span>
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </span>
            </div>
            <div class="LeclistTable pointTable">
                <table cellspacing="0" cellpadding="0" class="listTable testTable under-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 60px;">
                        <col style="width: 80px;">
                        <col style="width: 90px;">
                        <col style="width: 80px;">
                        <col style="width: 150px;">
                        <col style="width: 220px;">
                        <col style="width: 130px;">
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
                            <th>접수일<span class="row-line">|</span></li></th>
                            <th>결제상태</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">8</td>
                            <td class="w-process">학원경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Off</td>
                            <td class="w-date">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                            <td class="w-list"><a href="#none" onclick="openWin('MOCKTESTPASSFIN')">7/2 전국모의고사-일방경찰</a></td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-process">학원공무원</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Online</td>
                            <td class="w-date">2018-10-10~</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">6</td>
                            <td class="w-process">임용</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-form">Off</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">환불완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-process">온라인경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Online</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">4</td>
                            <td class="w-process">임용</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-form">Off</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-process">온라인공무원</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Online</td>
                            <td class="w-date">2018-10-10~</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">결제완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-process">임용</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-form">Off</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">환불완료</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-process">온라인경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-form">Online</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-day">2018-10-10 20:10</td>
                            <td class="w-state">결제완료</td>
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

        <div id="MOCKTESTPASSFIN" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MOCKTESTPASSFIN')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">윌비스 <span class="tx-blue">전국모의고사</span></div> 
            <div class="passzoneTitInfo tx-light-blue tx-center NG mt20">2018년 9급 시험대비 제 4회 전국 모의고사 (02/25 시행)</div>
            <div class="PASSZONE-List widthAutoFull">
                <div class="PASSZONE-Lec-Section">
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable userMemoTable mockpopupTable under-gray bdt-gray tx-gray GM">
                            <colgroup>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th class="w-tit">이름(아이디)</th>
                                    <td class="w-list" colspan="3"><strong>홍길동(ABC***)</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시형태</th>
                                    <td class="w-list"><strong>Off(학원)</strong></td>
                                    <th class="w-tit">응시분야</th>
                                    <td class="w-list"><strong>9급</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시지역</th>
                                    <td class="w-list"><strong>전국</strong></td>
                                    <th class="w-tit">응시번호</th>
                                    <td class="w-list"><strong>결제후 응시번호 확인 가능</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">시험응시일</th>
                                    <td class="w-list" colspan="3"><strong>2018-00-00 00:00 ~ 2018-00-00 00:00</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시직렬</th>
                                    <td class="w-list" colspan="3"><strong>일반행정직</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시필수과목</th>
                                    <td class="w-list" colspan="3"><strong>한국사, 영어</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시선택과목</th>
                                    <td class="w-list" colspan="3"><strong>[선택과목1] 행정학 [선택과목2] 수학</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">가산점</th>
                                    <td class="w-list" colspan="3"><strong>해당없음</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)금액</th>
                                    <td class="w-list"><strong>5,000원</strong></td>
                                    <th class="w-tit">쿠폰적용</th>
                                    <td class="w-list"><strong>미적용</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)루트</th>
                                    <td class="w-list"><strong>온라인</strong></td>
                                    <th class="w-tit">결제(접수)상태</th>
                                    <td class="w-list"><strong>결제완료</strong></td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)수단</th>
                                    <td class="w-list"><strong>신용카드</strong></td>
                                    <th class="w-tit">결제(접수)일</th>
                                    <td class="w-list"><strong>2018-00-00 00:00</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <ul class="passzoneListInfo BG tx-gray GM mt20">
                    <li class="txt">· 나의 전국 모의고사 접수현황은 내강의실 > 모의고사관리 > 접수현황 메뉴에서 확인 가능합니다.</li>
                    <li class="txt">· 나의 전국 모의고사 성적결과는 내강의실 > 모의고사관리 > 성적결과 메뉴에서 확인 가능합니다.</li>
                    <li class="txt">· 단, 해당 모의고사 응시완료 시에만 성적결과 보기 및 문제/해설 다운로드가 가능합니다.</li>
                </ul>
                <ul class="passzoneListInfo tx-gray GM mt20 mb20">
                    <li class="tit strong">[온라인 모의고사 유의사항]</li>
                    <li class="txt">· 온라인 모의고사(응시형태가 Online인 경우)는 내강의실 > 모의고사관리 > 온라인 모의고사 응시 메뉴에서<br/>
                        &nbsp; 응시해 주시기 바랍니다.</li>
                    <li class="txt">· 시험응시 기간 동안 지정된 시간에만 응시 가능합니다.</li>
                </ul>
                <div class="passzonebtn tx-center">
                    <span>
                        <button type="submit" onclick="" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                            <span class="strong">응시표 출력</span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 윌비스 전국모의고사 : 결제완료 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop