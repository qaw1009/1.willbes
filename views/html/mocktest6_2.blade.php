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
                <li><a class="on" href="#none">모의고사접수</a></li>
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
                                · 결제 후 모의고사 응시정보 수정은 불가능하며, 응시정보 수정을 원하실 경우 환불 후 접수기간 내에 재결제하셔야 합니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div class="willbes-Leclist c_both mt60">
                <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="state" name="state" title="state" class="seleState mr10 h30 f_left">
                            <option selected="selected">응시형태</option>
                            <option value="진행중">Online</option>
                            <option value="접수마감">Off(학원)</option>
                        </select>
                    </span>    
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="state" name="state" title="state" class="seleState mr10 h30 f_left">
                            <option selected="selected">진행상태</option>
                            <option value="진행중">진행중</option>
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
                                <td class="w-list tx-left pl15"><a href="#none" onclick="openWin('MOCKTESTPASS')">7/2 전국모의고사-일방경찰</a></td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state">진행중</td>
                                <td class="w-user-state">미접수</td>
                            </tr>
                            <tr>
                                <td class="w-no">7</td>
                                <td class="w-type">일반경찰</td>
                                <td class="w-form"><span class="tx-blue strong">Online</span></td>
                                <td class="w-date">2018-10-10~</td>
                                <td class="w-list tx-left pl15"><a href="#none" onclick="openWin('MOCKTESTPASSFIN')">8/13 빅매지2-경행경채 모의고사</a></td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state tx-red">접수마감</td>
                                <td class="w-user-state">결제완료</td>
                            </tr>
                            <tr>
                                <td class="w-no">6</td>
                                <td class="w-type">경행경채</td>
                                <td class="w-form"><span class="tx-origin-red strong">Off</span></td>
                                <td class="w-date">상시</td>
                                <td class="w-list tx-left pl15">7/2 전국모의고사-일방경찰</td>
                                <td class="w-price">5,000원</td>
                                <td class="w-day">2018-10-10 20:10 ~<br/>2018-00-00 00:00</td>
                                <td class="w-state">진행중</td>
                                <td class="w-user-state">미접수</td>
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
                                <td class="w-user-state">미접수</td>
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
                                <td class="w-user-state">미접수</td>
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

        <div id="MOCKTESTPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MOCKTESTPASS')">
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
                                    <td class="w-list" colspan="3">홍길동(ABC***)</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시형태</th>
                                    <td class="w-list">Off(학원)</td>
                                    <th class="w-tit">응시분야</th>
                                    <td class="w-list">9급</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시지역</th>
                                    <td class="w-list">
                                        <select id="area" name="area" title="area" class="seleArea">
                                            <option selected="selected">지역선택</option>
                                            <option value="서울">서울</option>
                                            <option value="경기">경기</option>
                                        </select>
                                    </td>
                                    <th class="w-tit">응시번호</th>
                                    <td class="w-list tx-bright-gray">결제후 응시번호 확인 가능</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">시험응시일</th>
                                    <td class="w-list" colspan="3">2018-00-00 00:00 ~ 2018-00-00 00:00</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시직렬</th>
                                    <td class="w-list" colspan="3">
                                        <select id="cause" name="cause" title="cause" class="seleCause">
                                            <option selected="selected">직렬선택</option>
                                            <option value="강사불만">강사불만</option>
                                            <option value="강좌불만">강좌불만</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시필수과목</th>
                                    <td class="w-list" colspan="3">한국사, 영어</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시선택과목</th>
                                    <td class="w-list" colspan="3">
                                        <select id="sele1" name="sele1" title="sele1" class="sele1">
                                            <option selected="selected">선택과목1</option>
                                            <option value="강사불만">강사불만1</option>
                                            <option value="강좌불만">강좌불만1</option>
                                            <option value="교재불만">교재불만1</option>
                                        </select>
                                        <select id="sele2" name="sele2" title="sele2" class="sele2">
                                            <option selected="selected">선택과목2</option>
                                            <option value="강사불만">강사불만2</option>
                                            <option value="강좌불만">강좌불만2</option>
                                            <option value="교재불만">교재불만2</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-tit">가산점</th>
                                    <td class="w-list" colspan="3">
                                        <ul>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>해당없음</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>5%</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>10%</label></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시료</th>
                                    <td class="w-list" colspan="3">5,000원</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="passzoneDayInfo tx-gray tx-center NGR mt30 mb30">[접수기간] <span class="tx-light-blue">2018-00-00 00:00 ~ 2018-00-00 00:00</span> <span class="tx-red">(마감3일전)</span></div>
                <ul class="passzoneListInfo tx-gray GM mt20 mb20">
                    <li class="tit strong">[결제시 유의사항]</li>
                    <li class="txt">· 접수기간이 마감된 후에는 결제하기가 불가능합니다.</li>
                    <li class="txt">· 환불요청은 시험응시 2일 전까지 가능하며, 시험응시일 이후에는 환불이 불가능합니다.</li>
                    <li class="txt">· 결제(접수)상태가 '결제대기'인 경우만 모의고사 접수정보 수정이 가능합니다.<br/>
                        &nbsp; (단, 접수기간이 마감된 경우 수정이 불가합니다.)
                    </li>
                    <li class="txt">· 결제대기 취소시 에는 해당 모의고사 접수정보는 내강의실 > 모의고사관리 > 접수현황메뉴에서 삭제 처리됩니다.</li>
                    <li class="txt">· 자세한 사항은 고객센터 1566-5006으로 문의해 주세요.</li>
                </ul>
                <div class="passzonebtn tx-center">
                    <span>
                        <button type="submit" onclick="location.href='{{ site_url('/home/html/cart5') }}'" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                            <span class="strong">바로결제</span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 윌비스 전국모의고사 : 미접수 -->

        <div id="MOCKTESTPASSFIN" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MOCKTESTPASSFIN')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">윌비스 <span class="tx-blue">전국모의고사</span></div> 
            <div class="passzoneTitInfo tx-light-blue tx-center NG mt20">2018년 9급 시험대비 제 4회 전국 모의고사 (02/25 시행)</div>
            <div class="PASSZONE-List widthAutoFull">
                <div class="PASSZONE-Lec-Section">
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable userMemoTable mockpopupTable under-black bdt-gray tx-gray GM">
                            <colgroup>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th class="w-tit">이름(아이디)</th>
                                    <td class="w-list" colspan="3">홍길동(ABC***)</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시형태</th>
                                    <td class="w-list">Off(학원)</td>
                                    <th class="w-tit">응시분야</th>
                                    <td class="w-list">9급</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시지역</th>
                                    <td class="w-list">전국</td>
                                    <th class="w-tit">응시번호</th>
                                    <td class="w-list tx-bright-gray">결제후 응시번호 확인 가능</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">시험응시일</th>
                                    <td class="w-list" colspan="3">2018-00-00 00:00 ~ 2018-00-00 00:00</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시직렬</th>
                                    <td class="w-list" colspan="3">일반행정직</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시필수과목</th>
                                    <td class="w-list" colspan="3">한국사, 영어</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시선택과목</th>
                                    <td class="w-list" colspan="3">[선택과목1] 행정학 [선택과목2] 수학</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">가산점</th>
                                    <td class="w-list" colspan="3">해당없음</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)금액</th>
                                    <td class="w-list">5,000원</td>
                                    <th class="w-tit">쿠폰적용</th>
                                    <td class="w-list">미적용</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)루트</th>
                                    <td class="w-list">온라인</td>
                                    <th class="w-tit">결제(접수)상태</th>
                                    <td class="w-list">결제완료</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">결제(접수)수단</th>
                                    <td class="w-list">신용카드</td>
                                    <th class="w-tit">결제(접수)일</th>
                                    <td class="w-list">2018-00-00 00:00</td>
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