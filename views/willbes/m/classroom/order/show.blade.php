@extends('willbes.m.layouts.master')

@section('page_title', '주문/배송조회')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div class="paymentWrap">      
        <div class="paymentCtsEnd pt20">
            <h4>결제정보</h4>
            <table>
                <col width="90px"/>
                <col width=""/>
                <tr>
                    <th scope="row">주문번호</th>
                    <td>{{ $results['order']['OrderNo'] }}</td>
                </tr>
                <tr>
                    <th scope="row">결제일</th>
                    <td>{{ $results['order']['CompleteDatm'] }}</td>
                </tr>
                <tr>
                    <th scope="row">결제금액</th>
                    <td>{{ number_format($results['order']['RealPayPrice']) }}원</td>
                </tr>
                <tr>
                    <th scope="row">결제수단</th>
                    <td>{{ empty($results['order']['PayMethodCcd']) === false ? $results['order']['PayMethodCcdName'] : $results['order']['PayRouteCcdName'] }}</td>
                </tr>
                @if($results['order']['IsVBank'] == 'Y')
                    <tr>
                        <th scope="row">가상계좌</th>
                        <td>{{ $results['order']['VBankName'] }} {{ $results['order']['VBankAccountNo'] }} {{ config_get('vbank_account_name', '(주)윌비스') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">입금기한</th>
                        <td>{{ $results['order']['VBankExpireDatm'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">신청일</th>
                        <td>{{ $results['order']['OrderDatm'] }}</td>
                    </tr>
                @endif
            </table>

            <div class="priceBox">
                <ul>
                    <li><strong>상품주문금액</strong> <span class="tx-blue">{{ number_format($results['order']['OrderProdPrice']) }}원</span></li>
                    <li><strong>쿠폰할인금액</strong> <span class="tx-red">{{ number_format($results['order']['DiscPrice']) }}원</span></li>
                    <li><strong>포인트 차감금액</strong> <span class="tx-red">{{ number_format($results['order']['UsePoint']) }}원</span></li>
                    <li><strong>배송료</strong> <span class="tx-blue">{{ number_format($results['order']['DeliveryPrice'] + $results['order']['DeliveryAddPrice']) }}원</span></li>
                    <li class="NGEB">
                        <strong>결제금액</strong> <span class="tx-blue">{{ number_format($results['order']['RealPayPrice']) }}원</span>
                    </li>
                </ul>                
            </div>

            <h4>상품정보</h4>
            @foreach($results['order_product'] as $idx => $row)
                <ul class="payLecList">
                    <li><span>{{ $arr_prod_type_name[$row['OrderProdType']] }}</span></li>
                    <li>{{ $row['ProdName'] }}</li>
                    @if(empty($row['StudyPeriod']) === false)
                        <li><strong>수강기간</strong> {{ $row['StudyPeriod'] }}일</li>
                    @endif
                    {{-- 정가(할인율), 판매형태가 일반일 경우만 노출 (재수강, 수강연장 제외) --}}
                    @if(ends_with($row['SalePatternCcd'], '001') === true)
                        <li><strong>정가(할인율)</strong> <span>{{ number_format($row['SalePrice']) }}원 (↓{{ number_format($row['SaleRate']) . $row['SaleRateUnit'] }})</span></li>
                    @endif
                    <li><strong>실 결제금액</strong> <span class="tx-blue">{{ number_format($row['RealPayPrice']) }}원</span></li>
                    <li><strong>사용쿠폰</strong> <span>{{ $row['UseCoupon'] }}</span></li>
                    <li>
                        <strong>주문/배송상태</strong>
                        <span>
                            @if($row['DeliveryStatusCcd'] == $arr_delivery_status_ccd['prepare'] || $row['DeliveryStatusCcd'] == $arr_delivery_status_ccd['complete'])
                                {{ $row['DeliveryStatusCcdName'] }}
                                <a href="{{ $row['DeliverySearchUrl'] }}" class="ml5" target="_blank">배송조회</a>
                            @else
                                {{ $row['PayStatusCcdName'] }}
                                @if(empty($row['RefundDatm']) === false)
                                    ({{ substr($row['RefundDatm'], 0, 10) }})
                                @endif
                            @endif
                        </span>
                    </li>
                </ul>
            @endforeach

            {{-- 배송정보가 있는 경우만 노출 --}}
            @if($results['order']['IsDelivery'] == 'Y')
                <h4 class="mt20">배송정보</h4>
                <table>
                    <col width="90px"/>
                    <col width=""/>
                    <tr>
                        <th scope="row">받는분</th>
                        <td>{{ $results['order_delivery']['Receiver'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">주소</th>
                        <td>[{{ $results['order_delivery']['ZipCode'] }}] {{ $results['order_delivery']['Addr1'] }} {{ $results['order_delivery']['Addr2'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">휴대폰번호</th>
                        <td>{{ $results['order_delivery']['ReceiverPhone'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">전화번호</th>
                        <td>{{ $results['order_delivery']['ReceiverTel'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">배송시요청사항</th>
                        <td>{{ $results['order_delivery']['DeliveryMemo'] }}</td>
                    </tr>
                </table>
            @else
                {{-- 스타일 적용을 위한 빈 div 추가 --}}
                <div class="d_none"></div>
            @endif
        </div>

        <div class="lec-btns w50p">
            <ul>
                <li><a href="#none" id="btn_go_classroom" class="btn-purple-line">내강의실 바로가기</a></li>
                <li><a href="#none" id="btn_go_order_hist" class="btn-purple">주문/배송 조회목록</a></li>
            </ul>
        </div>
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
        // 내강의실 바로가기 버튼 클릭
        $('#btn_go_classroom').on('click', function() {
            location.replace('{{ front_url('/classroom/on/list/ongoing') }}');
        });

        // 결제내역 바로가기 버튼 클릭
        $('#btn_go_order_hist').on('click', function() {
            location.replace('{{ front_url('/classroom/order/index') }}?{!! $query_string !!}');
        });
    });
</script>
@stop