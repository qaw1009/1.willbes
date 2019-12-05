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
    <div class="Content p_re">

        <div class="willbes-Cartlist c_both">
            <div class="stepCart NG">
                <ul class="tabs-Step">
                    <li><div><img src="{{ img_url('cart/icon_cart1.png') }}"> 장바구니</div></li>
                    <li><div><img src="{{ img_url('cart/icon_cart2.png') }}"> 결제하기</div></li>
                    <li class="on"><div><img src="{{ img_url('cart/icon_cart3_on.png') }}"> 결제완료</div></li>
                </ul>
            </div>
            <div class="willbes-Payment-Fin NG">
                <img src="{{ img_url('cart/icon_check.gif') }}"> 결제가 성공적으로 완료되었습니다.
            </div>
        </div>
        <!-- willbes-Cartlist -->

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
                        <td class="bg-light-white">결제번호</td>
                        <td><strong>1246258742</strong></td>
                        <td class="bg-light-white">결제일</td>
                        <td><strong>2018-04-20 12:22:11</strong></td>
                    </tr>
                    <tr>
                        <td class="bg-light-white">결제금액</td>
                        <td><strong class="tx-light-blue">188,600원</strong></td>
                        <td class="bg-light-white">결제수단</td>
                        <td><strong class="tx-light-blue">신용카드(현대)</strong></td>
                    </tr>
                    <tr>
                        <td class="bg-light-white">결제상태</td>
                        <td>결제완료</td>
                        <td class="bg-light-white">영수증출력</td>
                        <td><span class="btnAll NSK"><a href="#none">영수증출력하기</a></span></td>
                    </tr>
                    <!-- 결제수단 무통장일때만 보임
                    <tr>
                        <td class="bg-light-white">무통장 입금정보</td>
                        <td class="" colspan="3">
                            가상계좌신청일 : 2018-07-21 09:33
                            <span class="row-line">|</span>
                            가상계좌정보 : [우리은행] 12345678912345
                            <span class="row-line">|</span>
                            입금자명 : 홍길동
                        </td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
        <!-- willbes-Delivery-Info -->

        <div class="willbes-Buylist-Price Fin p_re">
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
                    <div>결제예상금액</div>
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
                        <col style="width: 650px;">
                        <col style="width: 120px;">
                        <col style="width: 170px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>상품정보<span class="row-line">|</span></th>
                            <th>수강기간<span class="row-line">|</span></th>
                            <th>실 결제금액</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p1">강좌</span> 2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                            </td>
                            <td class="w-day">40일</td>
                            <td class="w-price tx-light-blue">75,000원</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p1">강좌</span> 2018 김용철행정법총론실전동형모의고사(3월)
                            </td>
                            <td class="w-day">40일</td>
                            <td class="w-price tx-light-blue">80,000원</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p2">패키지</span> 2017 9급공무원이론선택형종합패키지-30일완성
                            </td>
                            <td class="w-day">140일</td>
                            <td class="w-price tx-light-blue">180,000원</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p3">교재</span> 2017 정채영국어서울시문제를알려주마!1
                            </td>
                            <td class="w-day">&nbsp;</td>
                            <td class="w-price tx-light-blue">7,000원</td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left p_re pl20">
                                <span class="pBox p3">교재</span> 2017정채영국어서울시문제를알려주마!2
                            </td>
                            <td class="w-day">&nbsp;</td>
                            <td class="w-price tx-light-blue">5,000원</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Cartlist-Fin -->

        <div class="willbes-Cartlist-Fin c_both">
            <div class="willbes-Lec-Tit NG tx-black">사은품정보</div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray tx-gray">
                    <colgroup>
                        <col style="width: 100%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>사은품명</th>
                        </tr>
                    </thead>
                    <tbody>                      
                        <tr>
                            <td class="w-info tx-left pl20">갤럭시탭</td>
                        </tr>
                        <tr>
                            <td class="w-info tx-left pl20">경찰 기본서 경행 세트 (형소법,경찰학,형법,수사,행정법)</td>
                        </tr>
                        <tr>
                            <td class="w-info tx-left pl20">기프티콘 (12월 말 회원정보 휴대폰번호로 일괄 발송 예정)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="willbes-Delivery-Info-Fin p_re c_both">
            <div class="willbes-Lec-Tit NG tx-black">배송정보</div>
            <div class="deliveryInfoTable pb60 GM">
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
                            <span>결제내역 바로가기</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-Delivery-Info-Fin -->

    </div>
    <div class="Quick-Bnr ml20 mt85">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop