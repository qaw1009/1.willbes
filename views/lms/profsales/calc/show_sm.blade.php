@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{ $search_type == 'refund' ? '환불 현황' : '수강생 현황' }}
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="search_type" id="search_type" value="{{ $search_type }}"/>
        <input type="hidden" name="search_date_param1" id="search_date_param1" value="{{ $search_date_param1 }}"/>
        <input type="hidden" name="search_date_param2" id="search_date_param2" value="{{ $search_date_param2 }}"/>
        <input type="hidden" name="search_site_code" id="search_site_code" value="{{ $search_site_code }}"/>
        <input type="hidden" name="search_prof_idx" id="search_prof_idx" value="{{ $search_prof_idx }}"/>
        <input type="hidden" name="search_prod_code_sub" id="search_prod_code_sub" value="{{ $search_prod_code_sub }}"/>
@endsection

@section('layer_content')
    <div class="form-group">
        <div class="col-md-12 bold fs-14">
            {{ $search_prod_name_sub }}
        </div>
        <div class="col-md-7 pt-5">
            ※ 해당 결제 금액은 회원이 결제한 실결제 금액입니다. 배분율이 적용되기전 상품 기준 결제금액이므로 정산금과 차이가 있을 수 있습니다.
        </div>
        <div class="col-md-5 form-inline text-right pt-10 pr-0">
            @if($search_type == 'all')
                <select class="form-control mr-10" id="search_pay_status" name="search_pay_status">
                    <option value="">전체</option>
                    <option value="paid">결제완료</option>
                    <option value="refund">환불완료</option>
                </select>
            @endif
            <input type="text" class="form-control" id="search_value" name="search_value" placeholder="회원명, 아이디 검색" style="width: 40%;">
            <button type="submit" class="btn btn-primary btn-sm mr-0" id="_btn_search">검 색</button>
            <button type="button" class="btn btn-success btn-sm mr-0" id="_btn_excel">엑셀다운로드</button>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-md-12">
            <table id="_list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr class="bg-white-gray">
                    <th>NO</th>
                    <th>주문번호</th>
                    <th>회원정보</th>
                    <th>상품구분</th>
                    <th>결제채널</th>
                    <th>결제루트</th>
                    <th>결제수단</th>
                    <th>결제금액</th>
                    <th>결제완료일</th>
                    <th>환불금액</th>
                    <th>환불완료일</th>
                    <th>결제상태</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $list_table_modal = $('#_list_ajax_table');

        $(document).ready(function() {
            // 주문내역 보기
            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/profsales/calc/' . $calc_type . '/orderListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        @if($is_tzone === true)
                            return '<u class="blue">' + data + '</u>';
                        @else
                            return '<a href="{{ site_url('/pay/order/show/') }}' + row.OrderIdx + '" target="_blank"><u class="blue">' + data + '</u></a>';
                        @endif
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')';
                    }},
                    {'data' : 'SalePatternCcdName'},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return data !== null ? addComma(data) : '';
                    }},
                    {'data' : 'CompleteDatm'},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return data !== null ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'RefundDatm'},
                    {'data' : 'PayStatusName'}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $search_form_modal.on('click', '#_btn_excel', function(e) {
                e.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/profsales/calc/' . $calc_type . '/orderListExcel') }}', $search_form_modal.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection