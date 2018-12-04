<h5>- 회원결제정보관리</h5>
<form class="form-horizontal" id="search_form_lec" name="search_form_lec" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="search_member_idx" value="{{$memIdx}}" />
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                <div class="col-md-1">
                    <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                </div>
                <label class="control-label col-md-1">결제일검색</label>
                <div class="col-md-7 form-inline">
                    <div class="input-group mb-0 mr-20">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date active" data-period="0-mon">당월</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="12-months">1년</button>
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="24-months">2년</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
        </div>
    </div>
</form>
<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_table" class="table table-bordered">
            <thead>
            <tr class="bg-odd">
                <th rowspan="2" class="pb-30">No</th>
                <th rowspan="2" class="rowspan pb-30">주문번호</th>
                <th rowspan="2" class="rowspan pb-30">회원정보</th>
                <th rowspan="2" class="rowspan pb-30">결제채널</th>
                <th rowspan="2" class="rowspan pb-30">결제루트</th>
                <th rowspan="2" class="rowspan pb-30">결제수단</th>
                <th rowspan="2" class="rowspan pb-20">결제완료(주문)일<br/>(가상계좌신청일)</th>
                <th colspan="7">상품구분별정보</th>
            </tr>
            <tr class="bg-odd">
                <th>상품구분</th>
                <th>상품명</th>
                <th>결제금액</th>
                <th>환불금액</th>
                <th>결제상태</th>
                <th>배송상태</th>
                <th>할인율</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_lec');
    var $list_table = $('#list_table');

    $(document).ready(function() {
        setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');

        $datatable = $list_table.DataTable({
            serverSide: true,
            pageLength : 10,
            pagingType : 'simple_numbers',
            ajax: {
                'url': '{{ site_url('/pay/order/listAjax') }}',
                'type': 'POST',
                'data': function (data) {
                    return $.extend(arrToJson($search_form.serializeArray()), {
                        'start': data.start,
                        'length': data.length
                    });
                }
            },
            rowsGroup: ['.rowspan'],
            rowGroup: {
                startRender: null,
                endRender: function (rows, group) {
                    var t_real_pay_price = rows.data().pluck('tRealPayPrice')[0];
                    var t_use_lec_point = rows.data().pluck('tUseLecPoint')[0];
                    var t_use_book_point = rows.data().pluck('tUseBookPoint')[0];
                    var t_refund_price = rows.data().pluck('tRefundPrice')[0];
                    var t_remain_price = rows.data().pluck('tRemainPrice')[0];

                    var t_html = '<strong>[총 실결제금액] <span class="blue">' + addComma(t_real_pay_price) + '</span>'
                        + ' (사용 포인트 : ' + addComma(t_use_lec_point) + ' | 교재 : ' + addComma(t_use_book_point) + ')'
                        + '<span class="red pl-20">[총 환불금액] ' + addComma(t_refund_price) + '</span> = [남은금액] ' + addComma(t_remain_price) + '</strong>';

                    return $('<tr class="bg-odd"><td colspan="8"></td><td colspan="7">' + t_html + '</td></tr>');
                },
                dataSrc: 'OrderIdx'
            },
            columns: [
                {
                    'data': null, 'render': function (data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }
                },
                {
                    'data': 'OrderNo', 'render': function (data, type, row, meta) {
                        return '<a class="blue cs-pointer btn-view" data-idx="' + row.OrderIdx + '"><u>' + data + '</u></a><br/>' + row.SiteName + (row.IsEscrow === 'Y' ? '(e)' : '');
                    }
                },
                {
                    'data': 'MemName', 'render': function (data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }
                },
                {'data': 'PayChannelCcdName'},
                {'data': 'PayRouteCcdName'},
                {'data': 'PayMethodCcdName'},
                {
                    'data': 'CompleteDatm', 'render': function (data, type, row, meta) {
                        return data !== null ? data : '' + (row.VBankOrderDatm !== null ? '<br/>(' + row.VBankOrderDatm + ')' : row.OrderDatm);
                    }
                },
                {
                    'data': 'ProdTypeCcdName', 'render': function (data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }
                },
                {
                    'data': 'ProdName', 'render': function (data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }
                },
                {
                    'data': 'RealPayPrice', 'render': function (data, type, row, meta) {
                        return addComma(data);
                    }
                },
                {
                    'data': 'RefundPrice', 'render': function (data, type, row, meta) {
                        return row.PayStatusCcd === '{{ $_pay_status_ccd['refund'] }}' ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }
                },
                {
                    'data': 'PayStatusCcdName', 'render': function (data, type, row, meta) {
                        return data + (row.PayStatusCcd === '{{ $_pay_status_ccd['refund'] }}' ? '<br/>' + row.RefundDatm.substr(0, 10) + '<br/>(' + row.RefundAdminName + ')' : '');
                    }
                },
                {
                    'data': 'DeliveryStatusCcdName', 'render': function (data, type, row, meta) {
                        return data !== null ? data + '<br/>' + (row.DeliverySendDatm !== null ? row.DeliverySendDatm.substr(0, 10) : '') : '';
                    }
                },
                {
                    'data': 'DiscRate', 'render': function (data, type, row, meta) {
                        return data + (row.IsUseCoupon === 'Y' ? ' (Y)' : '');
                    }
                }
            ]
        });

        $list_table.on('click', '.btn-view', function () {
            window.open('{{ site_url('/pay/order/show') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable), '_blank');
        });


        init_datatable();
    });
</script>