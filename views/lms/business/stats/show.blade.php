@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 전체 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
        <div class="x_panel">
            <div class="x_content mt-0">
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>매출구분</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered mb-0">
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
                                <th class="bg-odd">사이트</th>
                                <td class="bg-white-only">{{ $site_name }}</td>
                                <th class="bg-odd">상품구분</th>
                                <td class="bg-white-only">{{ $prod_type_name }}</td>
                                <th class="bg-odd">직종</th>
                                <td class="bg-white-only">{{ $cate_name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button class="btn btn-primary mr-0" type="button" id="btn_list">전체목록</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th>No</th>
                    <th class="rowspan">주문번호</th>
                    <th class="rowspan">회원정보</th>
                    <th class="rowspan">결제채널</th>
                    <th class="rowspan">결제루트</th>
                    <th class="rowspan">결제수단</th>
                    <th>직종구분</th>
                    <th>상품구분</th>
                    <th>[학습형태] 상품명</th>
                    <th>결제금액</th>
                    <th class="rowspan">결제완료일</th>
                    <th>환불금액</th>
                    <th>환불완료일</th>
                    <th>결제상태</th>
                </tr>
                <tr>
                    <td colspan="14" class="bg-odd text-center">
                        <h4 class="inline-block no-margin">
                            <span id="search_period" class="pr-5"></span>
                            <span class="blue"><span id="sum_pay_price">0</span></span>
                            - <span class="red"><span id="sum_refund_price">0</span></span>
                            = <span id="sum_total_price">0</span>원
                        </h4>
                    </td>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/business/allStats/orderListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/order/show') }}/' +row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'CateName'},
                    {'data' : 'ProdTypeCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return row.RealPayPrice !== null ? addComma(data) : '';
                    }},
                    {'data' : 'CompleteDatm'},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return row.RefundPrice !== null ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'RefundDatm'},
                    {'data' : 'PayStatusName'}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#search_period').html('[' + $search_form.find('input[name="start_date"]').val() + ' ~ ' + $search_form.find('input[name="end_date"]').val() + ']');

                if (json.sum_data !== null) {
                    $('#sum_pay_price').html(addComma(json.sum_data.tRealPayPrice) + ' (' + addComma(json.sum_data.tRealPayCnt) + '건)');
                    $('#sum_refund_price').html(addComma(json.sum_data.tRefundPrice) + ' (' + addComma(json.sum_data.tRefundCnt) + '건)');
                    $('#sum_total_price').html(addComma(json.sum_data.tRealPayPrice - json.sum_data.tRefundPrice));
                } else {
                    $('#sum_pay_price').html('0');
                    $('#sum_refund_price').html('0');
                    $('#sum_total_price').html('0');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/allStats/orderListExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/business/allStats/index') }}' + getQueryString());
            });
        });
    </script>
@stop
