@extends('lcms.layouts.master_modal')

@section('layer_title')
    개별환불처리
@stop

@section('layer_header')
    <form class="form-horizontal" id="_sub_refund_check_form" name="_sub_refund_check_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
@endsection

@section('layer_content')
    <div class="row">
        <div class="col-md-12">
            <p class="pl-5"><a class="blue">[{{ $order_prod_data['OrderNo'] }}]</a> {{ $order_prod_data['ProdName'] }}</p>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead class="bg-odd">
                <tr>
                    <th rowspan="2" class="pb-20">단강좌명</th>
                    <th rowspan="2" class="pb-20">실결제금액</th>
                    <th colspan="2">환불금액</th>
                </tr>
                <tr>
                    <th>카드</th>
                    <th>현금</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr class="order_prod_sub_idx" data-idx="{{ $row['OrderProdSubIdx'] }}">
                            <td>{{ $row['ProdNameSub'] }} - <span class="blue">{{ number_format($row['RealSalePrice']) }}원</span></td>
                            <td class="rowspan">{{ number_format($order_prod_data['RealPayPrice']) }}</td>
                            <td>
                                <input id="sub_card_refund_price_{{ $row['OrderProdSubIdx'] }}" name="sub_card_refund_price[]" class="form-control input-sm" title="카드환불금액" value="{{ $row['CalcCardRefundPrice'] }}" @if($row['CardPayPrice'] < 1) readonly="readonly" @endif style="width: 140px;"/>
                            </td>
                            <td>
                                <input id="sub_cash_refund_price_{{ $row['OrderProdSubIdx'] }}" name="sub_cash_refund_price[]" class="form-control input-sm" title="현금환불금액" value="{{ $row['CalcCashRefundPrice'] }}" @if($row['CashPayPrice'] < 1) readonly="readonly" @endif style="width: 140px;"/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <h4>
                    [실결제금액] <span id="total_sub_real_pay_price" class="blue">{{ number_format($order_prod_data['RealPayPrice']) }}</span>
                    - [환불금액] 카드 <span id="total_sub_card_refund_price" class="red">0</span> + 현금 <span id="total_sub_cash_refund_price" class="red">0</span>
                    = [남은금액] <span id="total_sub_remain_price">0</span>
                </h4>
            </div>
        </div>
        <div class="col-md-12 mt-10">
            <div class="pl-20 pt-20 bdt-line">
                <p><i class="fa fa-check"></i> 환불처리 완료 후에는 수정이 불가능합니다. (환불완료 처리 이전에만 수정 가능)</p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var $_sub_refund_check_form = $('#_sub_refund_check_form');

            // 환불금액 합산 표시
            $_sub_refund_check_form.on('keyup input', 'input[name="sub_card_refund_price[]"], input[name="sub_cash_refund_price[]"]', function() {
                calcTotalSubRefundPrice();
            });

            // 입력된 환불금액 합산
            var calcTotalSubRefundPrice = function() {
                var $order_prod_sub_idx = $_sub_refund_check_form.find('.order_prod_sub_idx');
                var order_prod_sub_idx = '', total_sub_card_refund_price = 0, total_sub_cash_refund_price = 0;
                var total_sub_real_pay_price = parseInt($_sub_refund_check_form.find('#total_sub_real_pay_price').html().replace(/,/g, ''));

                $order_prod_sub_idx.each(function() {
                    order_prod_sub_idx = $(this).data('idx');

                    total_sub_card_refund_price += parseInt($_sub_refund_check_form.find('#sub_card_refund_price_' + order_prod_sub_idx).val()) || 0;
                    total_sub_cash_refund_price += parseInt($_sub_refund_check_form.find('#sub_cash_refund_price_' + order_prod_sub_idx).val()) || 0;
                });

                $_sub_refund_check_form.find('#total_sub_card_refund_price').html(addComma(total_sub_card_refund_price));
                $_sub_refund_check_form.find('#total_sub_cash_refund_price').html(addComma(total_sub_cash_refund_price));
                $_sub_refund_check_form.find('#total_sub_remain_price').html(addComma(total_sub_real_pay_price - total_sub_card_refund_price - total_sub_cash_refund_price));
            };

            // 적용버튼 클릭
            $_sub_refund_check_form.on('click', 'button[name="_btn_sub_refund_apply"]', function() {
                var $params = {};
                var $parent_refund_proc_form = $('#refund_proc_form');
                var $order_prod_sub_idx = $_sub_refund_check_form.find('.order_prod_sub_idx');
                var order_prod_idx = '{{ $order_prod_data['OrderProdIdx'] }}';
                var order_prod_sub_idx = '', sub_card_refund_price = 0, sub_cash_refund_price = 0, total_sub_card_refund_price = 0, total_sub_cash_refund_price = 0;

                $order_prod_sub_idx.each(function() {
                    order_prod_sub_idx = $(this).data('idx');
                    sub_card_refund_price = parseInt($_sub_refund_check_form.find('#sub_card_refund_price_' + order_prod_sub_idx).val()) || 0;
                    sub_cash_refund_price = parseInt($_sub_refund_check_form.find('#sub_cash_refund_price_' + order_prod_sub_idx).val()) || 0;

                    total_sub_card_refund_price += sub_card_refund_price;
                    total_sub_cash_refund_price += sub_cash_refund_price;

                    $params[order_prod_sub_idx] = {
                        'card_refund_price' : sub_card_refund_price,
                        'cash_refund_price' : sub_cash_refund_price
                    };
                });

                $parent_refund_proc_form.find('input[id="card_refund_price_' + order_prod_idx + '"]').val(total_sub_card_refund_price);
                $parent_refund_proc_form.find('input[id="cash_refund_price_' + order_prod_idx + '"]').val(total_sub_cash_refund_price);
                $parent_refund_proc_form.find('#sub_refund_price_' + order_prod_idx).val(Base64.encode(JSON.stringify($params)));

                $parent_refund_proc_form.find('input[id="card_refund_price_' + order_prod_idx + '"]').trigger('keyup');
                $("#pop_modal").modal('toggle');
            });

            calcTotalSubRefundPrice();

            // 실결제금액 rowspan
            setRowspan('rowspan');
        });
    </script>
@stop

@section('add_buttons')
    <button type="button" name="_btn_sub_refund_apply" class="btn btn-success">적용</button>
@endsection

@section('layer_footer')
    </form>
@endsection