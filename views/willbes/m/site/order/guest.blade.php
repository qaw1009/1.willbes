@extends('willbes.m.layouts.master')

@section('page_title', '결제하기')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div class="paymentWrap">
        <ul class="paymentTxt NGR">
            <li>강좌시작일 설정은 결제일로부터 30일 범위 내로 설정 가능합니다. (일부 강좌 제외)</li>
            <li>강좌시작일을 설정하지 않은 경우 결제일(무통장입금 결제수단의 경우 가상계좌 신청일)로부터 7일 후 강좌가 자동 시작됩니다.</li>
            <li>개강일이 설정한 강좌시작일 이후 인 경우 해당 강좌시작일은 개강일로 자동 셋팅됩니다.</li>
            <li>배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일제외){{--<br/>
                - 단, 윌스토리(온라인서점)에서 구매한 경우 당일 결제한 배송 상품은 익일 발송 처리됩니다. (출고 후 1일~3일(72시간)내 수령)--}}
            </li>
        </ul>

        <div class="paymentCts">
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="cart_type" value="{{ $results['cart_type'] }}"/>
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                주문정보
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            {{-- 주문상품 --}}
                            @foreach($results['list'] as $idx => $row)
                                <ul class="payLecList" id="cart_row_{{ $row['ProdCode'] }}">
                                    <li><span>{{ $row['CartProdTypeName'] }}</span></li>
                                    <li>
                                        {{ $row['ProdName'] }}
                                        <input type="hidden" name="prod_code[]" value="{{ $row['ProdCode'] }}"/>
                                    </li>
                                    <li>
                                        <strong>수량</strong>
                                        <span class="tx-blue">{{ $row['CartProdType'] == 'book' ? $row['ProdQty'] : '' }}</span>
                                    </li>
                                    <li>
                                        <strong>정가(할인율)</strong>
                                        <span class="tx-blue">{{ number_format($row['SalePrice']) }}원
                                        (↓{{ number_format($row['SaleRate']) . ($row['SaleDiscType'] == 'R' ? '%' : '원') }})</span>
                                    </li>
                                    <li>
                                        <strong>실 결제금액</strong>
                                        <span class="tx-blue">
                                            <span class="real-pay-price">{{ number_format($row['RealPayPrice']) }}</span>원
                                        </span>
                                        <span class="line-through wrap-real-sale-price d_none">
                                            (<span class="real-sale-price">{{ number_format($row['RealPayPrice']) }}</span>원)
                                        </span>
                                    </li>
                                </ul>
                            @endforeach
                            </td>
                        </tr>
                    {{-- 구매자/배송정보 (배송정보여부가 Y일 경우만 노출) --}}
                    @if($results['is_delivery_info'] === true)
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                배송정보
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left" colspan="2">
                                <div class="buyerInfo mt-zero">
                                    <table>
                                        <col width="85px"/>
                                        <col width=""/>
                                        <tr>
                                            <th scope="row">이름</th>
                                            <td class="item"><input type="text" id="receiver" name="receiver" value="" title="이름" required="required" maxlength="30" style="width:120px"/></td>
                                        </tr>
                                        <tr>
                                            <th rowspan="3" scope="row">주소</th>
                                            <td class="item">
                                                <input type="text" id="zipcode" name="zipcode" title="우편번호" required="required" readonly="readonly" class="chk_price bg-gray" maxlength="6" style="width:120px"/>
                                                <a href="#none" id="btn_search_post" class="findaddress">주소찾기</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="item"><input type="text" id="addr1" name="addr1" title="기본주소" required="required" readonly="readonly" class="bg-gray" maxlength="30" style="width:100%"/></td>
                                        </tr>
                                        <tr>
                                            <td class="item"><input type="text" id="addr2" name="addr2" title="상세주소" required="required" maxlength="30" style="width:100%"/></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">이메일</th>
                                            <td class="item"><input type="text" id="receiver_mail" name="receiver_mail" value="" title="이메일" required="required" pattern="email" maxlength="100" style="width:100%"/></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">휴대폰번호</th>
                                            <td>
                                                <div class="item multi">
                                                    <select id="receiver_phone1" name="receiver_phone1" title="휴대폰번호1" required="required">
                                                        <option value="">선택</option>
                                                        @foreach($arr_phone1_ccd as $key => $val)
                                                            <option value="{{ $key }}">{{ $val }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" id="receiver_phone2" name="receiver_phone2" title="휴대폰번호2" required="required" maxlength="4" style="width:60px"/>
                                                    <input type="text" id="receiver_phone3" name="receiver_phone3" title="휴대폰번소3" required="required" maxlength="4" style="width:60px"/>
                                                    <input type="hidden" id="receiver_phone" name="receiver_phone" title="휴대폰번호" required="required" pattern="phone"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">전화</th>
                                            <td>
                                                <div class="item multi">
                                                    <select id="receiver_tel1" name="receiver_tel1" title="전화번호1">
                                                        <option value="">선택</option>
                                                        @foreach($arr_tel1_ccd as $key => $val)
                                                            <option value="{{ $key }}">{{ $val }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" id="receiver_tel2" name="receiver_tel2" title="전화번호2" maxlength="4" style="width:60px"/>
                                                    <input type="text" id="receiver_tel3" name="receiver_tel3" title="전화번호3" maxlength="4" style="width:60px"/>
                                                    <input type="hidden" id="receiver_tel" name="receiver_tel" title="전화번호" pattern="tel" class="optional"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">배송요청사항</th>
                                            <td><input type="text" id="delivery_memo" name="delivery_memo" maxlength="60" style="width:100%" placeholder="배송 메시지를 입력해주세요."/></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endif
                        <tr class="replyList willbes-Open-Table">
                            <td>
                                총 결제금액
                                <span class="tx-blue f_right"><span class="total-pay-price">{{ number_format($results['total_pay_price']) }}</span>원</span>
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left" colspan="2">
                                <div class="priceBox">
                                    <ul>
                                        <li>
                                            <strong>상품주문금액</strong>
                                            <span>{{ number_format($results['total_prod_order_price']) }}원</span>
                                        </li>
                                        <li>
                                            <strong>배송료</strong>
                                            <span><span id="delivery_price">{{ number_format($results['delivery_price']) }}</span>원</span>
                                        </li>
                                        <li class="NGEB">
                                            <strong>결제예상금액</strong>
                                            <span class="tx-blue"><span class="total-pay-price">{{ number_format($results['total_pay_price']) }}</span>원</span>
                                        </li>
                                    </ul>
                                    <p id="delivery_add_price_caution_txt" class="mt10"></p>
                                </div>
                            </td>
                        </tr>
                    {{-- 총결제금액이 0원 초과일 경우만 노출 --}}
                    @if($results['total_pay_price'] > 0)
                        <tr class="pay-method replyList willbes-Open-Table">
                            <td>
                                결제수단
                            </td>
                            <td class="MoreBtn tx-center">></td>
                        </tr>
                        <tr class="pay-method">
                            <td class="w-data tx-left" colspan="2">
                                <ul class="method">
                                    @foreach($arr_pay_method_ccd as $key => $val)
                                        <li>
                                            <label for="pay_method_ccd_{{ $key }}" class="ml-zero">
                                                <input type="radio" id="pay_method_ccd_{{ $key }}" name="pay_method_ccd" value="{{ $key }}" @if($loop->index == 1) title="결제수단" required="required" checked="checked" @endif/>
                                                {{ str_replace_array(['(간편결제)', '실시간', '(가상계좌)'], '', $val) }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                                <div id="pay_method_caution_txt_604001" class="pay-method-caution-txt" style="display: none;">
                                    <div class="strong tx-blue">신용카드</div>
                                    <ul class="paymentTxt pd_all_none bd-none">
                                        <li>카드사별 무이자할부 카드 정보는 결제창에서 확인하실 수 있습니다.</li>
                                        <li>최종 결제승인 이전에 전자결제창을 닫지 마시기 바랍니다.</li>
                                        <li>전자금융거래 기본법에 따라 결제금액이 30만원 이상일 경우 전자상거래법에 의해 발급된 공인인증서를 이용하여 본인
                                            확인을 거쳐야 결제를 할 수 있습니다.</li>
                                    </ul>
                                </div>
                                <div id="pay_method_caution_txt_604002" class="pay-method-caution-txt" style="display: none;">
                                    <div class="strong tx-blue">실시간 계좌이체</div>
                                    <ul class="paymentTxt pd_all_none bd-none">
                                        <li>실시간 계좌이체 이용을 위해서는 보안 수단(보안카드, OTP)과 공인인증서가 필요합니다.</li>
                                        <li>지정한 은행 계좌에서 결제 금액이 실시간으로 이체되며 결제 승인 후 바로 수강이 가능합니다.</li>
                                        <li>현금 영수증은 입금이 완료되면 발행됩니다.</li>
                                    </ul>
                                </div>
                                <div id="pay_method_caution_txt_604003" class="pay-method-caution-txt" style="display: none;">
                                    <div class="strong tx-blue">무통장입금(가상계좌)</div>
                                    <ul class="paymentTxt pd_all_none bd-none">
                                        <li>주문 시마다 새로운 입금계좌번호가 생성됩니다.</li>
                                        <li>상품을 나누어 주문하시는 경우 주문별로 생성되는 입금계좌로 각각 입금해 주세요.</li>
                                        <li>입금 기한 내에 입금을 하지 않을 경우 주문이 자동으로 취소됩니다. 결제를 원할 시 재주문을 해주세요.</li>
                                        <li>입금 후 15분 이내 입금 승인 처리되며, 현금 영수증은 입금이 완료되면 발행됩니다.</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <div class="policyInfo">
                    <ul>
                        <li class="tx16">
                            <div class="AllchkBox chk">
                                전체동의
                                <span class="chkBox-Agree">
                                    <input type="checkbox" id="agree_all" name="agree_all" value="Y"/>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="chkBox chk">
                                <p>개인정보 활용 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span> <span class="MoreBtn tx-center">▼</span></p>
                                <span class="chkBox-Agree item">
                                    <input type="checkbox" id="agree1" name="agree1" value="Y" title="개인정보 활용안내" required="required"/>
                                </span>
                            </div>
                            <div class="txtBox NGR">
                                {{-- TODO : 임의 등록 --}}
                                윌비스는 고객의 개인정보보호를 소중하게 생각하고, 고객의 개인정보를 보호하기 위하여 항상 최선을 다해 노력하고 있습니다.<br/>
                                윌비스는 개인정보보호 관련 주요 법률인「정보통신망 이용촉진 및 정보보호 등에 관한 법률」을 비롯한 모든 개인정보보호 관련 법률을 준수하고 있습니다.<br/>
                                또한, 윌비스는「개인정보처리방침」을 제정하여 이를 준수하고 있으며, 윌비스의「개인정보처리방침」을 홈페이지에 공개하여 고객이 언제나 용이하게 열람할 수 있도록 하고 있습니다.<br/>
                                윌비스의「개인정보처리방침」은 관련 법률 및 지침의 변경 또는 내부 운영 방침의 변경에 따라 변경될 수 있습니다.<br/>
                                윌비스의「개인정보처리방침」이 변경될 경우 변경된 사항을 홈페이지를 통하여 공지합니다.<br/>
                                윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.<br/><br/>
                                <a href="javascript:;" onclick="popupOpen('{{app_url('/company/protect', 'www')}}', 'protect', '1000', '600', null, null, 'yes');" class="tx-blue">[윌비스 개인정보 취급방침 보기]</a>
                            </div>
                        </li>
                        <li>
                            <div class="chkBox chk">
                                <p>환불정책 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span> <span class="MoreBtn tx-center">▼</span></p>
                                <span class="chkBox-Agree item">
                                    <input type="checkbox" id="agree2" name="agree2" value="Y" title="환불정책 안내" required="required"/>
                                </span>
                            </div>
                            <div class="txtBox NGR">
                                {{-- TODO : 임의 등록 --}}
                                결제수단별 환불정책은 아래와 같습니다.<br/>
                                <br/>
                                <strong>신용카드 결제 시</strong><br/>
                                - 현금 환불은 불가능하며, 카드 취소만 가능합니다.<br/>
                                - 당일 결제 후 당일 취소 시 바로 승인 취소됩니다.<br/>
                                - 당일 결제 후 다음날 취소 시 카드사별로 2~3일 후에 승인 취소됩니다.<br/>
                                <br/>
                                <strong>무통장 입금 결제 시</strong><br/>
                                - 결제자가 제공한 계좌 정보로 환불됩니다.<br/>
                                - 당일 결제 후 당일 환불하였더라도 은행별로 2~3일 후에 환불처리 됩니다.<br/>
                                <br/>
                                <strong>실시간 계좌이체 결제 시</strong><br/>
                                - 결제한 은행 계좌로 환불됩니다. <br/>
                                - 당일 결제 후 당일 환불하였더라도 은행별로 2~3일 후에 환불처리 됩니다.<br/>
                                <br/>
                                ※ 전체 윌비스 환불 정책과 관련한 상세 사항은 이용약관의 ‘제 4장 서비스 환불’ 항목에서 확인해 주세요.<br/>
                                <br/>
                                <a href="javascript:;" onclick="popupOpen('{{app_url('/company/agreement', 'www')}}', 'agreement', '1000', '600', null, null, 'yes');" class="tx-blue">[윌비스 이용약관 보기]</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="lec-btns w100p">
                    <ul>
                        <li><a href="#none" id="btn_pay" class="btn-purple">결제하기</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')

    {{--우편번호찾기--}}
    <div id="SearchPostWrap" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h470 fix">
            <a class="closeBtn" href="#none" onclick="closeSearchPost('SearchPostWrap');">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>
                우편번호 찾기
            </h4>
            <div class="bdt-gray"></div>
            <div id="SearchPost"></div>
        </div>
        <div class="dim" onclick="closeSearchPost('SearchPostWrap')"></div>
    </div>
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
                        caution_txt = '※ 회원님께서는 <span class="tx-red">도서산간, 제주도 배송지 대상자로 배송료 ' + addComma(delivery_add_price) + '원이 추가</span>로 적용 되었습니다.';
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

            // 총결제금액에 따른 결제수단 표시 여부 (수정 => 결제수단 선택자 변경, 결제수단 변경 이벤트 발생 삭제, 결제수단명 표기 삭제)
            if (total_pay_price > 0) {
                $regi_form.find('.pay-method').css('display', '');
                $regi_form.find('input[name="pay_method_ccd"]').prop('disabled', false);
            } else {
                $regi_form.find('.pay-method').css('display', 'none');
                $regi_form.find('input[name="pay_method_ccd"]').prop('disabled', true);
            }
        });

        // 결제수단 선택
        $regi_form.find('input[name="pay_method_ccd"]').on('click', function() {
            var code = $(this).val();

            // 결제수단별 주의사항
            $regi_form.find('.pay-method-caution-txt').css('display', 'none');
            $regi_form.find('#pay_method_caution_txt_' + code).css('display', '');
        });
        $regi_form.find('input[name="pay_method_ccd"]:checked').trigger('click');

        // 주소찾기 버튼 클릭
        $regi_form.on('click', '#btn_search_post', function() {
            var width = 550;
            var wrap_width = $('.paymentWrap').width();
            if(wrap_width != null && typeof wrap_width != 'undefined' && wrap_width < 668) {
                width = wrap_width - (wrap_width * 0.1) - 48;   // 화면너비 - 화면너비 10% - 레이어 padding값
            }

            searchPost('SearchPost', 'zipcode', 'addr1', 'Y', width, '370', 'SearchPostWrap');
        });

        // 결제하기 버튼 클릭
        $('#btn_pay').on('click', function() {
            var url = '{{ front_url('/guestOrder/request') }}';
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