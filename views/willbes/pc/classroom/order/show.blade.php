@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Delivery-Info c_both">
                <div class="willbes-Lec-Tit NG tx-black pt-zero">결제정보</div>
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
                            <td><strong class="tx-light-blue">{{ empty($results['order']['PayMethodCcd']) === false ? $results['order']['PayMethodCcdName'] : $results['order']['PayRouteCcdName'] }}</strong></td>
                        </tr>
                    @endif

                    @if(isset($results['order']['ReceiptUrl']) === true)
                        <tr>
                            <td class="bg-light-white">영수증출력</td>
                            <td class=""><span class="btnAll NSK"><a href="#none" id="btn_receipt_print">영수증출력하기</a></span></td>
                            <td class=""></td>
                            <td class=""></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- willbes-Delivery-Info -->

            <div class="willbes-Buylist-Price Fin mt30 p_re">
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
                        <div>최종결제금액</div>
                        <span class="price tx-light-blue">{{ number_format($results['order']['RealPayPrice']) }}원</span>
                    </li>
                </ul>
            </div>
            <!-- willbes-Buylist-Price -->

            <div class="willbes-Cartlist-Fin c_both">
                <div class="willbes-Lec-Tit NG tx-black">상품정보</div>
                <div class="LeclistTable orderTable">
                    <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray tx-gray">
                        <colgroup>
                            <col>
                            <col style="width: 80px;">
                            <col style="width: 100px;">
                            <col style="width: 120px;">
                            <col style="width: 100px;">
                            <col style="width: 100px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>상품정보<span class="row-line">|</span></th>
                            <th>수강기간<span class="row-line">|</span></th>
                            <th>정가(할인율)<span class="row-line">|</span></th>
                            <th>실 결제금액<span class="row-line">|</span></th>
                            <th>사용쿠폰<span class="row-line">|</span></th>
                            <th>주문/배송상태</th>
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
                                <td>
                                    @if($row['DeliveryStatusCcd'] == $arr_delivery_status_ccd['prepare'] || $row['DeliveryStatusCcd'] == $arr_delivery_status_ccd['complete'])
                                        {{ $row['DeliveryStatusCcdName'] }}<br/>
                                        <div class="tBox NSK light-gray"><a href="{{ $row['DeliverySearchUrl'] }}" target="_blank">배송조회</a></div>
                                    @else
                                        {{ $row['PayStatusCcdName'] }}
                                    @endif
                                </td>
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
                                        <div class="tx-light-blue mt10">
                                            * 송장번호가 이미 등록되었거나, 주문/배송상태가 ‘발송완료’인 경우 배송지 수정이 불가능합니다.<br>
                                            * 교재 배송 관련 문의 : 1544-4944
                                        </div>
                                        <div class="searchadd mt10">
                                            <button type="button" name="btn_show_addr_modify" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue">
                                                <span>배송지 수정</span>
                                            </button>
                                        </div>
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
                    {{-- 배송지 정보수정 레이어 팝업 --}}
                    @if($results['order_delivery']['IsModifiable'] === true)
                    <div id="DeliveryAddress" class="willbes-Layer-Black">
                        <div class="willbes-Layer-CartBox">
                            <a class="closeBtn" href="#none" onclick="closeWin('DeliveryAddress')">
                                <img src="{{ img_url('cart/close_cart.png') }}">
                            </a>
                            <div class="Layer-Tit NG bg-blue">배송지 수정</div>
                            <div class="Layer-Cont Modify p_re">
                                <div class="couponWrap">
                                    <form id="regi_addr_form" name="regi_addr_form" method="POST" onsubmit="return false;" novalidate>
                                        {!! csrf_field() !!}
                                        {!! method_field('PUT') !!}
                                        <input type="hidden" name="order_idx" value="{{ $results['order']['OrderIdx'] }}"/>
                                        <input type="hidden" name="receiver" value="{{ $results['order_delivery']['Receiver'] }}"/>
                                        <table cellspacing="0" cellpadding="0" class="classTable deliveryTable under-gray tx-gray">
                                            <tbody>
                                            <tr class="u-to">
                                                <td class="w-info tx-left">
                                                    <div class="inputBox Add p_re">
                                                        <div class="searchadd">
                                                            <input type="text" id="zipcode" name="zipcode" value="{{ $results['order_delivery']['ZipCode'] }}" title="우편번호" required="required" readonly="readonly" class="iptAdd bg-gray" maxlength="6"/>
                                                            <button type="submit" onclick="searchPost('SearchPost', 'zipcode', 'addr1', 'N');" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue ml5 mr5">
                                                                <span>우편번호 찾기</span>
                                                            </button>
                                                        </div>
                                                        <div id="SearchPost" style="max-height: 286px; max-width: 688px; display: none;">
                                                            <div class="Layer-Tit Layer-Tit2 NG bg-heavy-gray">우편번호 검색
                                                                <a href="#none" onclick="closeSearchPost('SearchPost');">
                                                                    <img src="{{ img_url('sub/icon_delete.gif') }}">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="addbox1 p_re">
                                                            <input type="text" id="addr1" name="addr1" value="{{ $results['order_delivery']['Addr1'] }}" title="기본주소" required="required" readonly="readonly" class="iptAdd1 bg-gray" placeholder="기본주소" maxlength="30"/>
                                                        </div>
                                                        <div class="addbox2 p_re">
                                                            <input type="text" id="addr2" name="addr2" value="{{ $results['order_delivery']['Addr2'] }}" title="상세주소" required="required" class="iptAdd2" placeholder="상세주소" maxlength="30"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <ul class="btnWrapbt mt30">
                                            <li class="subBtn NSK"><a href="#none" class="btn-addr-modify">수정</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- 배송 주소 수정 -->
                        </div>
                    </div>
                    @endif
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
                                <span>주문/배송 조회목록</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- willbes-Delivery-Info-Fin -->
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
    <script src="/public/js/post_util.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // 영수증 출력하기 버튼 클릭
            $('#btn_receipt_print').on('click', function() {
                popupOpen('{!! $results['order']['ReceiptUrl'] or '' !!}', '_receipt_print', 430, 700);
            });

            // 가상계좌취소 버튼 클릭
            $('#btn_vbank_cancel').on('click', function() {
                if (confirm('해당 가상계좌를 취소하시겠습니까?\n취소할 경우 해당 정보는 삭제 처리됩니다.')) {
                    var url = '{{ site_url('/payment/cancel') }}';
                    var data = {
                        '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                        'order_no' : '{{ $results['order']['OrderNo'] }}'
                    };
                    sendAjax(url, data, function (ret) {
                        if (ret.ret_cd) {
                            alert(ret.ret_msg);
                            location.reload();
                        }
                    }, showAlertError, false, 'POST');
                }
            });

            // 배송지 수정 버튼 클릭 (수정 폼)
            $('button[name="btn_show_addr_modify"]').on('click', function() {
                @if($results['order_delivery']['IsModifiable'] === true)
                    openWin('DeliveryAddress');
                @else
                    alert('{{ $results['order_delivery']['IsModifiable'] }}');
                @endif
            });

            // 배송지 수정 버튼 클릭
            $('.btn-addr-modify').on('click', function() {
                var $regi_form = $('#regi_addr_form');
                var _url = '{{ site_url('/classroom/order/modifyAddr') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, function() {
                    return confirm('수정하시겠습니까?');
                }, false, 'alert');
            });

            // 내강의실 바로가기 버튼 클릭
            $('button[name="btn_go_classroom"]').on('click', function() {
                location.replace('{{ site_url('/classroom/home/index') }}');
            });

            // 주문/배송 조회 목록 버튼 클릭
            $('button[name="btn_go_order_hist"]').on('click', function() {
                location.replace('{{ site_url('/classroom/order/index') }}?{!! $query_string !!}');
            });
        });
    </script>
@stop