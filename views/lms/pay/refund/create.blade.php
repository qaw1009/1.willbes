@extends('lcms.layouts.master_modal')

@section('layer_title')
    환불처리하기
@stop

@section('layer_header')
    <form class="form-horizontal" id="_refund_proc_form" name="_refund_proc_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="order_idx" value="{{ $order_idx }}"/>
        <input type="hidden" name="params" value="{{ $params }}"/>
@endsection

@section('layer_content')
    <div class="row">
        <div class="col-md-12">
            <p class="pl-5"><i class="fa fa-check-square-o"></i> 환불상품정보</p>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>상품구분</th>
                        <th>상품명</th>
                        <th>결제상태</th>
                        <th>카드환불금액</th>
                        <th>현금환불금액</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_prod_data as $row)
                        <tr>
                            <td>{{ $row['ProdTypeCcdName'] }}</td>
                            <td><div class="blue inline-block">[{{ empty($row['LearnPatternCcdName']) === true ? $row['ProdTypeCcdName'] : $row['LearnPatternCcdName'] }}]</div> {{ $row['ProdName'] }}</td>
                            <td><div class="red inline-block">{{ $row['PayStatusCcdName'] }}</div></td>
                            <td>{{ number_format($order_prod_param[$row['OrderProdIdx']]['card_refund_price']) }}</td>
                            <td>{{ number_format($order_prod_param[$row['OrderProdIdx']]['cash_refund_price']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <h4>총 환불금액 <span class="red">{{ number_format($total_refund_price) }}</span></h4>
            </div>
        </div>
        <div class="col-md-12 mt-10">
            <table class="table table-bordered">
                <colgroup>
                    <col width="120px"/>
                    <col width="*"/>
                </colgroup>
                <tbody>
                <tr>
                    <th class="bg-odd">환불정보
                        <div class="mt-5">
                            <input type="checkbox" id="is_approval" name="is_approval" class="flat" value="Y"/> 지결
                        </div>
                        <div class="mt-5">
                            @if($is_available_pg_refund === true)
                                <input type="checkbox" id="is_pg_refund" name="is_pg_refund" class="flat" value="Y"/> 연동환불
                            @endif
                        </div>
                    </th>
                    <td class="form-inline form-group-sm pl-15">
                        @if($total_refund_price > 0)
                            <div class="mt-5">
                                [입금은행]
                                <select class="form-control ml-5 mr-30" id="refund_bank_ccd" name="refund_bank_ccd" title="입금은행">
                                    <option value="">은행선택</option>
                                    @foreach($arr_bank_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                [계좌번호]
                                <input type="number" id="refund_account_no" name="refund_account_no" class="form-control ml-5 mr-30" title="계좌번호" value=""/>
                                [예금주]
                                <input type="text" id="refund_deposit_name" name="refund_deposit_name" class="form-control ml-5" title="예금주" value=""/>
                            </div>
                        @endif
                        <div class="mt-10 item">
                            [환불사유]
                            <input type="text" id="refund_reason" name="refund_reason" class="form-control ml-5" title="환불사유" required="required" value="" style="width: 86%;"/>
                        </div>
                        <div class="mt-10">
                            [환불메모]
                            <input type="text" id="refund_memo" name="refund_memo" class="form-control ml-5" title="환불메모" value="" style="width: 86%;"/>
                        </div>
                        <div class="mt-10 mb-10">
                            - 무통장입금 환불 처리나, 실시간계좌이체 자동 환불 기간이 만료된 경우 해당 환불계좌정보 입력하여 환불 진행
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="text-center">
                <p>※ ‘환불처리하기’ 버튼 클릭시 PG사(이니시스)에 자동 연동되어 환불이 진행되오니, 신중하게 확인하신 후 환불처리를 진행해 주시기 바랍니다.</p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $_refund_proc_form = $('#_refund_proc_form');

        $(document).ready(function() {
            $_refund_proc_form.submit(function() {
                var _url = '{{ site_url('/pay/refundProc/store') }}';

                ajaxSubmit($_refund_proc_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        location.reload();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                var $refund_bank_ccd = $_refund_proc_form.find('select[name="refund_bank_ccd"]');
                var $refund_account_no = $_refund_proc_form.find('input[name="refund_account_no"]');
                var $refund_deposit_name = $_refund_proc_form.find('input[name="refund_deposit_name"]');

                if ($refund_bank_ccd.val() !== '' || $refund_account_no.val() !== '' || $refund_deposit_name.val() !== '') {
                    if (!($refund_bank_ccd.val() !== '' && $refund_account_no.val() !== '' && $refund_deposit_name.val() !== '')) {
                        alert('환불계좌정보를 모두 입력해 주세요.');
                        return false;
                    }
                }

                return true;
            }
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" name="_btn_refund_proc" class="btn btn-success">환불처리하기</button>
@endsection

@section('layer_footer')
    </form>
@endsection