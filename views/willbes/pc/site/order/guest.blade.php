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
                            <tr><td>• 강좌시작일 설정은 결제일로부터 30일 범위 내로 설정 가능합니다. (일부 강좌 제외)</td></tr>
                            <tr><td>• 강좌시작일을 설정하지 않은 경우 결제일(무통장입금 결제수단의 경우 가상계좌 신청일)로부터 7일 후 강좌가 자동 시작됩니다.</td></tr>
                            <tr><td>• 개강일이 설정한 강좌시작일 이후 인 경우 해당 강좌시작일은 개강일로 자동 셋팅됩니다.</td></tr>
                            <tr><td>• 배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일제외)</td></tr>
                            {{--<tr><td class="pl10">- 단, 윌스토리(온라인서점)에서 구매한 경우 당일 결제한 배송 상품은 익일 발송 처리됩니다. (출고 후 1일~3일(72시간)내 수령)</td></tr>--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="LeclistTable">
                        <div class="willbes-Lec-Tit NG tx-black">
                            주문상품정보
                        </div>
                        <table cellspacing="0" cellpadding="0" class="listTable buyTable under-gray tx-gray">
                            <colgroup>
                                <col>
                                <col style="width: 60px;">
                                <col style="width: 130px;">
                                <col style="width: 130px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>상품정보<span class="row-line">|</span></th>
                                <th>수량<span class="row-line">|</span></th>
                                <th>정가(할인율)<span class="row-line">|</span></th>
                                <th>실 결제금액</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results['list'] as $idx => $row)
                                <tr id="cart_row_{{ $row['ProdCode'] }}">
                                    <td class="w-list tx-left pl20">
                                        <dl>
                                            <dt class="tit">
                                                <span class="pBox p{{ $row['CartProdTypeNum'] }}">{{ $row['CartProdTypeName'] }}</span>
                                                {{ $row['ProdAddInfo'] }}
                                                <strong>{{ $row['ProdName'] }}</strong>
                                                <input type="hidden" name="prod_code[]" value="{{ $row['ProdCode'] }}"/>
                                            </dt>
                                        </dl>
                                    </td>
                                    <td>{{ $row['CartProdType'] == 'book' ? $row['ProdQty'] : '' }}</td>
                                    <td class="w-buy-price">
                                        <dl>
                                            <dt>{{ number_format($row['SalePrice']) }}원</dt>
                                            <dt class="tx-light-blue">(↓{{ number_format($row['SaleRate']) . ($row['SaleDiscType'] == 'R' ? '%' : '원') }})</dt>
                                        </dl>
                                    </td>
                                    <td class="w-buy-price">
                                        <dl>
                                            <dt class="tx-light-blue"><span class="real-pay-price">{{ number_format($row['RealPayPrice']) }}</span>원</dt>
                                            <dt class="origin-price tx-gray d_none wrap-real-sale-price">(<span class="real-sale-price">{{ number_format($row['RealPayPrice']) }}</span>원)</dt>
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
                                <tr>
                                    <th class="w-list" rowspan="6">받는사람<br/>정보<br/><span class="tx-light-blue">(* 필수입력항목)</span></th>
                                    <td class="w-tit bg-light-white tx-left pl20">이름<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20 item"><input type="text" id="receiver" name="receiver" value="" title="이름" required="required" class="iptName" maxlength="30"></td>
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
                                    <td class="w-tit bg-light-white tx-left pl20">이메일<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20">
                                        <div class="inputBox p_re item">
                                            <input type="text" id="receiver_mail" name="receiver_mail" value="" title="이메일" required="required" class="iptAdd2" pattern="email" maxlength="100">
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
                        <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
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
                                        </dt>
                                        <dt>
                                            <div id="delivery_add_price_caution_txt" class="caution-txt"></div>
                                        </dt>
                                    </dl>
                                </td>
                            </tr>
                            @if($results['total_pay_price'] > 0)
                                {{-- 총결제금액이 0원 초과일 경우만 노출 --}}
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
                                            <dd id="pay_method_caution_txt_604001" class="pay-method-caution-txt" style="display: none;">
                                                <div class="strong tx-blue mb10">신용카드</div>
                                                <ul class="disc">
                                                    <li>카드사별 무이자할부 카드 정보는 결제창에서 확인하실 수 있습니다.</li>
                                                    <li>최종 결제승인 이전에 전자결제창을 닫지 마시기 바랍니다.</li>
                                                    <li>전자금융거래 기본법에 따라 결제금액이 30만원 이상일 경우 전자상거래법에 의해 발급된 공인인증서를 이용하여 본인
                                                        확인을 거쳐야 결제를 할 수 있습니다.</li>
                                                </ul>
                                            </dd>
                                            <dd id="pay_method_caution_txt_604002" class="pay-method-caution-txt" style="display: none;">
                                                <div class="strong tx-blue mb10">실시간 계좌이체</div>
                                                <ul class="disc">
                                                    <li>실시간 계좌이체 이용을 위해서는 보안 수단(보안카드, OTP)과 공인인증서가 필요합니다.</li>
                                                    <li>지정한 은행 계좌에서 결제 금액이 실시간으로 이체되며 결제 승인 후 바로 수강이 가능합니다.</li>
                                                    <li>현금 영수증은 입금이 완료되면 발행됩니다.</li>
                                                </ul>
                                            </dd>
                                            <dd id="pay_method_caution_txt_604003" class="pay-method-caution-txt" style="display: none;">
                                                <div class="strong tx-blue mb10">무통장입금(가상계좌)</div>
                                                <ul class="disc">
                                                    <li>주문 시마다 새로운 입금계좌번호가 생성됩니다.</li>
                                                    <li>상품을 나누어 주문하시는 경우 주문별로 생성되는 입금계좌로 각각 입금해 주세요.</li>
                                                    <li>입금 기한 내에 입금을 하지 않을 경우 주문이 자동으로 취소됩니다. 결제를 원할 시 재주문을 해주세요.</li>
                                                    <li>입금 후 15분 이내 입금 승인 처리되며, 현금 영수증은 입금이 완료되면 발행됩니다.</li>
                                                </ul>
                                            </dd>
                                        </dl>
                                    </td>
                                </tr>
                            @endif
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
                    <div class="willbes-Lec-Tit NG tx-black">개인정보 활용 및 환불정책 안내</div>
                    <div class="policyInfoTable GM">
                        <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 140px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
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
                                        윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.<br/><br/>
                                        <a href="javascript:;" onclick="popupOpen('{{app_url('/company/protect', 'www')}}', 'protect', '1000', '600', null, null, 'yes');" class="tx-blue">[윌비스 개인정보 취급방침 보기]</a>
                                    </div>
                                    <div class="chkBox">
                                        위 개인정보 활용 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                        <span class="chkBox-Agree item">
                                            <input type="checkbox" id="agree1" name="agree1" value="Y" title="개인정보 활용안내" required="required"/>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="chk">
                                <td class="w-list bg-light-white">환불정책 안내</td>
                                <td class="w-txt tx-left">
                                    <div class="txtBox">
                                        {{-- TODO : 임의 등록 --}}
                                        결제수단별 환불정책은 아래와 같습니다.<br/>
                                        <br/>
                                        신용카드 결제 시<br/>
                                        - 현금 환불은 불가능하며, 카드 취소만 가능합니다.<br/>
                                        - 당일 결제 후 당일 취소 시 바로 승인 취소됩니다.<br/>
                                        - 당일 결제 후 다음날 취소 시 카드사별로 2~3일 후에 승인 취소됩니다.<br/>
                                        <br/>
                                        무통장 입금 결제 시<br/>
                                        - 결제자가 제공한 계좌 정보로 환불됩니다.<br/>
                                        - 당일 결제 후 당일 환불하였더라도 은행별로 2~3일 후에 환불처리 됩니다.<br/>
                                        <br/>
                                        실시간 계좌이체 결제 시<br/>
                                        - 결제한 은행 계좌로 환불됩니다. <br/>
                                        - 당일 결제 후 당일 환불하였더라도 은행별로 2~3일 후에 환불처리 됩니다.<br/>
                                        <br/>
                                        ※ 전체 윌비스 환불 정책과 관련한 상세 사항은 이용약관의 ‘제 4장 서비스 환불’ 항목에서 확인해 주세요.<br/>
                                        <br/>
                                        <a href="javascript:;" onclick="popupOpen('{{app_url('/company/agreement', 'www')}}', 'agreement', '1000', '600', null, null, 'yes');" class="tx-blue">[윌비스 이용약관 보기]</a>
                                    </div>
                                    <div class="chkBox">
                                        위 환불정책 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                        <span class="chkBox-Agree item">
                                            <input type="checkbox" id="agree2" name="agree2" value="Y" title="환불정책 안내" required="required"/>
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
            // 결제금액 계산 및 표기
            $regi_form.on('change', '.chk_price', function() {
                var total_prod_order_price = parseInt('{{ $results['total_prod_order_price'] }}');      // 전체상품주문금액
                var delivery_price = parseInt('{{ $results['delivery_price'] }}');     // 배송료

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
                var total_pay_price = total_prod_order_price + delivery_price;

                // 금액표기
                $regi_form.find('#delivery_price').html(addComma(delivery_price));
                $regi_form.find('.total-pay-price').html(addComma(total_pay_price));

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
                    $regi_form.find('input[name="is_escrow"][value="N"]').prop('checked', true);
                }
            });

            // 결제수단 선택
            $regi_form.find('input[name="pay_method_ccd"]').on('click', function() {
                var code = $(this).val();

                // 에스크로 필드 노출 여부
                if ($regi_form.find('.willbes-Delivery-Info').length > 0) {
                    if (code === '604002' || code === '604003') {
                        $regi_form.find('#is_escrow').css('display', '');   // 실시간 계좌이체, 무통장입금(가상계좌) 일 경우
                    } else {
                        $regi_form.find('#is_escrow').css('display', 'none');
                        $regi_form.find('input[name="is_escrow"][value="N"]').prop('checked', true);
                    }
                }

                // 결제수단별 주의사항
                $regi_form.find('.pay-method-caution-txt').css('display', 'none');
                $regi_form.find('#pay_method_caution_txt_' + code).css('display', '');

                // 선택한 결제수단명 노출
                $regi_form.find('#pay_method_name').html('[' + $(this).data('pay-method-name') + ']');
            });
            $regi_form.find('input[name="pay_method_ccd"]:checked').trigger('click');

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
            $('button[name="btn_cart"]').on('click', function() {
                location.href = '{{ front_url('/cart/index') }}';
            });

            // 결제하기 버튼 클릭
            $('button[name="btn_pay"]').on('click', function() {
                var url = '{{ front_url('/guestOrder/request') }}';
                ajaxSubmit($regi_form, url, function(ret) {
                    if(ret.ret_cd) {
                        if (ret.ret_data.hasOwnProperty('ret_url') === true) {
                            if (ret.ret_msg !== '') {
                                alert(ret.ret_msg);
                            }
                            location.replace(ret.ret_data.ret_url);
                        } else {
                            {{-- 이전 결제폼 제거 --}}
                            if ($('#payment_layer').length > 0) {
                                $('#payment_layer').remove();
                                $('#payment_js').remove();
                            }
                            $('body').append(ret.ret_data);
                        }
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop