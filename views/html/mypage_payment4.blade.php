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
            <span class="depth-Arrow">></span><strong>결제관리</strong>
            <span class="depth-Arrow">></span><strong>쿠폰/수강권관리</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-PAYMENTZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 쿠폰/수강권관리
            </div>
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">쿠폰안내</div> 
                                - 쿠폰은 유효기간 내에만 사용이 가능하며, 유효기간이 지난 쿠폰은 소멸됩니다.<br/>
                                - 쿠폰으로 구매한 상품 취소 시, 사용된 쿠폰은 복원되지 않고 소멸됩니다.<br/>

                                <div class="Tit pt30">수강권안내</div>
                                - 수강권은 윌비스 제휴사( <img src="{{ img_url('mypage/icon_company1.png') }}"> <img src="{{ img_url('mypage/icon_company2.png') }}"> <img src="{{ img_url('mypage/icon_company3.png') }}"> <img src="{{ img_url('mypage/icon_company4.png') }}"> )를 통해서만 지급되며 특정 강좌만 수강할 수 있습니다.<br/>
                                - 수강권은 등록 후 즉시 수강중인강좌 > 관리자지급강좌에서 강좌 수강이 가능합니다.(결제 시 사용되지 않음)<br/>
                                - 수강권은 표기된 유효기간 내에만 사용이 가능하며, 유효기간이 지난 수강권은 등록되지 않습니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- willbes-Mypage-PAYMENTZONE -->

        <div class="willbes-Mypage-Tabs mt40">
            <div class="pointDetailWrap">
                <ul class="tabWrap tabDepth3 NG">
                    <li><a href="#point1">쿠폰</a></li>
                    <li><a href="#point2">수강권</a></li>
                </ul>
                <div class="tabBox mt20">
                    <div id="point1">
                        <table cellspacing="0" cellpadding="0" class="userPointTable h55 NG">
                            <colgroup>
                                <col style="width: 50%;"/>
                                <col style="width: 50%;"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td>
                                        사용가능한쿠폰 <span class="tx-light-blue">10</span>장 <span class="tBox t2Box black ml20"><a href="#none" onclick="openWin('COUPONPASS')">쿠폰등록</a></span>
                                    </td>
                                    <td>
                                        당월소멸예정쿠폰 <span class="tx-light-blue">5</span>장
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="useDetailWrap mt25">
                            <ul class="tabWrap tabDepthPass">
                                <li><a href="#use1">보유쿠폰</a></li>
                                <li><a href="#use2">사용/만료쿠폰</a></li>
                            </ul>
                            <div class="tabBox mt20">
                                <div id="use1">
                                    <div class="willbes-Mypage-Tabs">
                                        <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                                            <span class="w-data">
                                                기간검색 &nbsp;
                                                <select id="days" name="days" title="days" class="seleDays">
                                                    <option selected="selected">발급일</option>
                                                    <option value="남은일자">남은일자</option>
                                                </select>
                                                <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30"> ~&nbsp; 
                                                <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                                            </span>
                                            <span class="w-month">
                                                <ul>
                                                    <li><a href="#none">전체</a></li>
                                                    <li><a class="on" href="#none">1개월</a></li>
                                                    <li><a href="#none">3개월</a></li>
                                                    <li><a href="#none">6개월</a></li>
                                                </ul>
                                            </span>
                                            <button type="submit" onclick="" class="search-Btn">
                                                <span>검색</span>
                                            </button>
                                        </div>
                                        <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                                            <select id="process" name="process" title="process" class="seleProcess f_left mr10">
                                                <option selected="selected">과정</option>
                                                <option value="헌법">헌법</option>
                                                <option value="스파르타반">스파르타반</option>
                                                <option value="공직선거법">공직선거법</option>
                                            </select>
                                            <select id="date" name="date" title="date" class="seleDate">
                                                <option selected="selected">최근발급순</option>
                                                <option value="만료임박순">만료임박순</option>
                                            </select>
                                        </div>
                                        <div class="LeclistTable pointTable">
                                            <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                                                <colgroup>
                                                    <col style="width: 80px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 120px;">
                                                    <col style="width: 180px;">
                                                    <col style="width: 80px;">
                                                    <col style="width: 100px;">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>과정<span class="row-line">|</span></li></th>
                                                        <th>쿠폰번호<span class="row-line">|</span></li></th>
                                                        <th>쿠폰명<span class="row-line">|</span></li></th>
                                                        <th>할인율(금액)<span class="row-line">|</span></li></th>
                                                        <th>적용대상<span class="row-line">|</span></li></th>
                                                        <th>적용제한금액<span class="row-line">|</span></li></th>
                                                        <th>사용가능기간<span class="row-line">|</span></li></th>
                                                        <th>남은일자<span class="row-line">|</span></li></th>
                                                        <th>발급일</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">온라인강좌</td>
                                                        <td class="w-l-price">10,000원 이상</td>
                                                        <td class="w-period">2018-00-00 ~ 2018-00-00</td>
                                                        <td class="w-d-day">3일</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">경찰</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">5,000원</td>
                                                        <td class="w-product">수강연장</td>
                                                        <td class="w-l-price">50,000원 이상</td>
                                                        <td class="w-period">2018-00-00 ~ 2018-00-00</td>
                                                        <td class="w-d-day">5일</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">배수</td>
                                                        <td class="w-l-price">10,000원 이상</td>
                                                        <td class="w-period">2018-00-00 ~ 2018-00-00</td>
                                                        <td class="w-d-day">30일</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">5,000원</td>
                                                        <td class="w-product">교재할인</td>
                                                        <td class="w-l-price">50,000원 이상</td>
                                                        <td class="w-period">2018-00-00 ~ 2018-00-00</td>
                                                        <td class="w-d-day">5일</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">경찰</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">온라인강좌</td>
                                                        <td class="w-l-price">10,000원 이상</td>
                                                        <td class="w-period">2018-00-00 ~ 2018-00-00</td>
                                                        <td class="w-d-day">3일</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">온라인강좌</td>
                                                        <td class="w-l-price">10,000원 이상</td>
                                                        <td class="w-period">2018-00-00 ~ 2018-00-00</td>
                                                        <td class="w-d-day">30일</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">배수</td>
                                                        <td class="w-l-price">10,000원 이상</td>
                                                        <td class="w-period">2018-00-00 ~ 2018-00-00</td>
                                                        <td class="w-d-day">3일</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">교재할인</td>
                                                        <td class="w-l-price">50,000원 이상</td>
                                                        <td class="w-period">2018-00-00 ~ 2018-00-00</td>
                                                        <td class="w-d-day">5일</td>
                                                        <td class="w-date">2018-00-00</td> 
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
                                <div id="use2">
                                    <div class="willbes-Mypage-Tabs">
                                        <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                                            <span class="w-data">
                                                기간검색 &nbsp;
                                                <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30"> ~&nbsp; 
                                                <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                                            </span>
                                            <span class="w-month">
                                                <ul>
                                                    <li><a href="#none">전체</a></li>
                                                    <li><a class="on" href="#none">1개월</a></li>
                                                    <li><a href="#none">3개월</a></li>
                                                    <li><a href="#none">6개월</a></li>
                                                </ul>
                                            </span>
                                            <button type="submit" onclick="" class="search-Btn">
                                                <span>검색</span>
                                            </button>
                                        </div>
                                        <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                                            <select id="process" name="process" title="process" class="seleProcess f_left mr10">
                                                <option selected="selected">과정</option>
                                                <option value="헌법">헌법</option>
                                                <option value="스파르타반">스파르타반</option>
                                                <option value="공직선거법">공직선거법</option>
                                            </select>
                                            <select id="state" name="state" title="state" class="seleState">
                                                <option selected="selected">상태</option>
                                                <option value="전체">전체</option>
                                                <option value="기간만료">기간만료</option>
                                                <option value="사용완료">사용완료</option>
                                            </select>
                                        </div>
                                        <div class="LeclistTable pointTable">
                                            <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                                                <colgroup>
                                                    <col style="width: 80px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 180px;">
                                                    <col style="width: 120px;">
                                                    <col style="width: 80px;">
                                                    <col style="width: 100px;">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>과정<span class="row-line">|</span></li></th>
                                                        <th>쿠폰번호<span class="row-line">|</span></li></th>
                                                        <th>쿠폰명<span class="row-line">|</span></li></th>
                                                        <th>할인율(금액)<span class="row-line">|</span></li></th>
                                                        <th>적용대상<span class="row-line">|</span></li></th>
                                                        <th>쿠폰사용상품<span class="row-line">|</span></li></th>
                                                        <th>주문번호<span class="row-line">|</span></li></th>
                                                        <th>상태<span class="row-line">|</span></li></th>
                                                        <th>사용/소멸일</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">온라인강좌</td>
                                                        <td class="w-list">상품명이 출력됩니다.</td>
                                                        <td class="w-number">20180000</td>
                                                        <td class="w-state">만료</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">경찰</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">5,000원</td>
                                                        <td class="w-product">수강연장</td>
                                                        <td class="w-list">상품명이 출력됩니다.</td>
                                                        <td class="w-number">20180000</td>
                                                        <td class="w-state">사용</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">배수</td>
                                                        <td class="w-list">상품명이 출력됩니다.</td>
                                                        <td class="w-number">20180000</td>
                                                        <td class="w-state">만료</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">5,000원</td>
                                                        <td class="w-product">교재할인</td>
                                                        <td class="w-list">상품명이 출력됩니다.</td>
                                                        <td class="w-number">20180000</td>
                                                        <td class="w-state">사용</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">경찰</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">온라인강좌</td>
                                                        <td class="w-list">상품명이 출력됩니다.</td>
                                                        <td class="w-number">20180000</td>
                                                        <td class="w-state">만료</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">온라인강좌</td>
                                                        <td class="w-list">상품명이 출력됩니다.</td>
                                                        <td class="w-number">20180000</td>
                                                        <td class="w-state">사용</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">배수</td>
                                                        <td class="w-list">상품명이 출력됩니다.</td>
                                                        <td class="w-number">20180000</td>
                                                        <td class="w-state">만료</td>
                                                        <td class="w-date">2018-00-00</td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="w-process">공무원</td>
                                                        <td class="w-c-num">CODE</td>
                                                        <td class="w-list">쿠폰명 출력</td>
                                                        <td class="w-discount">10%</td>
                                                        <td class="w-product">교재할인</td>
                                                        <td class="w-list">상품명이 출력됩니다.</td>
                                                        <td class="w-number">20180000</td>
                                                        <td class="w-state">사용</td>
                                                        <td class="w-date">2018-00-00</td> 
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
                            </div>
                        </div>
                        <!-- useDetailWrap -->
                    </div>
                    <div id="point2">
                        <table cellspacing="0" cellpadding="0" class="userPointTable userCouponTable NG">
                            <tbody>
                                <tr>
                                    <td>
                                        수강권 번호 &nbsp; 
                                        <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30">
                                        <span class="tBox t2Box black" style="height: 26px;"><a href="" style="padding: 4px 0;">등록</a></span>
                                        <div class="tx-gray">'-'를 제외한 숫자 16자리만 입력해 주세요.</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="useDetailWrap mt20">
                            <div class="willbes-Mypage-Tabs">
                                <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                                    <span class="w-data">
                                        기간검색 &nbsp;
                                        <select id="days" name="days" title="days" class="seleDays">
                                            <option selected="selected">발급일</option>
                                            <option value="남은일자">남은일자</option>
                                        </select>
                                        <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30"> ~&nbsp; 
                                        <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                                    </span>
                                    <span class="w-month">
                                        <ul>
                                            <li><a href="#none">전체</a></li>
                                            <li><a class="on" href="#none">1개월</a></li>
                                            <li><a href="#none">3개월</a></li>
                                            <li><a href="#none">6개월</a></li>
                                        </ul>
                                    </span>
                                    <button type="submit" onclick="" class="search-Btn">
                                        <span>검색</span>
                                    </button>
                                </div>
                                <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                                    <select id="process" name="process" title="process" class="seleProcess f_left mr10">
                                        <option selected="selected">과정</option>
                                        <option value="헌법">헌법</option>
                                        <option value="스파르타반">스파르타반</option>
                                        <option value="공직선거법">공직선거법</option>
                                    </select>
                                    <select id="date" name="date" title="date" class="seleDate">
                                        <option selected="selected">최근발급순</option>
                                        <option value="만료임박순">만료임박순</option>
                                    </select>
                                </div>
                                <div class="LeclistTable pointTable">
                                    <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 80px;">
                                            <col style="width: 130px;">
                                            <col style="width: 370px;">
                                            <col style="width: 150px;">
                                            <col style="width: 210px;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>과정<span class="row-line">|</span></li></th>
                                                <th>수강권번호<span class="row-line">|</span></li></th>
                                                <th>수강권명<span class="row-line">|</span></li></th>
                                                <th>수강권적용강좌<span class="row-line">|</span></li></th>
                                                <th>등록일</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="w-process">공무원</td>
                                                <td class="w-c-num">CODE</td>
                                                <td class="w-list">쿠폰명 출력</td>
                                                <td class="w-product">온라인강좌</td>
                                                <td class="w-date">2018-00-00</td> 
                                            </tr>
                                            <tr>
                                                <td class="w-process">경찰</td>
                                                <td class="w-c-num">CODE</td>
                                                <td class="w-list">쿠폰명 출력</td>
                                                <td class="w-product">수강연장</td>
                                                <td class="w-date">2018-00-00</td> 
                                            </tr>
                                            <tr>
                                                <td class="w-process">공무원</td>
                                                <td class="w-c-num">CODE</td>
                                                <td class="w-list">쿠폰명 출력</td>
                                                <td class="w-product">배수</td>
                                                <td class="w-date">2018-00-00</td> 
                                            </tr>
                                            <tr>
                                                <td class="w-process">공무원</td>
                                                <td class="w-c-num">CODE</td>
                                                <td class="w-list">쿠폰명 출력</td>
                                                <td class="w-product">교재할인</td>
                                                <td class="w-date">2018-00-00</td> 
                                            </tr>
                                            <tr>
                                                <td class="w-process">경찰</td>
                                                <td class="w-c-num">CODE</td>
                                                <td class="w-list">쿠폰명 출력</td>
                                                <td class="w-product">온라인강좌</td>
                                                <td class="w-date">2018-00-00</td> 
                                            </tr>
                                            <tr>
                                                <td class="w-process">공무원</td>
                                                <td class="w-c-num">CODE</td>
                                                <td class="w-list">쿠폰명 출력</td>
                                                <td class="w-product">온라인강좌</td>
                                                <td class="w-date">2018-00-00</td> 
                                            </tr>
                                            <tr>
                                                <td class="w-process">공무원</td>
                                                <td class="w-c-num">CODE</td>
                                                <td class="w-list">쿠폰명 출력</td>
                                                <td class="w-product">배수</td>
                                                <td class="w-date">2018-00-00</td> 
                                            </tr>
                                            <tr>
                                                <td class="w-process">공무원</td>
                                                <td class="w-c-num">CODE</td>
                                                <td class="w-list">쿠폰명 출력</td>
                                                <td class="w-product">교재할인</td>
                                                <td class="w-date">2018-00-00</td> 
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
                        <!-- useDetailWrap -->

                    </div>
                </div>
            </div>
            <!-- pointDetailWrap -->
        </div>
        <!-- willbes-Mypage-Tabs -->

        <div id="COUPONPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox540 h400 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('COUPONPASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">쿠폰등록</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li class="tit strong">· 쿠폰등록안내
                        <li class="txt">- 오프라인에서 발급받은 쿠폰은 쿠폰등록후 사용할 수 있습니다.</li>
                        <li class="txt">- <span class="tx-red">쿠폰등록시, '-' 를 제외한 숫자 12자리만 입력해 주세요.</span></li>
                        <li class="txt">- 쿠폰발급후 등록된 쿠폰 내역에서 쿠폰적용상품과 사용기간을 확인하시기 바랍니다.</li>
                        <li class="txt">- 사용기간내 사용하지 못한 쿠폰은 소멸처리됩니다.</li>
                    </ul>
                    <table cellspacing="0" cellpadding="0" class="userPointTable userCouponTable NG">
                        <tbody>
                            <tr>
                                <td>
                                    쿠폰 번호 &nbsp; 
                                    <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30" style="width: 290px;">
                                    <span class="tBox t2Box black" style="height: 26px;"><a href="" style="padding: 4px 0;">등록</a></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 쿠폰등록 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop