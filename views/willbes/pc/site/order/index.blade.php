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
                            <tr><td>• 해당 상품의 강좌시작일을 설정하지 않은 경우 결제일(무통장입금 결제수단의 경우 가상계좌 신청일)로부터 7일 후 강좌가 자동 시작됩니다.</td></tr>
                            <tr><td>• 해당 상품의 개강일이 설정한 강좌시작일 이후 인 경우 해당 강좌시작일은 개강일로 자동 셋팅됩니다.</td></tr>
                            <tr><td>• 배송 상품은 당일 오후 1시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일제외)</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="LeclistTable">
                        <div class="willbes-Lec-Tit NG tx-black">
                            주문상품정보
                            <ul>
                                <li class="subBtn NSK"><a href="{{ app_url('/classroom/point/index', 'www') }}" target="_blank">포인트 현황 ></a></li>
                                <li class="subBtn NSK"><a href="{{ app_url('/classroom/coupon/index', 'www') }}" target="_blank">쿠폰 현황 ></a></li>
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
                                                <input type="hidden" name="coupon_detail_idx[{{ $row['CartIdx'] }}]" value="" data-cart-idx="{{ $row['CartIdx'] }}" data-coupon-disc-price="0" class="chk_price chk_coupon"/>
                                                @if($row['IsCoupon'] == 'Y')
                                                    <span class="tBox NSK t1 black"><a href="#none" class="btn-coupon-apply" data-cart-idx="{{ $row['CartIdx'] }}">쿠폰적용</a></span>
                                                @endif
                                                @if($row['CartProdType'] == 'mock_exam')
                                                    {{-- 모의고사 응시정보 --}}
                                                    <span class="pBox p4 ml5"><a href="#none" class="btn-mock-exam-info" data-cart-idx="{{ $row['CartIdx'] }}">응시정보</a></span>
                                                @endif
                                            </dt>
                                            <dt>
                                                {{-- 온라인강좌일 경우만 강좌시작일 설정 --}}
                                                @if($row['CartType'] == 'on_lecture')
                                                    @if(empty($row['ExtenDay']) === false)
                                                        <span class="w-day">연장기간 : <span class="tx-blue">{{ $row['ExtenDay'] }}일</span></span>
                                                    @else
                                                        @if(empty($row['StudyPeriod']) === false)
                                                            <span class="w-day">수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span></span>
                                                        @endif
                                                    @endif
                                                    <span class="w-data">
                                                        [강좌시작일 설정]
                                                        {{-- 강좌시작일지정 여부 : Y, 결제일 이후부터 30일 이내 날짜로 설정 가능, 개강일 전이라면 개강일부터 30일 이내 설정 가능 --}}
                                                        {{-- 디폴트 설정 => 시작일자 : 결제일 + 8일, 종료일자 : 시작일자 + 수강기간 --}}
                                                        @if($row['IsLecStart'] == 'Y')
                                                            <input type="text" name="study_start_date[{{ $row['CartIdx'] }}]" class="iptDate datepicker btn-set-study-date" data-cart-idx="{{ $row['CartIdx'] }}" data-study-period="{{ $row['StudyPeriod'] }}" data-is-study-start-date="{{ $row['IsStudyStartDate'] }}" value="{{ $row['DefaultStudyStartDate'] }}" readonly="readonly"/>
                                                            <img src="{{ img_url('cart/icon_calendar.gif') }}"> ~
                                                            <input type="text" name="study_end_date[{{ $row['CartIdx'] }}]" class="iptDate bg-gray" value="{{ $row['DefaultStudyEndDate'] }}" readonly="readonly"/>
                                                        @else
                                                            @if(empty($row['ExtenDay']) === false)
                                                                <span class="tx-light-blue">연장 신청한 강좌의 기본 수강기간이 종료된 후 바로 수강 시작</span>
                                                            @else
                                                                <span class="tx-light-blue">결제완료 후 바로 수강 시작</span>
                                                            @endif
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
                                    <div class="price tx-light-blue">{{ number_format($results['total_prod_order_price']) }}원</div>
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
                                @if($results['is_available_use_point'] === true)
                                    {{-- 온라인강좌 패키지 포함 or 학원강좌일 경우 포인트 사용 불가 --}}
                                    <dt>
                                        <div>포인트 차감금액</div>
                                        <span class="price tx-light-pink"><span id="point_disc_price">0</span>원</span>
                                    </dt>
                                    <dt class="price-img">
                                        <span class="row-line">|</span>
                                        <img src="{{ img_url('sub/icon_plus.gif') }}">
                                    </dt>
                                @endif
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
                    @if($results['is_available_use_point'] === true)
                        {{-- 온라인강좌 패키지 포함 or 학원강좌일 경우 포인트 사용 불가 --}}
                        <div class="cart-PointBox NG">
                            <dl class="pointBox">
                                <dt class="p-tit"><span class="tx-blue">{{ $results['point_type_name'] }}</span> 포인트 사용</dt>
                                <dt>
                                    <span class="u-point tx-pink">{{ number_format($results['point']) }}P 보유</span>
                                    <span class="btnAll NSK"><a href="#none" id="btn-all-use-point">전액사용</a></span>
                                    <input type="text" name="use_point" title="사용포인트" class="iptPoint chk_price" required="required" pattern="numeric" data-validate-minmax="-1" value="0" maxlength="10"> P 차감
                                </dt>
                            </dl>
                        </div>
                        <div class="p-info tx-gray c_both">
                            • {{ $results['point_type_name'] }} 포인트는 <span class="tx-light-blue">{{ number_format(config_item('use_min_point')) }}P</span> 부터
                            <span class="tx-light-blue">{{ config_item('use_point_unit') }}P</span> 단위로 <!--사용 가능하며,
                            주문금액의 <span class="tx-light-blue">{{ config_item('use_max_point_rate') }}%</span>까지만--> 사용 가능합니다.
                            @if($cart_type == 'book')
                                {{-- 교재상품 구매일 경우 배송료 안내문구 노출 --}}
                                ({{ number_format(config_app('DeliveryFreePrice')) }}원 이상 교재 구매 시 무료 배송)
                            @endif
                            <p class="pt10">• 포인트를 사용하여 결제할 경우 포인트가 적립되지 않습니다.</p>
                        </div>
                    @endif
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
                                                <input type="text" id="zipcode" name="zipcode" title="우편번호" required="required" readonly="readonly" class="iptAdd bg-gray chk_price" maxlength="6">
                                                <button type="button" onclick="searchPost('SearchPost', 'zipcode', 'addr1', 'Y');" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue" style="margin-left: 5px; margin-right: 5px;">
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
                                            <select id="receiver_phone1" name="receiver_phone1" title="휴대폰번호1" required="required" class="selePhone">
                                                <option value="">선택</option>
                                                @foreach($arr_phone1_ccd as $key => $val)
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endforeach
                                            </select> -
                                            <input type="text" id="receiver_phone2" name="receiver_phone2" title="휴대폰번호2" required="required" class="iptCellhone1 phone" maxlength="4"> -
                                            <input type="text" id="receiver_phone3" name="receiver_phone3" title="휴대폰번소3" required="required" class="iptCellhone2 phone" maxlength="4">
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
                                            @if($results['cart_type'] != 'off_lecture')
                                                {{-- 학원강좌일 경우 포인트 적립 불가 --}}
                                                <span class="w-point">적립예정포인트: <span class="tx-light-blue"><span id="total_save_point">{{ number_format($results['total_save_point']) }}</span>원</span></span>
                                            @endif
                                        </dt>
                                        <dt>
                                            <div id="delivery_add_price_caution_txt" class="caution-txt"></div>
                                        </dt>
                                    </dl>
                                </td>
                            </tr>
                            <tr id="pay_method">
                                <td class="w-list bg-light-white">결제수단</td>
                                <td class="w-buyinfo tx-left pl25">
                                    <dl>
                                        <dt>
                                            <ul class="item">
                                                @foreach($arr_pay_method_ccd as $key => $val)
                                                    <li><input type="radio" name="pay_method_ccd" value="{{ $key }}" data-pay-method-name="{{ $val }}" @if($loop->index == 1) title="결제수단" required="required" checked="checked" @endif/><label>{{ $val }}</label></li>
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
                            <tr class="chk">
                                <td class="w-list bg-light-white">유의사항 안내</td>
                                <td class="w-txt tx-left">
                                    <div class="txtBox">
                                        {{-- TODO : 임의 등록 --}}
                                        신용카드 결제 시<br/>
                                        - 최종 결제승인 이전에 전자결제창을 닫지 마시기 바랍니다.<br/>
                                        - 전자금융거래 기본법에 따라 결제금액이 30만원 이상일 경우 전자상거래법에 의해 발급된 공인인증서를 이용하여<br/>
                                        본인 확인을 거쳐야 결제를 할 수 있습니다.<br/><br/>
                                        무통장 입금 결제 시<br/>
                                        - 주문시마다 새로운 입금계좌번호가 생성됩니다.<br/>
                                        - 상품을 나누어 주문하시는 경우 주문별로 생성되는 입금계좌로 각각 입금하여 주십시오.<br/>
                                        - 입금기한 내에 입금을 하지 않을 경우, 생성된 입금계좌는 자동으로 사라집니다. 결제를 원할 시, 재주문을 해주시기 바랍니다.<br/>
                                        - 수강료 입금 후(15분 이내) 입금 승인처리 되며, 현금 영수증은 입금이 완료 되면 발행됩니다.<br/><br/>
                                        실시간 계좌이체 결제 시<br/>
                                        - 인터넷 뱅킹 사용 여부와 상관없이 공인인증서가 있어야 결제가 가능합니다.<br/>
                                        - 지정하신 은행계좌에서 결제 금액이 실시간으로 이체되며 결제 승인 후 바로 수강이 가능합니다.<br/>
                                        - 현금 영수증은 입금이 완료되면 발행됩니다.<br/>
                                    </div>
                                    <div class="chkBox">
                                        위 유의사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                        <span class="chkBox-Agree item">
                                        <input type="checkbox" id="agree1" name="agree1" value="Y" title="유의사항 안내" required="required"/>
                                    </span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="chk">
                                <td class="w-list bg-light-white">개인정보 활용안내</td>
                                <td class="w-txt tx-left">
                                    <div class="txtBox">
                                        {{-- TODO : 임의 등록 --}}
                                        윌비스는 고객의 개인정보보호를 소중하게 생각하고, 고객의 개인정보를 보호하기 위하여 항상 최선을 다해 노력하고 있습니다.<br/>
                                        윌비스는 개인정보보호 관련 주요 법률인「정보통신망 이용촉진 및 정보보호 등에 관한 법률」을 비롯한 모든 개인정보보호 관련 법률을 준수하고 있습니다.<br/>
                                        또한, 윌비스는「개인정보처리방침」을 제정하여 이를 준수하고 있으며, 윌비스의「개인정보처리방침」을 홈페이지에 공개하여 고객이 언제나 용이하게 열람할 수 있도록 하고 있습니다.<br/>
                                        윌비스의「개인정보처리방침」은 관련 법률 및 지침의 변경 또는 내부 운영 방침의 변경에 따라 변경될 수 있습니다.<br/>
                                        윌비스의「개인정보처리방침」이 변경될 경우 변경된 사항을 홈페이지를 통하여 공지합니다.<br/>
                                        윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.
                                    </div>
                                    <div class="chkBox">
                                        위 개인정보 활용 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                        <span class="chkBox-Agree item">
                                        <input type="checkbox" id="agree2" name="agree2" value="Y" title="개인정보 활용안내" required="required"/>
                                    </span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="chk">
                                <td class="w-list bg-light-white">환불정책 안내</td>
                                <td class="w-txt tx-left">
                                    <div class="txtBox">
                                        {{-- TODO : 임의 등록 --}}
                                        무통장입금(가상계좌) 또는 실시간 계좌이체<br/>
                                        - 고객의 계좌로 송금하여 환불 해 드립니다.<br/>
                                        - 단, 귀책사유가 본 사이트에게 있을 때는 온라인 수수료를 당사에서, 귀책사유가 고객님에게 있을 경우는 택배비 및 수수료를 뺀 나머지 금액을 환불 해 드립니다.<br/><br/>
                                        신용카드 결제 시<br/>
                                        - 신용카드 결제자 : 카드취소<br/>
                                        - 신용카드 환불 시 : 현금 환불은 불가능하며, 카드취소만 가능합니다.<br/>
                                        - 카드결제 취소 시 총 소요시간은 14일 정도 입니다.<br/>
                                        -  카드승인 취소 조치 당일가능 → 카드 결제 대행사 (통합 LG 텔레콤 1주소요) → 해당 카드사(1주소요)<br/>
                                        - 단, 귀책사유가 본 사이트에게 있을 때는 신용카드 수수료 및 택배비를 당사에서, 귀책사유가 고객님에게 있을 경우에는 수수료 및 택배비를 부담 해 주셔야 합니다.
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
                        <div class="AllchkBox chk tx-gray">
                            위 유의사항, 개인정보활용, 환불정책안내사항을 모두 읽었으면 동의합니다. <span class="tx-blue">(전체동의)</span>
                            <span class="chkBox-Agree">
                                <input type="checkbox" id="agree_all" name="agree_all" value="Y"/>
                            </span>
                        </div>
                    </div>
                    <div class="willbes-Lec-buyBtn">
                        <ul>
                            <li class="btnAuto180 h36">
                            @if($results['cart_type'] != 'off_lecture')
                                {{-- 학원강좌일 경우 장바구니가기 버튼 노출 안함 --}}
                                <button type="button" name="btn_cart" class="mem-Btn bg-white bd-dark-blue">
                                    <span class="tx-light-blue">장바구니가기</span>
                                </button>
                            @endif
                            </li>
                            <li class="btnAuto180 h36">
                                <button type="submit" id="btn_pay" name="btn_pay" data-is-clicked="" class="mem-Btn bg-blue bd-dark-blue">
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
            <div id="MockExam" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs"></div>
            <!-- willbes-Layer-CartBox : 모의고사 응시정보 -->
        </div>
        {!! banner('결제_우측퀵', 'Quick-Bnr ml20 mt85', $__cfg['SiteCode'], '0') !!}

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
                    , cart_idx = $(this).data('cart-idx')
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
                $regi_form.find('input[name="study_end_date[' + cart_idx + ']"]').val(moment(selected_date).add(study_days - 1, 'days').format('YYYY-MM-DD'));
            });

            // 모의고사 응시정보 버튼 클릭
            $regi_form.on('click', '.btn-mock-exam-info', function() {
                var cart_idx = $(this).data('cart-idx');
                var ele_id = 'MockExam';
                var data = { 'ele_id' : ele_id };

                sendAjax('{{ front_url('/mockTest/apply_cart_modal/') }}' + cart_idx, data, function(ret) {
                    $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                }, showAlertError, false, 'GET', 'html');
            });

            // 쿠폰적용 버튼 클릭
            $regi_form.on('click', '.btn-coupon-apply', function() {
                var $use_point = $regi_form.find('input[name="use_point"]');
                if ($use_point.length > 0 && parseInt($use_point.val()) > 0) {
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

                sendAjax('{{ front_url('/myCoupon/') }}', data, function(ret) {
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
                var has_point = parseInt('{{ $results['point'] }}');     // 보유 포인트
                var $use_point = $regi_form.find('input[name="use_point"]');
                $use_point.val(has_point).trigger('change').trigger('blur');
            });

            // 포인트 사용
            $regi_form.on('blur', 'input[name="use_point"]', function() {
                var use_point = parseInt($(this).val()) || 0;
                if (use_point < 1) {
                    return;
                }

                var coupon_detail_idx = {};
                $regi_form.find('.chk_coupon').each(function(idx) {
                    coupon_detail_idx[$(this).data('cart-idx')] = $(this).val();
                });

                // 사용포인트 체크
                var is_check = false;
                var url = '{{ front_url('/order/checkUsePoint') }}';
                var data = {
                    '{{ csrf_token_name() }}': $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'cart_type' : '{{ $results['cart_type'] }}',
                    'use_point' : use_point,
                    'coupon_detail_idx' : JSON.stringify(coupon_detail_idx)
                };
                sendAjax(url, data, function (ret) {
                    if (ret.ret_cd) {
                        if (ret.ret_data.is_check === true) {
                            is_check = true;
                        } else {
                            alert(ret.ret_data.is_check);
                        }
                    }
                }, showValidateError, false, 'POST');

                if (is_check === false) {
                    $regi_form.find('input[name="use_point"]').val('').trigger('change');
                }
            });

            // 결제금액 계산 및 표기
            $regi_form.on('change', '.chk_price', function() {
                var total_prod_order_price = parseInt('{{ $results['total_prod_order_price'] }}');      // 전체상품주문금액
                var delivery_price = parseInt('{{ $results['delivery_price'] }}');     // 배송료
                var point_disc_price = parseInt($regi_form.find('input[name="use_point"]').val()) || 0;        // 포인트 사용금액

                // 쿠폰할인금액 계산
                var total_coupon_disc_price = 0;
                $regi_form.find('.chk_coupon').each(function() {
                    total_coupon_disc_price += parseInt($(this).data('coupon-disc-price'));
                });

                // 추가 배송료 계산
                var delivery_add_price = 0;
                if (delivery_price > 0) {
                    var zipcode = $regi_form.find('input[name="zipcode"]').val().substr(0, 2);
                    var chk_zipcode = '{{ implode(',', config_item('delivery_add_price_charge_zipcode')) }}';
                    var caution_txt = '';

                    $.each(chk_zipcode.split(','), function(k, v) {
                        if (v === zipcode) {
                            delivery_add_price = parseInt('{{ $__cfg['DeliveryAddPrice'] }}');
                            caution_txt = '회원님께서는 <span class="tx-red">도서산간, 제주도 배송지 대상자로 배송료 ' + addComma(delivery_add_price) + '원이 추가</span>로 적용 되었습니다.';
                            return false;
                        }
                    });

                    $regi_form.find('#delivery_add_price_caution_txt').html(caution_txt);
                }

                // 배송료 + 추가 배송료
                delivery_price = delivery_price + delivery_add_price;

                // 실제결제금액
                var total_pay_price = total_prod_order_price - total_coupon_disc_price - point_disc_price + delivery_price;

                // 금액표기
                $regi_form.find('#total_coupon_disc_price').html(addComma(total_coupon_disc_price));
                $regi_form.find('#point_disc_price').html(addComma(point_disc_price));
                $regi_form.find('#delivery_price').html(addComma(delivery_price));
                $regi_form.find('.total-pay-price').html(addComma(total_pay_price));

                // 적립포인트 계산
                if (point_disc_price > 0 || total_coupon_disc_price > 0) {
                    // 포인트, 쿠폰을 사용한 경우 적립포인트 없음
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

                // 총결제금액에 따른 결제수단 표시 여부
                if (total_pay_price > 0) {
                    $regi_form.find('#pay_method').css('display', '');
                    $regi_form.find('input[name="pay_method_ccd"]').prop('disabled', false);
                    $regi_form.find('input[name="pay_method_ccd"]:eq(0)').prop('checked', true).trigger('click');
                } else {
                    $regi_form.find('#pay_method').css('display', 'none');
                    $regi_form.find('#pay_method_name').html('');
                    $regi_form.find('input[name="pay_method_ccd"]').prop('disabled', true);
                    $regi_form.find('#is_escrow').css('display', 'none');
                }
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

            // 나의 배송 주소록 버튼 클릭
            $regi_form.on('click', '#btn_my_addr_list', function() {
                var ele_id = 'MyAddress';
                var data = { 'ele_id' : ele_id };
                sendAjax('{{ front_url('/myDeliveryAddress/') }}', data, function(ret) {
                    $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                }, showAlertError, false, 'GET', 'html');
            });

            // 나의 배송 주소록 등록하기 버튼 클릭
            $regi_form.on('click', '#btn_my_addr_regist', function() {
                if (confirm('입력한 주소를 나의 배송 주소록에 등록하시겠습니까?')) {
                    var url = '{{ front_url('/myDeliveryAddress/store') }}';
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
                    $regi_form.find('input[name="receiver_tel"]').val('{{ $results['member']['Tel'] }}');
                    $regi_form.find('select[name="receiver_tel1"]').val('{{ $results['member']['Tel1'] }}');
                    $regi_form.find('input[name="receiver_tel2"]').val('{{ $results['member']['Tel2'] }}');
                    $regi_form.find('input[name="receiver_tel3"]').val('{{ $results['member']['Tel3'] }}');
                } else if (addr_type === 'R') {
                    var data = {
                        '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method' : 'POST'
                    };
                    sendAjax('{{ front_url('/order/recentDeliveryAddress') }}', data, function(ret) {
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

                // 추가 배송료 추가 여부 확인을 위해 이벤트 발생
                $regi_form.find('input[name="zipcode"]').trigger('change');
            });

            // 배송 주소지 관련 로드 이벤트 발생
            if ($regi_form.find('input[name="zipcode"]').length > 0) {
                // 배송 주소지 디폴트 셋팅
                $regi_form.find('input[name="addr_type"]:checked').trigger('click');
            }

            // 배송메모 바이트수 계산
            $regi_form.find('input[name="delivery_memo"]').on('change keyup input', function() {
                var byte_cnt = fn_chk_byte($(this).val());
                if (byte_cnt > 120) {
                    alert('배송 메시지 길이가 초과되었습니다.');
                    $(this).val('');
                    return;
                }
                $regi_form.find('#delivery_memo_byte').html(byte_cnt);
            });

            // 장바구니 가기 버튼 클릭
            $('button[name="btn_cart"]').on('click', function () {
                location.href = '{{ front_url('/cart/index') }}';
            });

            // 결제하기 버튼 클릭
            $('button[name="btn_pay"]').on('click', function () {
                /*// 중복클릭 방지
                var btn_pay = document.getElementById('btn_pay');
                if (btn_pay) {
                    if (btn_pay.getAttribute('data-is-clicked') === 'Y') {
                        return;
                    }
                    btn_pay.setAttribute('data-is-clicked', 'Y');
                }*/

                var url = '{{ front_url('/payment/request') }}';
                ajaxSubmit($regi_form, url, function(ret) {
                    if(ret.ret_cd) {
                        if (ret.ret_data.hasOwnProperty('ret_url') === true) {
                            if (ret.ret_msg !== '') {
                                alert(ret.ret_msg);
                            }
                            location.replace(ret.ret_data.ret_url);
                        } else {
                            $('body').append(ret.ret_data);
                        }
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop