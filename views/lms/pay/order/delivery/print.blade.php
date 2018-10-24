@extends('lcms.layouts.master_modal')

@section('layer_title')
    상품주문정보
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <div class="row box-body">
        @foreach($data as $order_idx => $row)
            <div class="col-md-12">
                <p class="pl-5"><i class="fa fa-check-square-o"></i> 주문자정보 ({{ $loop->index }})</p>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <colgroup>
                        <col width="10%"/>
                        <col width="20%"/>
                        <col width="10%"/>
                        <col width="20%"/>
                        <col width="10%"/>
                        <col width="30%"/>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="bg-odd">주문자명</td>
                            <td>{{ $row['order']['MemName'] }}</td>
                            <td class="bg-odd">생년월일</td>
                            <td>{{ $row['order']['MemBirthDay'] }}</td>
                            <td class="bg-odd">휴대폰</td>
                            <td>{{ $row['order']['MemPhone'] }}</td>
                        </tr>
                        <tr>
                            <td class="bg-odd">이메일</td>
                            <td>{{ $row['order']['MemMail'] }}</td>
                            <td class="bg-odd">회원주소</td>
                            <td colspan=3">[{{ $row['order']['MemZipCode'] }}] {{ $row['order']['MemAddr1'] }} {{ $row['order']['MemAddr2'] }}</td>
                        </tr>
                        <tr>
                            <td class="bg-odd">수령인</td>
                            <td>{{ $row['order']['Receiver'] }}</td>
                            <td class="bg-odd">연락처</td>
                            <td>{{ $row['order']['ReceiverTel'] }}</td>
                            <td class="bg-odd">추가연락처</td>
                            <td>{{ $row['order']['ReceiverPhone'] }}</td>
                        </tr>
                        <tr>
                            <td class="bg-odd">배송지주소</td>
                            <td colspan="5">[{{ $row['order']['ZipCode'] }}] {{ $row['order']['Addr1'] }} {{ $row['order']['Addr2'] }}</td>
                        </tr>
                        <tr>
                            <td class="bg-odd">배송메모</td>
                            <td colspan="5">{{ $row['order']['DeliveryMemo'] }}</td>
                        </tr>
                        <tr>
                            <td class="bg-odd">주문정보</td>
                            <td colspan="5" class="no-padding no-margin">
                                <table class="table no-margin">
                                    <tr class="bg-odd">
                                        <td class="no-border-top bdr-line">주문번호</td>
                                        <td class="no-border-top bdr-line">결제완료일</td>
                                        <td class="no-border-top bdr-line">교재코드</td>
                                        <td class="no-border-top bdr-line">상품명</td>
                                        <td class="no-border-top bdr-line">결제금액</td>
                                        <td class="no-border-top bdr-line">결제상태</td>
                                        <td class="no-border-top bdr-line">송장번호</td>
                                        <td class="no-border-top">송장등록일</td>
                                    </tr>
                                @foreach($row['order_prod'] as $order_prod_row)
                                    <tr>
                                        <td class="bdr-line">{{ $row['order']['OrderNo'] }}</td>
                                        <td class="bdr-line">{{ $row['order']['CompleteDatm'] }}</td>
                                        <td class="bdr-line">{{ $order_prod_row['ProdCode'] }}</td>
                                        <td class="bdr-line"><span class="blue no-line-height">[{{ $order_prod_row['ProdTypeCcdName'] }}]</span> {{ $order_prod_row['ProdName'] }}</td>
                                        <td class="bdr-line">{{ number_format($order_prod_row['RealPayPrice']) }}</td>
                                        <td class="bdr-line">{{ $order_prod_row['PayStatusCcdName'] }}</td>
                                        <td class="bdr-line">{{ $order_prod_row['InvoiceNo'] }}</td>
                                        <td class="">{{ $order_prod_row['InvoiceRegDatm'] }}</td>
                                    </tr>
                                @endforeach
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
    <script src="/public/vendor/jquery/print/jquery.print.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // 프린트 버튼 클릭
            $('button[name="_btn_print"]').on('click', function() {
                $.print('.box-body');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="button" name="_btn_print" class="btn btn-success">프린트</button>
@endsection

@section('layer_footer')
@endsection