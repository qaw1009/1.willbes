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
                <img src="{{ img_url('cart/icon_check.gif') }}"> 무통장입금(가상계좌) 신청이 완료되었습니다.
                <div class="subTit tx-gray mt20 NGR">가상계좌는 신청일로부터 <strong class="tx-light-blue">7일간</strong>만 유효하며, 기간 내에 입금해 주셔야 정상적으로 결제완료됩니다.</div>
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
                            <th>상품정보<span class="row-line">|</span></li></th>
                            <th>수강기간<span class="row-line">|</span></li></th>
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
                                [258445] <br/>
                                서울시 동작구 만양로 105 한성빌딩<br/>
                                2층 (동작구 노량진동) ㈜윌비스  
                                <div class="tx-light-blue mt10">
                                * 송장번호가 이미 등록되었거나, 주문/배송상태가 ‘발송완료’인 경우 배송지 수정이 불가능합니다.<br>
                                * 교재 배송 관련 문의 : 1544-4944 
                                </div>  
                                <div class="searchadd mt10">
                                    <button type="submit" onclick="openWin('MyAddress')" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue">
                                        <span>배송지 수정</span>
                                    </button>
                                </div>                             
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
            
            <div id="MyAddress"class="willbes-Layer-Black">
                <div class="willbes-Layer-CartBox">
                    <a class="closeBtn" href="#none" onclick="closeWin('MyAddress')">
                        <img src="{{ img_url('cart/close_cart.png') }}">
                    </a>
                    <div class="Layer-Tit NG bg-blue">배송지 수정</div>
                    <div id="AddModify" class="Layer-Cont Modify p_re">
                        <div class="couponWrap">
                            <table cellspacing="0" cellpadding="0" class="classTable deliveryTable under-gray tx-gray">
                                <tbody>
                                    <tr class="u-to">
                                        <td class="w-info tx-left">
                                            <div class="inputBox Add p_re">
                                                <div class="searchadd">
                                                    <input type="text" id="ADD1" name="ADD1" class="iptAdd" maxlength="30"> -
                                                    <input type="text" id="ADD2" name="ADD2" class="iptAdd" maxlength="30">   
                                                    <button type="submit" onclick="" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue" style="margin-left: 5px; margin-right: 5px;">
                                                        <span>우편번호 찾기</span>
                                                    </button>
                                                    <span class="btnAdd underline"><a href="#none" onclick="alert('입력한 주소를 나의 배송 주소록에 등록하시겠습니까?')">[나의 배송 주소록에 등록하기]</a></span>
                                                    
                                                </div>

                                                <div>
                                                    <div class="Layer-Tit Layer-Tit2 NG bg-heavy-gray">우편번호 검색
                                                        <a href="#none" onclick="">
                                                            <img src="{{ img_url('sub/icon_delete.gif') }}">
                                                        </a>
                                                    </div>
                                                    <div>
                                                        다음 우편번호
                                                    </div>
                                                </div>

                                                <div class="addbox1 p_re">
                                                    <input type="text" id="USER_ADD1" name="USER_ADD1" class="iptAdd1 bg-gray" placeholder="기본주소" maxlength="30">
                                                </div>
                                                <div class="addbox2 p_re">
                                                    <input type="text" id="USER_ADD2" name="USER_ADD2" class="iptAdd2" placeholder="상세주소" maxlength="30">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <ul class="btnWrapbt mt30">
                                <li class="subBtn NSK"><a href="#none">수정</a></li>
                            </ul> 
                        </div>
                    </div>
                    <!-- 배송 주소 수정 -->                   
                </div>
            </div>
            <!-- willbes-Layer-CartBox : 나의 배송 주소록 -->


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