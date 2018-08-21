@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Content p_re">
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="cart_type" value="{{ $results['cart_type'] }}"/>
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
                        <tr><td>• 해당 상품의 개강일이 설정한 강좌시작일 이후 인 경우 해당 강좌시작일은 개강일로 자동 셋팅됩니다.</td></tr>
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
                            <tr id="cart_row_{{ $row['CartIdx'] }}">
                                <td class="w-list tx-left pl20">
                                    <dl>
                                        <dt class="tit">
                                            <span class="pBox p{{ $row['CartProdTypeNum'] }}">{{ $row['CartProdTypeName'] }}</span>
                                            {{ $row['ProdName'] }}
                                            <input type="hidden" name="cart_idx[]" value="{{ $row['CartIdx'] }}" data-real-sale-price="{{ $row['RealSalePrice'] }}" data-is-point="{{ $row['IsPoint'] }}" data-save-point-price="{{ $row['PointSavePrice'] }}" data-save-point-type="{{ $row['PointSaveType'] }}"/>
                                            <input type="hidden" name="coupon_detail_idx[{{ $row['CartIdx'] }}]" value="" data-coupon-disc-price="0" class="chk_price chk_coupon"/>
                                            @if($row['IsCoupon'] == 'Y')
                                                <span class="tBox NSK t1 black"><a href="#none" class="btn-coupon-apply" data-cart-idx="{{ $row['CartIdx'] }}">쿠폰적용</a></span>
                                            @endif
                                        </dt>
                                        <dt>
                                            @if($row['CartProdType'] != 'book')
                                                <span class="w-day">수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span></span>
                                                <span class="w-data">
                                                    [강좌시작일 설정]
                                                    {{-- 강좌시작일지정 여부 : Y, 결제일 이후부터 30일 이내 날짜로 설정 가능, 개강일 전이라면 개강일부터 30일 이내 설정 가능 --}}
                                                    {{-- 디폴트 설정 => 시작일자 : 결제일 + 8일, 종료일자 : 시작일자 + 수강기간 --}}
                                                    @if($row['IsLecStart'] == 'Y')
                                                        <input type="text" name="study_start_date[{{ $row['CartIdx'] }}]" class="iptDate datepicker btn-set-study-date" data-study-period="{{ $row['StudyPeriod'] }}" data-is-study-start-date="{{ $row['IsStudyStartDate'] }}" value="{{ $row['DefaultStudyStartDate'] }}" readonly="readonly"/>
                                                        <img src="{{ img_url('cart/icon_calendar.gif') }}"> ~
                                                        <input type="text" name="study_end_date[{{ $row['CartIdx'] }}]" class="iptDate bg-gray" value="{{ $row['DefaultStudyEndDate'] }}" readonly="readonly"/>
                                                    @else
                                                        <span class="tx-light-blue">결제완료 후 바로 수강 시작</span>
                                                    @endif
                                                </span>
                                            @endif
                                            @if($row['IsCoupon'] == 'Y')
                                                <span class="w-coupon d_none wrap-coupon"><span class="coupon-name"></span>
                                                    (<span class="tx-blue"><span class="coupon-disc-price">0</span>원 할인</span>)
                                                    <a href="#none" class="btn-coupon-apply-delete" data-cart-idx="{{ $row['CartIdx'] }}"><img src="{{ img_url('cart/close.png') }}"></a>
                                                </span>
                                            @endif
                                        </dt>
                                    </dl>
                                </td>
                                <td class="w-buy-price">
                                    <dl>
                                        <dt class="tx-light-blue"><span class="real-pay-price">{{ number_format($row['RealSalePrice']) }}</span>원</dt>
                                        <dt class="origin-price tx-gray d_none wrap-real-sale-price">(<span class="real-sale-price">{{ number_format($row['RealSalePrice']) }}</span>원)</dt>
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
                            <div class="price tx-light-blue">{{ number_format($results['total_order_price']) }}원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>쿠폰할인금액</div>
                            <div class="price tx-light-pink"><span id="total_coupon_disc_price">0</span>원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>포인트 차감금액</div>
                            <span class="price tx-light-pink"><span id="point_disc_price">0</span>원</span>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                        </dt>
                        <dt>
                            <div>배송료</div>
                            <span class="price tx-light-blue"><span id="delivery_price">{{ number_format($results['delivery_price']) }}</span>원</span>
                        </dt>
                    </dl>
                </li>
                <li class="price-total">
                    <div>결제예상금액</div>
                    <span class="price tx-light-blue"><span class="total-pay-price">{{ number_format($results['total_pay_price']) }}</span>원</span>
                </li>
            </ul>
            <div class="cart-PointBox NG">
                <dl class="pointBox">
                    <dt class="p-tit"><span class="tx-blue">{{ $results['cart_type_name'] }}</span> 포인트 사용</dt>
                    <dt>
                        <span class="u-point tx-pink">{{ number_format($results['point'][$results['cart_type']]) }}P 보유</span>
                        <span class="btnAll NSK"><a href="#none" id="btn-all-use-point">전액사용</a></span>
                        <input type="text" name="use_point" class="iptPoint chk_price optional" pattern="numeric" data-validate-minmax="0" value="" placeholder="0" maxlength="10"> P 차감
                    </dt>
                </dl>
            </div>
            <div class="p-info tx-gray c_both">
                • {{ $results['cart_type_name'] }} 포인트는 <span class="tx-light-blue">{{ number_format(config_item('use_min_point')) }}P</span> 부터
                    <span class="tx-light-blue">{{ config_item('use_point_unit') }}P</span> 단위로 사용 가능하며,
                    주문금액의 <span class="tx-light-blue">{{ config_item('use_max_point_rate') }}%</span>까지만 사용 가능합니다.
            </div>
        </div>
        <!-- willbes-Cart-Price -->
        @if($results['is_delivery_info'] === true)
        {{-- 여부배송정보 : Y --}}
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
                                    <li><input type="radio" name="addr_type" value="E" checked="checked" class=""/><label>구매자 정보와 동일</label></li>
                                    <li><input type="radio" name="addr_type" value="R" class=""/><label>최근 배송지</label></li>
                                    <li><input type="radio" name="addr_type" value="D" class=""/><label>직접입력</label></li>
                                    <li><span class="btnAll NSK"><a href="#none" id="btn_my_addr_list">나의 배송 주소록</a></span></li>
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
                                        <span class="btnAdd underline"><a href="#none" id="btn_my_addr_regist">[나의 배송 주소록에 등록하기]</a></span>
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
                                        <input type="text" id="addr1" name="addr1" title="기본주소" required="required" readonly="readonly" class="iptAdd1 bg-gray" placeholder="기본주소" maxlength="30">
                                    </div>
                                    <div class="addbox2 p_re item">
                                        <input type="text" id="addr2" name="addr2" title="상세주소" required="required" class="iptAdd2" placeholder="상세주소" maxlength="30">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">
                                <div class="item multi">
                                    <select id="receiver_phone1" name="receiver_phone1" title="휴대폰번호1" class="selePhone">
                                        <option value="">선택</option>
                                        @foreach($arr_phone1_ccd as $key => $val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select> -
                                    <input type="text" id="receiver_phone2" name="receiver_phone2" title="휴대폰번호2" class="iptCellhone1 phone" maxlength="4"> -
                                    <input type="text" id="receiver_phone3" name="receiver_phone3" title="휴대폰번소3" class="iptCellhone2 phone" maxlength="4">
                                    <input type="hidden" id="receiver_phone" name="receiver_phone" title="휴대폰번호" required="required" pattern="phone"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                            <td class="w-info tx-left pl20">
                                <div class="item multi">
                                    <select id="receiver_tel1" name="receiver_tel1" title="전화번호1" class="selePhone">
                                        <option value="">선택</option>
                                        @foreach($arr_tel1_ccd as $key => $val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select> -
                                    <input type="text" id="receiver_tel2" name="receiver_tel2" title="전화번호2" class="iptPhone1 phone" maxlength="4"> -
                                    <input type="text" id="receiver_tel3" name="receiver_tel3" title="전화번호3" class="iptPhone2 phone" maxlength="4">
                                    <input type="hidden" id="receiver_tel" name="receiver_tel" title="전화번호" pattern="tel" class="optional"/>
                                </div>
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
        @endif
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
                                        <span class="t-price tx-light-blue NGEB"><span class="total-pay-price">{{ number_format($results['total_pay_price']) }}</span>원</span>
                                        <span id="pay_method_name"></span>
                                        <span class="w-point">적립예정포인트: <span class="tx-light-blue"><span id="total_save_point">{{ number_format($results['total_save_point']) }}</span>원</span></span>
                                    </dt>
                                    <dt>
                                        <div class="caution-txt">회원님께서는 <span class="tx-red">도서산간, 제주도 배송지 대상자로 배송료 {{ number_format(config_app('DeliveryAddPrice')) }}원이 추가</span>로 적용 되었습니다.</div>
                                    </dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">결제수단</td>
                            <td class="w-buyinfo tx-left pl25">
                                <dl>
                                    <dt>
                                        <ul class="item">
                                        @foreach(explode(',', $__cfg['PayMethodCcdArr']) as $idx => $val)
                                            <li><input type="radio" name="pay_method_ccd" value="{{ str_first_pos_before($val, ':') }}" data-pay-method-name="{{ str_first_pos_after($val, ':') }}" @if($idx == 0) title="결제수단" required="required" checked="checked" @endif/><label>{{ str_first_pos_after($val, ':') }}</label></li>
                                        @endforeach
                                        </ul>
                                    </dt>
                                    <dt><div id="pay_method_caution_txt" class="caution-txt"></div></dt>
                                </dl>
                            </td>
                        </tr>
                        @if($results['is_delivery_info'] === true)
                        {{-- 여부배송정보 : Y, 결제수단이 실시간 계좌이체, 무통장입금(가상계좌) 일 경우 --}}
                        <tr id="is_escrow" style="display: none;">
                            <td class="w-list bg-light-white">에스크로<br/>사용여부</td>
                            <td class="w-buyinfo tx-left pl25">
                                <dl>
                                    <dt>
                                        <ul>
                                            <li><input type="radio" name="is_escrow" value="Y" class=""/><label>사용</label></li>
                                            <li><input type="radio" name="is_escrow" value="N" class="" checked="checked"/><label>미사용</label></li>
                                        </ul>
                                    </dt>
                                    <dt><div class="caution-txt">[에스크로란?] 회원님께서 결제하신 금액을 에스크로업체에서 예치하고 있다가 상품이 회원님께 소중히 전달된 후 판매자에게 지불되는 방식</div></dt>
                                </dl>
                            </td>
                        </tr>
                        @endif
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
                                    <span class="chkBox-Agree item">
                                        <input type="checkbox" id="agree1" name="agree1" value="Y" title="유의사항 안내" required="required"/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">개인정보 활용안내</td>
                            <td class="w-txt tx-left">
                                <div class="txtBox">
                                    개인정보활용1<br/>
                                </div>
                                <div class="chkBox">
                                    위 개인정보 활용 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                    <span class="chkBox-Agree item">
                                        <input type="checkbox" id="agree2" name="agree2" value="Y" title="개인정보 활용안내" required="required"/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">환불정책 안내</td>
                            <td class="w-txt tx-left">
                                <div class="txtBox">
                                    환불정책1<br/>
                                </div>
                                <div class="chkBox">
                                    위 환불정책 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                    <span class="chkBox-Agree item">
                                        <input type="checkbox" id="agree3" name="agree3" value="Y" title="환불정책 안내" required="required"/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="AllchkBox tx-gray">
                    위 유의사항, 개인정보활용, 환불정책안내사항을 모두 읽었으면 동의합니다. <span class="tx-blue">(전체동의)</span>
                    <span class="chkBox-Agree">
                        <input type="checkbox" id="agree_all" name="agree_all" value="Y"/>
                    </span>
                </div>
            </div>
            <div class="willbes-Lec-buyBtn">
                <div class="btnAgree NG"><input type="checkbox" name="agree_always" value="Y"/><label>앞으로 결제 시 항상 동의하기</label></div>
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="button" name="btn_cart" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">장바구니가기</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" name="btn_pay" class="mem-Btn bg-blue bd-dark-blue">
                            <span>결제하기</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-PolicyInfo -->
    </form>
        <div id="Coupon" class="willbes-Layer-Black"></div>
        <!-- willbes-Layer-CartBox : Coupon -->
        <div id="MyAddress" class="willbes-Layer-Black"></div>
        <!-- willbes-Layer-CartBox : 나의 배송 주소록 -->
    </div>
    <div class="Quick-Bnr ml20 mt85">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
<script src="/public/js/post_util.js"></script>
<script src="/public/vendor/validator/multifield.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        // 강좌종료일 설정
        $regi_form.on('change keyup input', '.btn-set-study-date', function() {
            var default_date = $(this).prop('defaultValue')
                , selected_date = $(this).val()
                , event_idx = $(this).index('.btn-set-study-date')
                , study_days = $(this).data('study-period')
                , is_study_start_date = $(this).data('is-study-start-date')
                , base_date = moment().format('YYYY-MM-DD')
                , after30_date = moment().add(29, 'days').format('YYYY-MM-DD')
                , text_date = '결제일';

            if (is_study_start_date === 'N') {
                // 개강일이 결제일 이후 일 경우
                base_date = default_date;
                after30_date = moment(base_date).add(29, 'days').format('YYYY-MM-DD');
                text_date = '개강일';
            }

            if (base_date > selected_date || after30_date < selected_date) {
                alert('강좌시작일은 ' + text_date + ' 이후부터 30일 이내의 날짜여야만 합니다.');
                $(this).datepicker('update', default_date);
                return;
            }

            // 강좌종료일 설정
            $regi_form.find('input[name="study_end_date[]"]').eq(event_idx).val(moment(selected_date).add(study_days - 1, 'days').format('YYYY-MM-DD'));
        });

        // 쿠폰적용 버튼 클릭
        $regi_form.on('click', '.btn-coupon-apply', function() {
            var $use_point = $regi_form.find('input[name="use_point"]');
            if (parseInt($use_point.val()) > 0) {
                alert('이미 적용하신 포인트는 쿠폰 적용 후 재 적용해 주십시오.');
                $use_point.val('').trigger('change');
            }

            var ele_id = 'Coupon';
            var coupon_detail_idx = {};
            $regi_form.find('.chk_coupon').each(function(idx) {
                if ($(this).val().length > 0) {
                    coupon_detail_idx[idx] = $(this).val();
                }
            });
            var data = { 'ele_id' : ele_id, 'cart_idx' : $(this).data('cart-idx'), 'coupon_detail_idx' : JSON.stringify(coupon_detail_idx) };

            sendAjax('{{ site_url('/myCoupon/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });

        // 쿠폰적용 삭제버튼 클릭
        $regi_form.on('click', '.btn-coupon-apply-delete', function() {
            if (confirm('해당 쿠폰을 삭제하시겠습니까?')) {
                var cart_idx = $(this).data('cart-idx');
                var $cart_row = $regi_form.find('#cart_row_' + cart_idx);

                $cart_row.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').data('coupon-disc-price', 0);
                $cart_row.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').val('').trigger('change');
                $cart_row.find('.wrap-coupon').removeClass('d_block').addClass('d_none');
                $cart_row.find('.wrap-real-sale-price').removeClass('d_block').addClass('d_none');
                $cart_row.find('.coupon-name').html('');
                $cart_row.find('.coupon-disc-price').html('0');
                $cart_row.find('.real-pay-price').html(addComma($cart_row.find('input[name="cart_idx[]"]').data('real-sale-price')));

                alert('삭제 되었습니다.');
            }
        });

        // 포인트 전액사용 버튼 클릭
        $regi_form.on('click', '#btn-all-use-point', function() {
            var has_point = parseInt('{{ $results['point'][$results['cart_type']] }}');     // 보유 포인트
            var $use_point = $regi_form.find('input[name="use_point"]');
            $use_point.val(has_point).trigger('change').trigger('blur');
        });

        // 포인트 사용
        $regi_form.on('blur', 'input[name="use_point"]', function() {
            var use_point = parseInt($(this).val()) || 0;
            if (use_point < 1) {
                return;
            }

/*            // 사용포인트 체크
            var url = '{{ site_url('/order/checkUsePoint') }}';
            var data = {
                '{{ csrf_token_name() }}': $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'POST',
                'cart_type' : '{{ $results['cart_type'] }}',
                'use_point' : use_point,
                'total_prod_pay_price' : parseInt('{{ $results['total_order_price'] }}') - parseInt($regi_form.find('#total_coupon_disc_price').html().replace(/,/g, '')),
                'is_on_package' : '{{ $results['is_on_package'] === true ? 'Y' : 'N' }}'
            };
            sendAjax(url, data, function (ret) {
                if (ret.ret_cd) {
                    if (ret.ret_data.is_check !== true) {
                        alert(ret.ret_data.is_check);
                        $regi_form.find('input[name="use_point"]').val('').trigger('change');
                    }
                }
            }, showValidateError, false, 'POST');*/
        });

        // 결제금액 계산 및 표기
        $regi_form.on('change', '.chk_price', function() {
            var total_order_price = parseInt('{{ $results['total_order_price'] }}');      // 전체상품주문금액
            var delivery_price = parseInt('{{ $results['delivery_price'] }}');     // 배송료
            var point_disc_price = parseInt($regi_form.find('input[name="use_point"]').val()) || 0;        // 포인트 사용금액
            var total_coupon_disc_price = 0;      // 쿠폰할인금액
            $regi_form.find('.chk_coupon').each(function() {
                total_coupon_disc_price += parseInt($(this).data('coupon-disc-price'));
            });
            var total_pay_price = total_order_price - total_coupon_disc_price - point_disc_price + delivery_price;  // 실제결제금액

            // 금액표기
            $regi_form.find('#total_coupon_disc_price').html(addComma(total_coupon_disc_price));
            $regi_form.find('#point_disc_price').html(addComma(point_disc_price));
            $regi_form.find('#delivery_price').html(addComma(delivery_price));
            $regi_form.find('.total-pay-price').html(addComma(total_pay_price));

            // 적립포인트 계산
            if (point_disc_price > 0) {
                // 포인트를 사용한 경우 적립포인트 없음
                $regi_form.find('#total_save_point').html('0');
            } else {
                var cart_data = {}, cart_idx, real_pay_price, total_save_point = 0;

                $regi_form.find('input[name="cart_idx[]"]').each(function() {
                    cart_idx = $(this).val();
                    cart_data = $(this).data();
                    real_pay_price = cart_data.realSalePrice - parseInt($regi_form.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').data('coupon-disc-price'));

                    if (cart_data.isPoint === 'Y') {
                        total_save_point += cart_data.savePointType === 'R' ? parseInt(real_pay_price * (cart_data.savePointPrice / 100), 10) : cart_data.savePointPrice;
                    }
                });

                $regi_form.find('#total_save_point').html(addComma(total_save_point));
            }
        });

        // 나의 배송 주소록 버튼 클릭
        $regi_form.on('click', '#btn_my_addr_list', function() {
            var ele_id = 'MyAddress';
            var data = { 'ele_id' : ele_id };
            sendAjax('{{ site_url('/myDeliveryAddress/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });

        // 나의 배송 주소록 등록하기 버튼 클릭
        $regi_form.on('click', '#btn_my_addr_regist', function() {
            if (confirm('입력한 주소를 나의 배송 주소록에 등록하시겠습니까?')) {
                var url = '{{ site_url('/myDeliveryAddress/store') }}';
                var data = {
                    '{{ csrf_token_name() }}': $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'addr_name' : '입력주소',
                    'receiver' : $regi_form.find('input[name="receiver"]').val(),
                    'receiver_phone' : $regi_form.find('input[name="receiver_phone"]').val(),
                    'receiver_phone1' : $regi_form.find('select[name="receiver_phone1"]').val(),
                    'receiver_phone2' : $regi_form.find('input[name="receiver_phone2"]').val(),
                    'receiver_phone3' : $regi_form.find('input[name="receiver_phone3"]').val(),
                    'receiver_tel' : $regi_form.find('input[name="receiver_tel"]').val(),
                    'receiver_tel1' : $regi_form.find('select[name="receiver_tel1"]').val(),
                    'receiver_tel2' : $regi_form.find('input[name="receiver_tel2"]').val(),
                    'receiver_tel3' : $regi_form.find('input[name="receiver_tel3"]').val(),
                    'zipcode' : $regi_form.find('input[name="zipcode"]').val(),
                    'addr1' : $regi_form.find('input[name="addr1"]').val(),
                    'addr2' : $regi_form.find('input[name="addr2"]').val()
                };
                sendAjax(url, data, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                    }
                }, showValidateError, false, 'POST');
            }
        });

        // 배송 주소지 선택
        $regi_form.find('input[name="addr_type"]').on('click', function() {
            var addr_type = $(this).val();

            if (addr_type === 'E') {
                $regi_form.find('input[name="receiver"]').val('{{ $results['member']['MemName'] }}');
                $regi_form.find('input[name="zipcode"]').val('{{ $results['member']['ZipCode'] }}');
                $regi_form.find('input[name="addr1"]').val('{{ $results['member']['Addr1'] }}');
                $regi_form.find('input[name="addr2"]').val('{{ $results['member']['Addr2'] }}');
                $regi_form.find('input[name="receiver_phone"]').val('{{ $results['member']['Phone'] }}');
                $regi_form.find('select[name="receiver_phone1"]').val('{{ $results['member']['Phone1'] }}');
                $regi_form.find('input[name="receiver_phone2"]').val('{{ $results['member']['Phone2'] }}');
                $regi_form.find('input[name="receiver_phone3"]').val('{{ $results['member']['Phone3'] }}');
            } else if (addr_type === 'R') {
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST'
                };
                sendAjax('{{ site_url('/order/recentDeliveryAddress') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        if (ret.ret_data.length < 1) {
                            alert('최근 배송지 정보가 없습니다.');
                            return;
                        }
                        $regi_form.find('input[name="receiver"]').val(ret.ret_data.Receiver);
                        $regi_form.find('input[name="zipcode"]').val(ret.ret_data.ZipCode);
                        $regi_form.find('input[name="addr1"]').val(ret.ret_data.Addr1);
                        $regi_form.find('input[name="addr2"]').val(ret.ret_data.Addr2);
                        $regi_form.find('input[name="receiver_phone"]').val(ret.ret_data.ReceiverPhone);
                        $regi_form.find('select[name="receiver_phone1"]').val(ret.ret_data.ReceiverPhone1);
                        $regi_form.find('input[name="receiver_phone2"]').val(ret.ret_data.ReceiverPhone2);
                        $regi_form.find('input[name="receiver_phone3"]').val(ret.ret_data.ReceiverPhone3);
                        $regi_form.find('input[name="receiver_tel"]').val(ret.ret_data.ReceiverTel);
                        $regi_form.find('select[name="receiver_tel1"]').val(ret.ret_data.ReceiverTel1);
                        $regi_form.find('input[name="receiver_tel2"]').val(ret.ret_data.ReceiverTel2);
                        $regi_form.find('input[name="receiver_tel3"]').val(ret.ret_data.ReceiverTel3);
                        $regi_form.find('input[name="delivery_memo"]').val(ret.ret_data.DeliveryMemo);
                    }
                }, showAlertError, false, 'POST');
            } else {
                $regi_form.find('input[name="receiver"]').val('');
                $regi_form.find('input[name="zipcode"]').val('');
                $regi_form.find('input[name="addr1"]').val('');
                $regi_form.find('input[name="addr2"]').val('');
                $regi_form.find('input[name="receiver_phone"]').val('');
                $regi_form.find('select[name="receiver_phone1"]').val('');
                $regi_form.find('input[name="receiver_phone2"]').val('');
                $regi_form.find('input[name="receiver_phone3"]').val('');
                $regi_form.find('input[name="receiver_tel"]').val('');
                $regi_form.find('select[name="receiver_tel1"]').val('');
                $regi_form.find('input[name="receiver_tel2"]').val('');
                $regi_form.find('input[name="receiver_tel3"]').val('');
            }
        });
        $regi_form.find('input[name="addr_type"]:checked').trigger('click');

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

        // 결제수단 선택
        $regi_form.find('input[name="pay_method_ccd"]').on('click', function() {
            var code = $(this).val();
            var caution_txt = '';

            // 에스크로 필드 노출 여부
            if ($regi_form.find('.willbes-Delivery-Info').length > 0) {
                if (code === '604002' || code === '604003') {
                    $regi_form.find('#is_escrow').css('display', '');   // 실시간 계좌이체, 무통장입금(가상계좌) 일 경우
                } else {
                    $regi_form.find('#is_escrow').css('display', 'none');
                }
            }

            // 결제수단별 주의사항
            if (code === '604001') {
                caution_txt = '카드사별 무이자할부 카드 정보는 결제창에서 확인하실 수 있습니다.';
            }
            $regi_form.find('#pay_method_caution_txt').html(caution_txt);

            // 선택한 결제수단명 노출
            $regi_form.find('#pay_method_name').html('[' + $(this).data('pay-method-name') + ']');
        });
        $regi_form.find('input[name="pay_method_ccd"]:checked').trigger('click');

        // 장바구니 가기 버튼 클릭
        $('button[name="btn_cart"]').on('click', function () {
            location.href = '{{ site_url('/cart/index/cate/' . $__cfg['CateCode']) }}';
        });

        // 결제하기 버튼 클릭
        $('button[name="btn_pay"]').on('click', function () {
            var url = '{{ site_url('/payment/request/cate/' . $__cfg['CateCode']) }}';
            ajaxSubmit($regi_form, url, function(ret) {
                if(ret.ret_cd) {
                    $('body').append(ret.ret_data);
                }
            }, showValidateError, null, false, 'alert');
        });
    });
</script>
@stop