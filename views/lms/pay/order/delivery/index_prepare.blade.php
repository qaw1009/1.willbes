@extends('lcms.layouts.master')

@section('content')
    <h5>- 교재 구매자를 확인하고 송장번호를 업로드하여 배송이력을 관리하는 메뉴입니다.</h5>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs bar_tabs mb-0" role="tablist">
                <li role="presentation"><a href="{{ site_url('/pay/order/delivery/index/book/invoice') }}">송장등록</a></li>
                <li role="presentation" class="active"><a href="{{ site_url('/pay/order/delivery/index/book/prepare') }}" class="cs-pointer"><strong>발송준비 (환불반영)</strong></a></li>
                <li role="presentation"><a href="{{ site_url('/pay/order/delivery/index/book/complete') }}">발송완료</a></li>
                <li role="presentation"><a href="{{ site_url('/pay/order/delivery/index/book/cancel') }}">발송취소</a></li>
            </ul>
        </div>
    </div>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-8">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호, 수령인명 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 주문/송장번호 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="">조건검색</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-10" id="search_delivery_price_type" name="search_delivery_price_type">
                            <option value="">배송료구분</option>
                            <option value="normal">일반배송료</option>
                            <option value="add">추가배송료</option>
                        </select>
                        <select class="form-control mr-10" id="search_pay_status_ccd" name="search_pay_status_ccd">
                            <option value="">결제상태</option>
                            @foreach($arr_pay_status_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="paid">결제완료일</option>
                            <option value="invoice">송장등록일</option>
                            <option value="refund">환불완료일</option>
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
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date active" data-period="0-mon">당월</button>
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
            <div class="row">
                <div class="col-md-12">
                    <ul class="fa-ul mb-0">
                        <li><i class="fa-li fa fa-check-square-o"></i>송장 등록된 교재만 노출되며, ‘발송완료’ 처리 전 송장 수정 및 환불완료 교재 발송취소 처리 가능 (‘발송전취소’ 처리시 ‘발송취소’ 탭으로 자동 이관)</li>
                        <li><i class="fa-li fa fa-check-square-o"></i>‘발송완료승인’ 클릭 시, ‘발송완료’ 탭으로 자동 이관</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th rowspan="2" class="pb-30">선택</th>
                    <th rowspan="2" class="pb-30">No</th>
                    <th rowspan="2" class="rowspan pb-30">주문번호</th>
                    <th rowspan="2" class="rowspan pb-30">회원정보</th>
                    <th rowspan="2" class="rowspan pb-30">결제완료일</th>
                    <th rowspan="2" class="pb-30">상품명</th>
                    <th rowspan="2" class="pb-30">결제금액</th>
                    <th rowspan="2" class="rowspan pb-30">배송료</th>
                    <th rowspan="2" class="pb-30">결제상태</th>
                    <th rowspan="2" class="pb-30">환불완료일</th>
                    <th rowspan="2" class="rowspan pb-30">수령인정보</th>
                    <th rowspan="2" class="rowspan pb-30">배송지</th>
                    <th colspan="3" class="">송장정보</th>
                </tr>
                <tr>
                    <th class="pb-20" style="min-width: 165px;">송장번호</th>
                    <th>등록자<br/>(수정자)</th>
                    <th>등록일<br/>(수정일)</th>
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
            setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 송장번호수정', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-invoice-modify' },
                    { text: '<i class="fa fa-undo mr-5"></i> 발송전취소', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-send-cancel' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 발송완료승인', className: 'btn-sm btn-success border-radius-reset btn-send-complete' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pay/order/delivery/listAjax/book/prepare') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="order_prod_idx" class="flat" value="' + data + '" data-pay-status-ccd-name="' + row.PayStatusCcdName + '">';
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
                    {'data' : 'CompleteDatm'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'tDeliveryPrice', 'render' : function(data, type, row, meta) {
                        return data > 0 ? '[일반] ' + addComma(data) + (row.tDeliveryAddPrice > 0 ? '<br/>[추가] ' + addComma(row.tDeliveryAddPrice) : '') : '';
                    }},
                    {'data' : 'PayStatusCcdName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '';
                    }},
                    {'data' : 'Receiver', 'render' : function(data, type, row, meta) {
                        return data + '<br/>' + row.ReceiverPhone;
                    }},
                    {'data' : 'Addr1', 'render' : function(data, type, row, meta) {
                        return row.ZipCode + '<br/>' + data + '<br/>' + row.Addr2;
                    }},
                    {'data' : 'InvoiceNo', 'render' : function(data, type, row, meta) {
                        return '<input type="number" name="invoice_no" class="form-control input-sm" value="' + data + '" data-order-prod-idx="' + row.OrderProdIdx + '" style="width: 120px;" />' +
                            '<button name="btn_invoice_modify" class="btn btn-xs btn-success mb-0 ml-5 mr-0" data-order-prod-idx="' + row.OrderProdIdx + '">수정</button>';
                    }},
                    {'data' : 'InvoiceRegAdminName', 'render' : function(data, type, row, meta) {
                        return data + (row.InvoiceUpdAdminName !== null ? '<br/>(' + row.InvoiceUpdAdminName + ')' : '');
                    }},
                    {'data' : 'InvoiceRegDatm', 'render' : function(data, type, row, meta) {
                        return data + (row.InvoiceUpdDatm !== null ? '<br/>(' + row.InvoiceUpdDatm + ')' : '');
                    }}
                ]
            });

            // 발송전취소, 발송완료승인 버튼 클릭
            $('.btn-send-cancel, .btn-send-complete').on('click', function() {
                var $params = {};
                var confirm_msg = '', no_data_msg = '', check_error_msg = '';
                var is_check = true;
                var $order_prod_idx = $list_table.find('input[name="order_prod_idx"]');
                var delivery_status = $(this).prop('class').indexOf('btn-send-complete') !== -1 ? 'complete' : 'cancel';

                if (delivery_status === 'complete') {
                    confirm_msg = '발송완료를 승인하시겠습니까?\n승인된 정보는 ‘발송완료탭’으로 이관됩니다.';
                    no_data_msg = '발송완료 승인할 주문을 선택해 주세요.';
                    check_error_msg = '결제완료된 주문만 발송완료 승인이 가능합니다.';
                } else {
                    confirm_msg = '선택된 주문의 발송을 취소하시겠습니까?';
                    no_data_msg = '발송전 취소할 주문을 선택해 주세요.';
                    check_error_msg = '환불완료된 주문만 발송전 취소가 가능합니다.';
                }

                $order_prod_idx.each(function(idx) {
                    if ($(this).is(':checked') === true) {
                        if (delivery_status === 'complete' && $(this).data('pay-status-ccd-name').indexOf('환불') > -1) {
                            is_check = false;
                            return false;
                        } else if (delivery_status === 'cancel' && $(this).data('pay-status-ccd-name').indexOf('결제') > -1) {
                            is_check = false;
                            return false;
                        }
                        $params[idx] = $(this).val();
                    }
                });

                if (is_check === false) {
                    alert(check_error_msg);
                    return;
                }

                if (Object.keys($params).length < 1) {
                    alert(no_data_msg);
                    return;
                }

                if (!confirm(confirm_msg)) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'status' : delivery_status,
                    'params' : JSON.stringify($params)
                };

                sendAjax('{{ site_url('/pay/order/delivery/restatus') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 송장번호 수정 버튼 클릭
            $('.btn-invoice-modify').on('click', function() {
                var $params = {};
                var $order_prod_idx = $list_table.find('input[name="order_prod_idx"]');
                var $invoice_no = $list_table.find('input[name="invoice_no"]');
                var invoice_no = '';
                var is_check = true;

                $order_prod_idx.each(function(idx) {
                    if ($(this).is(':checked') === true) {
                        invoice_no = $invoice_no.eq(idx).val();
                        if (invoice_no.trim().length < 1) {
                            is_check = false;
                            return false;
                        }
                        $params[$(this).val()] = invoice_no;
                    }
                });

                if (is_check === false) {
                    alert('송장번호를 입력해 주세요.');
                    return;
                }

                modifyInvoiceNo($params);
            });

            // 개별 송장번호 수정 버튼 클릭
            $list_table.on('click', 'button[name="btn_invoice_modify"]', function() {
                var $params = {};
                var order_prod_idx = $(this).data('order-prod-idx');
                var invoice_no = $list_table.find('input[name="invoice_no"][data-order-prod-idx="' + order_prod_idx + '"]').val();

                if (invoice_no.trim().length < 1) {
                    alert('송장번호를 입력해 주세요.');
                    return;
                }

                $params[order_prod_idx] = invoice_no;
                modifyInvoiceNo($params);
            });

            // 송장번호 수정
            var modifyInvoiceNo = function($params) {
                if (!confirm('현재 정보로 송장번호를 수정하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'data_src' : 'form',
                    'params' : JSON.stringify($params)
                };

                sendAjax('{{ site_url('/pay/order/delivery/redata') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            };

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/pay/order/delivery/excel/book/prepare') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/pay/order/order/show') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
