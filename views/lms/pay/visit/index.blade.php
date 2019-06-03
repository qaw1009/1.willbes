@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원에 방문한 수강생의 학원강좌 결제를 진행하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">결제기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" >{{$row['CampusName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_route_ccd" name="search_pay_route_ccd">
                            <option value="">결제루트</option>
                            @foreach($arr_pay_route_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_method_ccd" name="search_pay_method_ccd">
                            <option value="">결제수단</option>
                        @foreach($arr_pay_method_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_prod_type_ccd" name="search_prod_type_ccd">
                            <option value="">상품구분</option>
                        @foreach($arr_prod_type_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd">
                            <option value="">상품상세구분</option>
                            @foreach($arr_learn_pattern_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_status_ccd" name="search_pay_status_ccd">
                            <option value="">결제상태</option>
                        @foreach($arr_pay_status_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_is_print_cert" name="search_is_print_cert">
                            <option value="">수강증출력여부</option>
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-8">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 주문번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="order">접수신청일</option>
                            <option value="paid">결제완료일</option>
                        </select>
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
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
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
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th rowspan="2" class="rowspan valign-middle">선택</th>
                    <th rowspan="2" class="valign-middle">No</th>
                    <th rowspan="2" class="rowspan valign-middle">주문번호</th>
                    <th rowspan="2" class="rowspan valign-middle">회원정보</th>
                    <th rowspan="2" class="rowspan valign-middle">결제채널</th>
                    <th rowspan="2" class="rowspan valign-middle">결제루트</th>
                    <th rowspan="2" class="rowspan valign-middle">결제수단</th>
                    <th rowspan="2" class="rowspan valign-middle">결제완료일<br/>(접수신청일)</th>
                    <th colspan="7">상품구분별정보</th>
                </tr>
                <tr class="bg-odd">
                    <th>상품구분</th>
                    <th>캠퍼스</th>
                    <th>상품명</th>
                    <th>결제금액</th>
                    <th>환불금액</th>
                    <th>결제상태</th>
                    <th>수강증출력</th>
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
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            // 캠퍼스 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 수강접수하기', className: 'btn-sm btn-success border-radius-reset btn-visit-order' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pay/visit/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                rowGroup: {
                    startRender: null,
                    endRender: function(rows, group) {
                        var t_real_pay_price = rows.data().pluck('tRealPayPrice')[0];
                        var t_refund_price = rows.data().pluck('tRefundPrice')[0];
                        var t_remain_price = rows.data().pluck('tRemainPrice')[0];

                        var t_html = '<strong>[총 실결제금액] <span class="blue">' + addComma(t_real_pay_price) + '</span>'
                            + '<span class="red pl-20">[총 환불금액] ' + addComma(t_refund_price) + '</span> = [남은금액] ' + addComma(t_remain_price) + '</strong>';

                        return $('<tr class="bg-odd"><td colspan="8"></td><td colspan="7">' + t_html + '</td></tr>');
                    },
                    dataSrc : 'OrderIdx'
                },
                columns: [
                    {'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="order_idx" class="flat target-crm-member" value="' + data + '" data-mem-idx="' + row.MemIdx + '">';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a class="blue cs-pointer btn-view" data-idx="' + row.OrderIdx + '"><u>' + data + '</u></a><br/>' + row.SiteName + (row.IsEscrow === 'Y' ? '(e)' : '');
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'CompleteDatm', 'render' : function(data, type, row, meta) {
                        return data !== null ? data : '' + '(' + row.OrderDatm + ')';
                    }},
                    {'data' : 'ProdTypeCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }},
                    {'data' : 'CampusCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return row.PayStatusCcd === '{{ $_pay_status_ccd['refund'] }}' ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'PayStatusCcdName', 'render' : function(data, type, row, meta) {
                        return (row.PayStatusCcd === '{{ $_pay_status_ccd['receipt_wait'] }}' ? '<a class="blue cs-pointer btn-visit-order" data-idx="' + row.OrderIdx + '"><u>' + data + '</u></a>' : data)
                            + (row.PayStatusCcd === '{{ $_pay_status_ccd['refund'] }}' ? '<br/>' + (row.RefundDatm !== null ? row.RefundDatm.substr(0, 10) : '') + '<br/>(' + row.RefundAdminName + ')' : '');
                    }},
                    {'data' : 'ProdTypeCcd', 'render' : function(data, type, row, meta) {
                        return data === '{{ $_prod_type_ccd['off_lecture'] }}' && row.PayStatusCcd === '{{ $_pay_status_ccd['paid'] }}' ? '<a class="blue cs-pointer btn-print" data-site-code="' + row.SiteCode + '" data-order-idx="' + row.OrderIdx + '" data-order-prod-idx="' + row.OrderProdIdx + '">[출력]</a>' + (row.IsPrintCert === 'Y' ? ' <div class="inline-block red">(Y)</div>' : '') : '';
                    }}
                ]
            });

            // 수강접수하기 버튼 클릭
            $('.btn-visit-order').on('click', function() {
                location.href = '{{ site_url('/pay/visit/create') }}' + dtParamsToQueryString($datatable);
            });

            // 접수대기 버튼 클릭
            $list_table.on('click', '.btn-visit-order', function() {
                location.href = '{{ site_url('/pay/visit/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            // 수강증 출력 버튼 클릭
            $list_table.on('click', '.btn-print', function() {
                var url = '{{ site_url('/common/printCert/') }}?prod_type=off_lecture&order_idx=' + $(this).data('order-idx') + '&order_prod_idx=' + $(this).data('order-prod-idx') + '&site_code=' + $(this).data('site-code');
                popupOpen(url, '_cert_print', 620, 350);
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/pay/visit/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 주문내역 보기
            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/pay/visit/show') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
