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
                    <a href="#none">온라인강좌</a>
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
                <li>
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li>
                    <a href="#none">모의고사관리</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                </li>
                <li>
                    <a href="#none">학습지원관리</a>
                </li>
                <li>
                    <a href="#none">회원정보</a>
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

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 주문/배송조회
            </div>
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">주문/배송조회 안내</div>
                                - 주문/배송상태는 입금대기→결제완료→발송준비→발송완료 단계로 이루어집니다.<br/>
                                - 주문번호 혹은 주문내역을 클릭하시면 주문상세정보를 확인할 수 있습니다.<br/>
                                - 무통장입금(가상계좌)는 주문 번호별 다른 계좌번호가 발급되오니 주문 상세정보에서 계좌번호를 확인해 주시기 바랍니다.<br/>

                                <div class="Tit pt30">배송안내</div>
                                - 배송상품은 당일 오후 1시까지 결제한 상품에 한해 당일 발송처리되므로(토, 일, 공휴일제외), '발송준비'로 변경된 배송상품의 주문취소/배송지 변경의 경우 고객센터를 통해서만 가능합니다.<br/>
                                - '발송완료'단계부터 배송조회가 가능하며, '배송조회'버튼 클릭시 배송상황을 확인할 수 있습니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- willbes-Mypage-ONLINEZONE -->

        <div class="willbes-Mypage-Tabs mt60">
            <div class="willbes-Lec-Selected willbes-Mypage-Selected center tx-gray">
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
                <select id="process" name="process" title="process" class="seleProcess f_left">
                    <option selected="selected">과정</option>
                    <option value="헌법">헌법</option>
                    <option value="스파르타반">스파르타반</option>
                    <option value="공직선거법">공직선거법</option>
                </select>
            </div>
            <div class="LeclistTable orderTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 80px;">
                        <col style="width: 110px;">
                        <col style="width: 110px;">
                        <col style="width: 250px;">
                        <col style="width: 130px;">
                        <col style="width: 130px;">
                        <col style="width: 130px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>주문일<span class="row-line">|</span></li></th>
                            <th>주문번호<span class="row-line">|</span></li></th>
                            <th>주문내역<span class="row-line">|</span></li></th>
                            <th>결제금액<span class="row-line">|</span></li></th>
                            <th>결제수단<span class="row-line">|</span></li></th>
                            <th>주문/배송상태</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-process">공무원</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-number">20180000</td>
                            <td class="w-list">2018 정채영국엉 문학종결자 외1</td>
                            <td class="w-price">92,000</td>
                            <td class="w-method">무통장입금</td>
                            <td class="w-state tx-light-blue">입금대기</td>
                        </tr>
                        <tr>
                            <td class="w-process">경찰</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-number">20180000</td>
                            <td class="w-list">2018 정채영국엉 문학종결자 외1</td>
                            <td class="w-price">92,000</td>
                            <td class="w-method">실시간 계좌이체</td>
                            <td class="w-state">
                                <strong>발송완료</strong><br/>
                                <div class="tBox NSK light-gray"><a href="">배송조회</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-process">임용</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-number">20180000</td>
                            <td class="w-list">2018 정채영국엉 문학종결자 외1</td>
                            <td class="w-price">92,000</td>
                            <td class="w-method">신용카드</td>
                            <td class="w-state tx-light-blue">결제완료</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Mypage-Tabs -->

        <div class="willbes-Delivery-Info c_both">
            <div class="willbes-Lec-Tit NG tx-black">결제정보</div>
            <table cellspacing="0" cellpadding="0" class="finTable under-gray tx-gray tx-center">
                <colgroup>
                    <col style="width: 140px;"/>
                    <col style="width: 330px;"/>
                    <col style="width: 140px;"/>
                    <col style="width: 330px;"/>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="bg-light-white">가상계좌신청일</td>
                        <td>2018-04-20 01:12:14</td>
                        <td class="bg-light-white">가상계좌정보</td>
                        <td>우리은행 234-234532-092 (주)윌비스</td>
                    </tr>
                    <tr>
                        <td class="bg-light-white">입금기한</td>
                        <td>2018-04-27 01:12:14</td>
                        <td class="bg-light-white">결제금액</td>
                        <td><strong class="tx-light-blue">343,000원</strong></td>
                    </tr>
                    <tr>
                        <td class="bg-light-white">결제상태</td>
                        <td><strong class="tx-light-blue">입금대기</strong></td>
                        <td class="bg-light-white">가상계좌취소</td>
                        <td><span class="btnAll NSK"><a href="#none">취소</a></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- willbes-Delivery-Info -->

        <div class="willbes-Buylist-Price Fin mt60 p_re">
            <ul class="cart-PriceBox NG">
                <li class="price-list p_re">
                    <dl class="priceBox">
                        <dt>
                            <div>상품주문금액</div>
                            <div class="price tx-light-blue">140,000원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>쿠폰할인금액</div>
                            <div class="price tx-light-pink">180,000원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>포인트 차감금액</div>
                            <span class="price tx-light-pink">13,000원</span>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                        </dt>
                        <dt>
                            <div>배송료</div>
                            <span class="price tx-light-blue">2,500원</span>
                        </dt>
                    </dl>
                </li>
                <li class="price-total">
                    <div>최종결제금액</div>
                    <span class="price tx-light-blue">188,600원</span>
                </li>
            </ul>
        </div>
        <!-- willbes-Buylist-Price -->

        <div class="willbes-Cartlist-Fin c_both">
            <div class="willbes-Lec-Tit NG tx-black">상품정보</div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray tx-gray">
                    <colgroup>
                        <col style="width: 540px;">
                        <col style="width: 120px;">
                        <col style="width: 140px;">
                        <col style="width: 140px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>상품정보<span class="row-line">|</span></li></th>
                            <th>수강기간<span class="row-line">|</span></li></th>
                            <th>실 결제금액<span class="row-line">|</span></li></th>
                            <th>사용쿠폰</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p1">강좌</span> 2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                            </td>
                            <td class="w-day">40일</td>
                            <td class="w-price tx-light-blue">75,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p1">강좌</span> 2018 김용철행정법총론실전동형모의고사(3월)
                            </td>
                            <td class="w-day">40일</td>
                            <td class="w-price tx-light-blue">80,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p2">패키지</span> 2017 9급공무원이론선택형종합패키지-30일완성
                            </td>
                            <td class="w-day">140일</td>
                            <td class="w-price tx-light-blue">180,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p3">교재</span> 2017 정채영국어서울시문제를알려주마!1
                            </td>
                            <td class="w-day">&nbsp;</td>
                            <td class="w-price tx-light-blue">7,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p3">교재</span> 2017정채영국어서울시문제를알려주마!2
                            </td>
                            <td class="w-day">&nbsp;</td>
                            <td class="w-price tx-light-blue">5,000원</td>
                            <td class="w-coupon">20% 할인권</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Cartlist-Fin -->

        <div class="willbes-Delivery-Info-Fin p_re c_both">
            <div class="willbes-Lec-Tit NG tx-black">배송정보</div>
            <div class="deliveryInfoTable pb110 GM">
                <table cellspacing="0" cellpadding="0" class="classTable deliveryTable upper-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr class="u-from">
                            <th class="w-list" rowspan="3">구매자<br/>정보</th>
                            <td class="w-tit bg-light-white tx-left pl20">이름</td>
                            <td class="w-info tx-left pl20">홍길동</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호</td>
                            <td class="w-info tx-left pl20">010-1234-5678</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">이메일</td>
                            <td class="w-info tx-left pl20">willbes@willbes.com</td>
                        </tr>

                        <tr class="u-to">
                            <th class="w-list" rowspan="5">받는사람<br/>정보</th>
                            <td class="w-tit bg-light-white tx-left pl20">이름<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">홍길동</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">주소<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">
                                [258445]<br/>
                                서울시 동작구 만양로 105 한성빌딩<br/>
                                2층 (동작구 노량진동) ㈜윌비스
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">010-1234-5678</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                            <td class="w-info tx-left pl20">02-1234-5678</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">배송시 요청사항</td>
                            <td class="w-info tx-left pl20">부재 시 경비실에 맡겨주세요.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                            <span class="tx-purple-gray">내강의실 바로가기</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                            <span>주문/배송 조회목록</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-Delivery-Info-Fin -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop