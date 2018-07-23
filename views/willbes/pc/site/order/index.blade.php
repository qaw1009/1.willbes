@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Content p_re">
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        <div class="willbes-Cartlist c_both">
            <div class="stepCart NG">
                <ul class="tabs-Step">
                    <li><div><img src="{{ img_url('cart/icon_cart1.png') }}"> 장바구니</div></li>
                    <li class="on"><div><img src="{{ img_url('cart/icon_cart2_on.png') }}"> 결제하기</div></li>
                    <li><div><img src="{{ img_url('cart/icon_cart3.png') }}"> 결제완료</div></li>
                </ul>
            </div>
            <div class="willbes-Cart-Txt p_re pt30">
                <span class="MoreBtn underline NG"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                    <tbody>
                        <tr><td>• 해당 상품의 강좌시작일 설정은 결제일로부터 30일 범위 내로 설정 가능합니다.</td></tr>
                        <tr><td>• 해당 상품의 강좌시작일을 설정하지 않은 경우 결제일로부터 7일 후 강좌가 자동 시작됩니다.</td></tr>
                        <tr><td>• 해당 상품의 강좌의 개강일이 결제일보다 이후인 경우 개강일에 자동 시작됩니다.</td></tr>
                        <tr><td>• 배송 상품은 당일 오후 1시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일제외)</td></tr>
                    </tbody>
                </table> 
            </div>
            <div class="LeclistTable">
                <div class="willbes-Lec-Tit NG tx-black">
                    주문상품정보
                    <ul>
                        <li class="subBtn NSK"><a href="#none">포인트 현황 ></a></li>
                        <li class="subBtn NSK"><a href="#none">쿠폰 현황 ></a></li>
                    </ul>
                </div>
                <table cellspacing="0" cellpadding="0" class="listTable buyTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 770px;">
                        <col style="width: 170px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>상품정보<span class="row-line">|</span></th>
                            <th>실 결제금액</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results['list'] as $idx => $row)
                            <tr>
                                <td class="w-list tx-left pl20">
                                    <dl>
                                        <dt class="tit">
                                            <span class="pBox p{{ $row['CartProdTypeNum'] }}">{{ $row['CartProdTypeName'] }}</span>
                                            {{ $row['ProdName'] }}
                                            @if($row['IsCoupon'] == 'Y')
                                                <span class="tBox NSK t1 black"><a href="#none" onclick="openWin('Coupon');">쿠폰적용</a></span>
                                            @endif
                                        </dt>
                                        <dt>
                                            @if($row['CartProdType'] != 'book')
                                                <span class="w-day">수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span></span>
                                                <span class="w-data">
                                                    [강좌시작일 설정]
                                                    @if($row['IsLecStart'] == 'Y')
                                                        <input type="text" name="study_start_date[]" class="iptDate" maxlength="30" value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')) }}"/>
                                                        <img src="{{ img_url('cart/icon_calendar.gif') }}"> ~
                                                        <input type="text" name="study_end_date[]" class="iptDate" maxlength="30" value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' +8 day')) }}"/>
                                                        <img src="{{ img_url('cart/icon_calendar.gif') }}">
                                                    @else
                                                        <span class="tx-light-blue">결제완료 후 바로 수강 시작</span>
                                                    @endif
                                                </span>
                                            @endif
                                            @if($row['IsCoupon'] == 'Y')
                                                <span class="w-coupon">최대 5% 할인쿠폰 (<span class="tx-blue">5,000원 할인</span>) <a href="#none"><img src="{{ img_url('cart/close.png') }}"></a></span>
                                            @endif
                                        </dt>
                                    </dl>
                                </td>
                                <td class="w-buy-price">
                                    <dl>
                                        <dt class="tx-light-blue">{{ number_format($row['RealSalePrice']) }}원</dt>
                                        <dt class="origin-price tx-gray">(80,000원)</dt>
                                    </dl>
                                </td>
                            </tr>
                        @endforeach
                        {{-- 배송료 --}}
                        @if($results['delivery_price'] > 0)
                            <tr>
                                <td class="w-list tx-left pl20">
                                    <dl>
                                        <dt class="tit">
                                            <span class="pBox p4">배송</span> 배송비
                                            @if($results['cart_type'] == 'book')
                                                <span class="tx-light-blue">(교재 총 결제금액이 {{ number_format($__cfg['DeliveryFreePrice']) }}원 이상 인 경우 배송비 무료)</span>
                                            @endif
                                            <span class="tBox NSK t1 black"><a href="#none">쿠폰적용</a></span>
                                        </dt>
                                    </dl>
                                </td>
                                <td class="w-buy-price">
                                    <dl>
                                        <dt class="tx-light-blue">{{ number_format($results['delivery_price']) }}원</dt>
                                    </dl>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Cartlist -->
        <div class="willbes-Buylist-Price p_re">
            <ul class="cart-PriceBox NG">
                <li class="price-list p_re">
                    <dl class="priceBox">
                        <dt>
                            <div>상품주문금액</div>
                            <div class="price tx-light-blue">{{ number_format($results['total_price']) }}원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>쿠폰할인금액</div>
                            <div class="price tx-light-pink">0원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>포인트 차감금액</div>
                            <span class="price tx-light-pink">0원</span>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                        </dt>
                        <dt>
                            <div>배송료</div>
                            <span class="price tx-light-blue">{{ number_format($results['delivery_price']) }}원</span>
                        </dt>
                    </dl>
                </li>
                <li class="price-total">
                    <div>결제예상금액</div>
                    <span class="price tx-light-blue">{{ number_format($results['total_price'] + $results['delivery_price']) }}원</span>
                </li>
            </ul>
            <div class="cart-PointBox NG">
                <dl class="pointBox">
                    <dt class="p-tit"><span class="tx-blue">{{ $results['cart_type_name'] }}</span> 포인트 사용</dt>
                    <dt>
                        <span class="u-point tx-pink">0P 보유</span>
                        <span class="btnAll NSK"><a href="#none">전액사용</a></span>
                        <input type="text" name="use_point" class="iptPoint" value="0" maxlength="30"> P 차감
                    </dt>
                </dl>
            </div>
            <div class="p-info tx-gray c_both">
                • {{ $results['cart_type_name'] }} 포인트는 <span class="tx-light-blue">6,000P</span> 부터 <span class="tx-light-blue">1P</span> 단위로 사용 가능하며, 주문금액의 <span class="tx-light-blue">80%</span>까지만 사용 가능합니다.
            </div>
        </div>
        <!-- willbes-Cart-Price -->
        <div class="willbes-Delivery-Info c_both">
            <div class="willbes-Lec-Tit NG tx-black">배송정보</div>
            <div class="deliveryInfoTable GM">
                <table cellspacing="0" cellpadding="0" class="classTable deliveryTable upper-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr class="u-from">
                            <th class="w-list" rowspan="4">구매자<br/>정보</th>
                            <td class="tx-left pl20 tx-light-blue" colspan="2">• 구매자 정보는 회원가입 시 등록한 정보로 셋팅되며, 수정이 필요한 경우 회원 정보 페이지에서만 가능합니다.</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">이름</td>
                            <td class="w-info tx-left pl20">{{ $results['member']['MemName'] }}</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호</td>
                            <td class="w-info tx-left pl20">{{ $results['member']['Phone'] }}</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">이메일</td>
                            <td class="w-info tx-left pl20">{{ $results['member']['Mail'] }}</td>
                        </tr>
                        <tr class="u-to">
                            <th class="w-list" rowspan="6">받는사람<br/>정보<br/><span class="tx-light-blue">(* 필수입력항목)</span></th>
                            <td class="tx-left pl20 u-delivery-chk" colspan="2">
                                <ul>
                                    <li><input type="radio" id="addr_e_type" name="addr_type" value="E" checked="checked" class=""/><label>구매자 정보와 동일</label></li>
                                    <li><input type="radio" id="addr_r_type" name="addr_type" value="R" class=""/><label>최근 배송지</label></li>
                                    <li><input type="radio" id="addr_d_type" name="addr_type" value="D" class=""/><label>직접입력</label></li>
                                    <li><span class="btnAll NSK"><a href="#none" onclick="openWin('MyAddress');">나의 배송 주소록</a></span></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">이름<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20 item"><input type="text" id="receiver" name="receiver" value="{{ $results['member']['MemName'] }}" title="이름" required="required" class="iptName" maxlength="30"></td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">주소<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">
                                <div class="inputBox Add p_re">
                                    <div class="searchadd item">
                                        <input type="text" id="zipcode" name="zipcode" title="우편번호" required="required" readonly="readonly" class="iptAdd bg-gray" maxlength="6">
                                        <button type="button" onclick="searchPost('SearchPost', 'zipcode', 'addr1');" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue" style="margin-left: 5px; margin-right: 5px;">
                                            <span>우편번호 찾기</span>
                                        </button>
                                        <span class="btnAdd underline"><a href="#none" onclick="alert('입력한 주소를 나의 배송 주소록에 등록하시겠습니까?')">[나의 배송 주소록에 등록하기]</a></span>
                                        <div id="SearchPost" class="willbes-Layer-Black">
                                            <div class="willbes-Layer-CartBox">
                                                <a class="closeBtn" href="#none" onclick="closeSearchPost('SearchPost');">
                                                    <img src="{{ img_url('cart/close_cart.png') }}">
                                                </a>
                                                <div class="Layer-Tit NG bg-blue">우편번호 찾기</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="addbox1 p_re item">
                                        <input type="text" id="addr1" name="addr1" title="주소1" required="required" readonly="readonly" class="iptAdd1 bg-gray" placeholder="기본주소" maxlength="30">
                                    </div>
                                    <div class="addbox2 p_re item">
                                        <input type="text" id="addr2" name="addr2" title="주소2" required="required" class="iptAdd2" placeholder="상세주소" maxlength="30">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20 item">
                                <select id="receiver_phone1" name="receiver_phone1" title="휴대폰번호1" class="selePhone">
                                    <option value="">선택</option>
                                    @foreach($arr_phone1_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select> -
                                <input type="text" id="receiver_phone2" name="receiver_phone2" title="휴대폰번호2" class="iptCellhone1 phone" maxlength="30"> -
                                <input type="text" id="receiver_phone3" name="receiver_phone3" title="휴대폰번소3" class="iptCellhone2 phone" maxlength="30">
                                <input type="hidden" id="receiver_phone" name="receiver_phone" title="휴대폰번호" required="required" pattern="phone"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                            <td class="w-info tx-left pl20 item">
                                <select id="receiver_tel1" name="receiver_tel1" title="전화번호1" class="selePhone">
                                    <option value="">선택</option>
                                    @foreach($arr_tel1_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select> -
                                <input type="text" id="receiver_tel2" name="receiver_tel2" title="전화번호2" class="iptPhone1 phone" maxlength="30"> -
                                <input type="text" id="receiver_tel3" name="receiver_tel3" title="전화번호3" class="iptPhone2 phone" maxlength="30">
                                <input type="hidden" id="receiver_tel" name="receiver_tel" title="전화번호" pattern="tel" class="optional"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">배송시 요청사항</td>
                            <td class="w-info tx-left pl20">
                                <div class="inputBox p_re">
                                    <input type="text" id="delivery_memo" name="delivery_memo" class="iptMemo" placeholder="배송 메시지를 입력해 주세요. (예: 부재시 경비실에 맡겨주세요.)" maxlength="60">
                                    (<span id="delivery_memo_byte">0</span> / 120byte)
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Delivery-Info -->
        <div class="willbes-BuyInfo c_both">
            <div class="willbes-Lec-Tit NG tx-black">결제정보</div>
            <div class="buyInfoTable GM">
                <table cellspacing="0" cellpadding="0" class="classTable tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list bg-light-white">총 결제금액</td>
                            <td class="w-buyinfo tx-left pl25">
                                <dl>
                                    <dt>
                                        <span class="t-price tx-light-blue NGEB">188,600원</span> [신용카드]
                                        <span class="w-point">적립예정포인트:<span class="tx-light-blue">343원</span></span>
                                    </dt>
                                    <dt><div class="caution-txt">회원님께서는<span class="tx-red">도서산간,제주도배송지대상자로배송료2,500원이추가</span>로적용되었습니다.</div></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">결제수단</td>
                            <td class="w-buyinfo tx-left pl25">
                                <dl>
                                    <dt>
                                        <ul>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>신용카드</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>실시간 계좌이체</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>무통장입금(가상계좌)</label></li>
                                        </ul>
                                    </dt>
                                    <dt><div class="caution-txt">인터넷 공인인증서가 필요합니다.</div></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">에스크로<br/>사용여부</td>
                            <td class="w-buyinfo tx-left pl25">
                                <dl>
                                    <dt>
                                        <ul>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>사용</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>미사용</label></li>
                                        </ul>
                                    </dt>
                                    <dt><div class="caution-txt">[에스크로란?] 회원님께서 결제하신 금액을 에스크로업체에서 예치하고 있다가 상품이 회원님께 소중히 전달된 후 판매자에게 지불되는 방식</div></dt>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-BuyInfo -->
        <div class="willbes-PolicyInfo p_re c_both">
            <div class="willbes-Lec-Tit NG tx-black">유의사항 및 환불정책안내</div>
            <div class="policyInfoTable GM">
                <table cellspacing="0" cellpadding="0" class="classTable tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list bg-light-white">유의사항 안내</td>
                            <td class="w-txt tx-left">
                                <div class="txtBox">
                                    유의사항1<br/>
                                </div>
                                <div class="chkBox">
                                    위 유의사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                    <span class="chkBox-Agree checked">
                                        <input type="checkbox" id="agree1" name="agree1" class="" checked="checked"/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">개인정보활용안내</td>
                            <td class="w-txt tx-left">
                                <div class="txtBox">
                                    개인정보활용1<br/>
                                </div>
                                <div class="chkBox">
                                    위 개인정보 활용 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                    <span class="chkBox-Agree checked">
                                        <input type="checkbox" id="agree2" name="agree2" class="" checked="checked"/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">환불정책안내</td>
                            <td class="w-txt tx-left">
                                <div class="txtBox">
                                    환불정책1<br/>
                                </div>
                                <div class="chkBox">
                                    위 환불정책 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                    <span class="chkBox-Agree checked">
                                        <input type="checkbox" id="agree3" name="agree3" class="" checked="checked"/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="AllchkBox tx-gray">
                    위 유의사항, 개인정보활용, 환불정책안내사항을 모두 읽었으면 동의합니다. <span class="tx-blue">(전체동의)</span>
                    <span class="chkBox-Agree checked">
                        <input type="checkbox" id="agree_all" name="agree_all" class="" checked="checked"/>
                    </span>
                </div>
            </div>
            <div class="willbes-Lec-buyBtn">
                <div class="btnAgree NG"><input type="checkbox" id="" name="" class="" maxlength="30"><label>앞으로 결제 시 항상 동의하기</label></div>
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">장바구니가기</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>결제하기</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-PolicyInfo -->
        <div id="Coupon" class="willbes-Layer-Black">
            <div class="willbes-Layer-CartBox">
                <a class="closeBtn" href="#none" onclick="closeWin('Coupon')">
                    <img src="{{ img_url('cart/close_cart.png') }}">
                </a>
                <div class="Layer-Tit NG bg-blue">쿠폰적용</div>
                <div class="Layer-Cont">
                    <div class="tit NG">
                        <span class="pBox p1">강좌</span> 2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                    </div>
                    <div class="willbes-Pricelist">
                        <ul class="PriceBox p_re NG">
                            <li>
                                <div>상품금액</div>
                                <div class="price tx-light-blue">85,000원</div>
                            </li>
                            <li class="price-img">
                                <span class="row-line">|</span>
                                <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                            </li>
                            <li>
                                <div>쿠폰할인금액</div>
                                <div class="price tx-light-pink">5,000원</div>
                            </li>
                            <li class="price-img">
                                <span class="row-line">|</span>
                                <img src="{{ img_url('sub/icon_equal.gif') }}">
                            </li>
                            <li>
                                <div>할인적용금액</div>
                                <span class="price price-total tx-light-blue">75,000원</span>
                            </li>
                        </ul>
                    </div>
                    <div class="couponWrap p_re">
                        <ul class="tabWrap">
                            <li><a href="#coupon1" class="on">적용 가능 쿠폰</a></li>
                            <li><a href="#coupon2">전체 보유 쿠폰</a></li>
                        </ul>
                        <ul class="btnWrap">
                            <li class="subBtn white NSK"><a href="#none">쿠폰 적용 안함 ></a></li>
                            <li class="subBtn NSK"><a href="#none">쿠폰 적용 ></a></li>
                        </ul>
                        <div class="tabBox">
                            <div class="coupon caution-txt">내가 보유한 쿠폰 중 해당상품에 사용 가능한 쿠폰만 확인 및 적용 가능합니다.</div>
                            <div id="coupon1" class="tabContent">
                                <table cellspacing="0" cellpadding="0" class="couponTable upper-black under-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 50px;">
                                        <col style="width: 115px;">
                                        <col style="width: 240px;">
                                        <col style="width: 75px;">
                                        <col style="width: 90px;">
                                        <col style="width: 70px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>선택<span class="row-line">|</span></th>
                                            <th>분류<span class="row-line">|</span></th>
                                            <th>쿠폰번호<span class="row-line">|</span></th>
                                            <th>쿠폰명<span class="row-line">|</span></th>
                                            <th><div class="line2">할인율<br/>(금액)</div><span class="row-line line2">|</span></th>
                                            <th>사용가능기간<span class="row-line">|</span></th>
                                            <th>남은일자</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td>강좌</td>
                                            <td>12012514511245</td>
                                            <td>2017년 서울시/지방직 풀케어서비스 참여</td>
                                            <td>10%</td>
                                            <td>30일</td>
                                            <td>365일</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td>교재</td>
                                            <td>2012514511245</td>
                                            <td>회원가입 축하 쿠폰</td>
                                            <td>5,000원</td>
                                            <td>40일</td>
                                            <td>3일</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="coupon2" class="tabContent" style="display: none;">
                                <table cellspacing="0" cellpadding="0" class="couponTable upper-black under-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 60px;">
                                        <col style="width: 130px;">
                                        <col style="width: 260px;">
                                        <col style="width: 80px;">
                                        <col style="width: 90px;">
                                        <col style="width: 70px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>분류<span class="row-line">|</span></th>
                                            <th>쿠폰번호<span class="row-line">|</span></th>
                                            <th>쿠폰명<span class="row-line">|</span></th>
                                            <th><div class="line2">할인율<br/>(금액)</div><span class="row-line line2">|</span></th>
                                            <th>사용가능기간<span class="row-line">|</span></th>
                                            <th>남은일자</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>강좌</td>
                                            <td>12012514511245</td>
                                            <td>2017년 서울시/지방직 풀케어서비스 참여</td>
                                            <td>10%</td>
                                            <td>30일</td>
                                            <td>365일</td>
                                        </tr>
                                        <tr>
                                            <td>교재</td>
                                            <td>12012514511245</td>
                                            <td>회원가입 축하 쿠폰</td>
                                            <td>5,000원</td>
                                            <td>40일</td>
                                            <td>3일</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-CartBox : Coupon -->
        <div id="MyAddress" class="willbes-Layer-Black">
            <div class="willbes-Layer-CartBox">
                <a class="closeBtn" href="#none" onclick="closeWin('MyAddress')">
                    <img src="{{ img_url('cart/close_cart.png') }}">
                </a>
                <div class="Layer-Tit NG bg-blue">나의 배송 주소록</div>
                <div id="AddList" class="Layer-Cont p_re">
                    <div class="address caution-txt">주소록은 최대 5개까지 등록 가능합니다.</div>
                    <div class="subBtn address NSK"><a href="#none" onclick="closeWin('AddList'),openWin('AddModify')">신규주소등록 ></a></div>
                    <div class="couponWrap">
                        <table cellspacing="0" cellpadding="0" class="couponTable upper-black under-gray tx-gray">
                            <colgroup>
                                <col style="width: 50px;">
                                <col style="width: 75px;">
                                <col style="width: 70px;">
                                <col style="width: 120px;">
                                <col style="width: 275px;">
                                <col style="width: 100px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>선택<span class="row-line">|</span></th>
                                    <th>배송지<span class="row-line">|</span></th>
                                    <th>이름<span class="row-line">|</span></th>
                                    <th>연락처<span class="row-line">|</span></th>
                                    <th>주소<span class="row-line">|</span></th>
                                    <th>수정/삭제</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                    <td>삼성화재</td>
                                    <td>홍길동</td>
                                    <td>010-1234-5678</td>
                                    <td class="address tx-left pl20">
                                        06924<br/>
                                        서울특별시 동작구 노량진로 202길<br/>
                                        4층 WCA(노량진동, 남강빌딩)
                                    </td>
                                    <td class="address w-buy">
                                        <div class="tBox NSK t1 black"><a href="">수정</a></div>
                                        <div class="tBox NSK t2 gray"><a href="">삭제</a></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                    <td>친구네집</td>
                                    <td>홍길동</td>
                                    <td>010-9876-5432</td>
                                    <td class="address tx-left pl20">
                                        08812<br/>
                                        서울시 관악구 호암로 26길 13 세정빌딩 2층<br/>
                                        (관악구대학동 1514-6)
                                    </td>
                                    <td class="address w-buy">
                                        <div class="tBox NSK t1 black"><a href="">수정</a></div>
                                        <div class="tBox NSK t2 gray"><a href="">삭제</a></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- 배송 주소 리스트 -->
                <div id="AddModify" class="Layer-Cont Modify p_re" style="display: none">
                    <div class="address caution-txt">주소록은 최대 5개까지 등록 가능합니다. <span class="tx-light-blue f_right">(* 필수입력항목)</span></div>
                    <div class="couponWrap">
                        <table cellspacing="0" cellpadding="0" class="classTable deliveryTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 140px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                                <tr class="u-to">
                                    <td class="w-tit bg-light-white tx-left pl20">배송지<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20"><input type="text" id="LOCATION" name="LOCATION" class="iptLocation" maxlength="30"></td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">이름<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20"><input type="text" id="NAME" name="NAME" class="iptName" maxlength="30"></td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">주소<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20">
                                        <div class="inputBox Add p_re">
                                            <div class="searchadd">
                                                <input type="text" id="ADD1" name="ADD1" class="iptAdd" maxlength="30"> -
                                                <input type="text" id="ADD2" name="ADD2" class="iptAdd" maxlength="30">   
                                                <button type="submit" onclick="" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue" style="margin-left: 5px; margin-right: 5px;">
                                                    <span>우편번호 찾기</span>
                                                </button>
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
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">휴대폰번호<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20">
                                        <select id="phone" name="phone" title="010" class="selePhone">
                                            <option selected="selected">010</option>
                                            <option value="011">011</option>
                                            <option value="016">016</option>
                                            <option value="017">017</option>
                                            <option value="018">018</option>
                                        </select> -
                                        <input type="text" id="USER_CELLPHONE1" name="USER_CELLPHONE1" class="iptCellhone1 phone" maxlength="30"> -
                                        <input type="text" id="USER_CELLPHONE2" name="USER_CELLPHONE2" class="iptCellhone2 phone" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                                    <td class="w-info tx-left pl20">
                                        <select id="phone" name="phone" title="02" class="selePhone">
                                            <option selected="selected">02</option>
                                            <option value="031">031</option>
                                            <option value="032">032</option>
                                            <option value="033">033</option>
                                            <option value="041">041</option>
                                        </select> -
                                        <input type="text" id="USER_PHONE1" name="USER_PHONE1" class="iptPhone1 phone" maxlength="30"> -
                                        <input type="text" id="USER_PHONE2" name="USER_PHONE2" class="iptPhone2 phone" maxlength="30">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="p-info tx-gray c_both">
                            • 정확하지 않은 정보 기재 시, 불이익을 받을 수 있으니 유의하시기 바랍니다.<br/>
                            • 집 외의 공공장소 등 직접 수령이 어려운 장소로의 배송은 분실 위험이 있으니 주의하시기 바랍니다.
                        </div>  
                        <ul class="btnWrapbt">
                            <li class="subBtn NSK"><a href="#none">저장</a></li>
                            <li class="subBtn white NSK"><a href="#none" onclick="closeWin('AddModify'),openWin('AddList')">목록</a></li>
                        </ul> 
                    </div>
                </div>
                <!-- 배송 주소 수정 -->
            </div>
        </div>
        <!-- willbes-Layer-CartBox : 나의 배송 주소록 -->
    </form>
    </div>
    <div class="Quick-Bnr ml20 mt85">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
<script src="/public/js/post_util.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        // 배송메모 바이트수 계산
        $regi_form.find('input[name="delivery_memo"]').on('change keyup input', function() {
            var byte_cnt = fn_chk_byte($(this).val());
            if (byte_cnt > 10) {
                alert('배송 메시지 길이가 초과되었습니다.');
                $(this).val('');
                return;
            }
            $regi_form.find('#delivery_memo_byte').html(byte_cnt);
        });
    });
</script>
@stop