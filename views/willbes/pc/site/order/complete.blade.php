@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
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
                    @if($results['order']['IsVBank'] == 'Y')
                        <img src="{{ img_url('cart/icon_check.gif') }}"> 무통장입금(가상계좌) 신청이 완료되었습니다.
                        <div class="subTit tx-gray mt20 NGR">가상계좌는 신청일로부터 <strong class="tx-light-blue">{{ config_get('vbank_expire_days', '7') }}일간</strong>만 유효하며, 기간 내에 입금해 주셔야 정상적으로 결제완료됩니다.</div>
                    @else
                        <img src="{{ img_url('cart/icon_check.gif') }}"> 결제가 성공적으로 완료되었습니다.
                    @endif
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
                    @if($results['order']['IsVBank'] == 'Y')
                        <tr>
                            <td class="bg-light-white">가상계좌신청일</td>
                            <td>{{ $results['order']['OrderDatm'] }}</td>
                            <td class="bg-light-white">가상계좌정보</td>
                            <td>{{ $results['order']['VBankName'] }} {{ $results['order']['VBankAccountNo'] }} {{ config_get('vbank_account_name', '(주)윌비스') }}</td>
                        </tr>
                        <tr>
                            <td class="bg-light-white">입금기한</td>
                            <td><strong class="tx-light-blue">{{ $results['order']['VBankExpireDatm'] }}</strong></td>
                            <td class="bg-light-white">결제금액</td>
                            <td><strong class="tx-light-blue">{{ number_format($results['order']['RealPayPrice']) }}원</strong></td>
                        </tr>
                        <tr>
                            <td class="bg-light-white">주문번호</td>
                            <td><strong>{{ $results['order']['OrderNo'] }}</strong></td>
                            <td class="bg-light-white">{{--가상계좌취소--}}</td>
                            <td>
                                {{-- 가상계좌취소 기능 삭제
                                @if($results['order']['VBankStatus'] == 'O')
                                    <span class="btnAll NSK"><a href="#none" id="btn_vbank_cancel">취소</a></span>
                                @else
                                    {{ $results['order']['VBankCancelDatm'] }}
                                @endif
                                --}}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td class="bg-light-white">주문번호</td>
                            <td><strong>{{ $results['order']['OrderNo'] }}</strong></td>
                            <td class="bg-light-white">결제일</td>
                            <td>{{ $results['order']['CompleteDatm'] }}</td>
                        </tr>
                        <tr>
                            <td class="bg-light-white">결제금액</td>
                            <td><strong class="tx-light-blue">{{ number_format($results['order']['RealPayPrice']) }}원</strong></td>
                            <td class="bg-light-white">결제수단</td>
                            <td><strong class="tx-light-blue">{{ $results['order']['PayMethodCcdName'] }}</strong></td>
                        </tr>
                        <tr>
                            <td class="bg-light-white">영수증출력</td>
                            <td class="">
                                @if(isset($results['order']['ReceiptUrl']) === true)
                                    <span class="btnAll NSK"><a href="#none" id="btn_receipt_print">영수증출력하기</a></span>
                                @endif
                            </td>
                            <td class=""></td>
                            <td class=""></td>
                        </tr>
                    @endif
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
                                <div class="price tx-light-blue">{{ number_format($results['order']['OrderProdPrice']) }}원</div>
                            </dt>
                            <dt class="price-img">
                                <span class="row-line">|</span>
                                <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                            </dt>
                            <dt>
                                <div>쿠폰할인금액</div>
                                <div class="price tx-light-pink">{{ number_format($results['order']['DiscPrice']) }}원</div>
                            </dt>
                            <dt class="price-img">
                                <span class="row-line">|</span>
                                <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                            </dt>
                            <dt>
                                <div>포인트 차감금액</div>
                                <span class="price tx-light-pink">{{ number_format($results['order']['UsePoint']) }}원</span>
                            </dt>
                            <dt class="price-img">
                                <span class="row-line">|</span>
                                <img src="{{ img_url('sub/icon_plus.gif') }}">
                            </dt>
                            <dt>
                                <div>배송료</div>
                                <span class="price tx-light-blue">{{ number_format($results['order']['DeliveryPrice'] + $results['order']['DeliveryAddPrice']) }}원</span>
                            </dt>
                        </dl>
                    </li>
                    <li class="price-total">
                        <div>결제금액</div>
                        <span class="price tx-light-blue">{{ number_format($results['order']['RealPayPrice']) }}원</span>
                    </li>
                </ul>
            </div>
            <!-- willbes-Buylist-Price -->

            <div class="willbes-Cartlist-Fin c_both">
                <div class="willbes-Lec-Tit NG tx-black">상품정보</div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray tx-gray">
                        <colgroup>
                            <col>
                            <col style="width: 100px;">
                            <col style="width: 140px;">
                            <col style="width: 140px;">
                            <col style="width: 140px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>상품정보<span class="row-line">|</span></th>
                            <th>수강기간<span class="row-line">|</span></th>
                            <th>정가(할인율)<span class="row-line">|</span></th>
                            <th>실 결제금액<span class="row-line">|</span></th>
                            <th>사용쿠폰</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results['order_product'] as $idx => $row)
                            <tr>
                                <td class="w-list tx-left p_re pl20">
                                    <span class="pBox p{{ $arr_prod_type_idx[$row['OrderProdType']] }}">{{ $arr_prod_type_name[$row['OrderProdType']] }}</span> {{ $row['ProdName'] }}
                                </td>
                                <td class="w-day">@if(empty($row['StudyPeriod']) === false) {{ $row['StudyPeriod'] }}일 @endif</td>
                                <td>
                                    @if(ends_with($row['SalePatternCcd'], '001') === true)
                                        {{-- 정가(할인율), 판매형태가 일반일 경우만 노출 (재수강, 수강연장 제외) --}}
                                        {{ number_format($row['SalePrice']) }}원<br><span class="tx-light-blue">(↓{{ number_format($row['SaleRate']) . $row['SaleRateUnit'] }})</span>
                                    @endif
                                </td>
                                <td class="w-price tx-light-blue">{{ number_format($row['RealPayPrice']) }}원</td>
                                <td class="w-coupon">{{ $row['UseCoupon'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Cartlist-Fin -->

            <div class="willbes-Delivery-Info-Fin p_re c_both">
                @if($results['order']['IsDelivery'] == 'Y')
                    {{-- 배송정보가 있는 경우만 노출 --}}
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
                                    <th class="w-list" rowspan="5">받는사람<br/>정보</th>
                                    <td class="w-tit bg-light-white tx-left pl20">이름</td>
                                    <td class="w-info tx-left pl20">{{ $results['order_delivery']['Receiver'] }}</td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">주소</td>
                                    <td class="w-info tx-left pl20">
                                        [{{ $results['order_delivery']['ZipCode'] }}]<br/>
                                        {{ $results['order_delivery']['Addr1'] }}<br/>
                                        {{ $results['order_delivery']['Addr2'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">휴대폰번호</td>
                                    <td class="w-info tx-left pl20">{{ $results['order_delivery']['ReceiverPhone'] }}</td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                                    <td class="w-info tx-left pl20">{{ $results['order_delivery']['ReceiverTel'] }}</td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">배송시 요청사항</td>
                                    <td class="w-info tx-left pl20">{{ $results['order_delivery']['DeliveryMemo'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="mb60"></div>
                <div class="willbes-Lec-buyBtn">
                    <ul>
                        <li class="btnAuto180 h36">
                            <button type="button" name="btn_go_classroom" class="mem-Btn bg-white bd-dark-gray">
                                <span class="tx-purple-gray">내강의실 바로가기</span>
                            </button>
                        </li>
                        <li class="btnAuto180 h36">
                            <button type="button" name="btn_go_order_hist" class="mem-Btn bg-purple-gray bd-dark-gray">
                                <span>결제내역 바로가기</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- willbes-Delivery-Info-Fin -->
        </div>
        {!! banner('결제_우측퀵', 'Quick-Bnr ml20 mt85', $__cfg['SiteCode'], '0') !!}

    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            // 영수증 출력하기 버튼 클릭
            $('#btn_receipt_print').on('click', function() {
                popupOpen('{!! $results['order']['ReceiptUrl'] or '' !!}', '_receipt_print', 430, 700);
            });

            // 가상계좌취소 버튼 클릭
            $('#btn_vbank_cancel').on('click', function() {
                if (confirm('해당 가상계좌를 취소하시겠습니까?\n취소할 경우 해당 정보는 삭제 처리됩니다.')) {
                    var url = frontUrl('/payment/cancel');
                    var data = {
                        '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                        'order_no' : '{{ $results['order']['OrderNo'] }}'
                    };
                    sendAjax(url, data, function (ret) {
                        if (ret.ret_cd) {
                            alert(ret.ret_msg);
                            location.replace('{{ app_url('/classroom/order/index', 'www') }}');     // 내강의실 > 결제관리 > 주문/배송조회 페이지로 이동
                        }
                    }, showAlertError, false, 'POST');
                }
            });

            // 내강의실 바로가기 버튼 클릭
            $('button[name="btn_go_classroom"]').on('click', function() {
                location.replace('{{ app_url('/classroom/home/index', 'www') }}');
            });

            // 결제내역 바로가기 버튼 클릭
            $('button[name="btn_go_order_hist"]').on('click', function() {
                location.replace('{{ app_url('/classroom/order/index', 'www') }}');
            });
        });
    </script>
@stop