@extends('lcms.layouts.master')

@section('content')
    <h5>- 교재 구매자를 확인하고 송장번호를 업로드하여 배송이력을 관리하는 메뉴입니다.</h5>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs bar_tabs mb-0" role="tablist">
                <li role="presentation" class="active"><a href="{{ site_url('/pay/delivery/index/book/invoice') }}" class="cs-pointer"><strong>송장등록</strong></a></li>
                <li role="presentation"><a href="{{ site_url('/pay/delivery/index/book/prepare') }}">발송준비 (환불반영)</a></li>
                <li role="presentation"><a href="{{ site_url('/pay/delivery/index/book/complete') }}">발송완료</a></li>
                <li role="presentation"><a href="{{ site_url('/pay/delivery/index/book/cancel') }}">발송취소</a></li>
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
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
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
            <form class="form-horizontal" id="invoice_form" name="invoice_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12">
                        <ul class="fa-ul mb-0">
                            <li><i class="fa-li fa fa-check-square-o"></i>결제상태가 ‘결제완료’인 교재 정보만 노출되며, 송장을 등록하는 메뉴 (송장 등록시 ‘발송준비(환불반영)’ 탭으로 자동 이관)</li>
                        </ul>
                    </div>
                </div>
                <div class="form-group form-group-sm form-group-bordered mt-15">
                    <label class="control-label col-md-1">송장정보</label>
                    <div class="col-md-11 form-inline">
                        <input type="file" id="attach_invoice_file" name="attach_invoice_file" class="form-control" title="송장엑셀파일" value="">
                        <button type="button" name="btn_invoice_file_upload" class="btn btn-primary btn-sm mb-0 ml-10 mr-10">송장엑셀업로드</button>
                        <button type="button" name="btn_invoice_file_download" class="btn btn-success btn-sm mb-0">송장엑셀다운로드</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="rowspan">선택</th>
                    <th class="">No</th>
                    <th class="rowspan">주문번호</th>
                    <th class="rowspan">회원정보</th>
                    <th class="rowspan">결제완료일</th>
                    <th class="">상품명</th>
                    <th class="">결제금액</th>
                    <th class="rowspan">배송료</th>
                    <th class="rowspan">수령인정보</th>
                    <th class="rowspan">배송지</th>
                    <th class="rowspan" width="210">송장번호</th>
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
        var $invoice_form = $('#invoice_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                    { text: '<i class="fa fa-print mr-5"></i> 프린트', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-print' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 송장번호저장', className: 'btn-sm btn-primary border-radius-reset btn-invoice-regist' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pay/delivery/listAjax/book/invoice') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
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
                    {'data' : 'Receiver', 'render' : function(data, type, row, meta) {
                        return data + '<br/>' + row.ReceiverPhone;
                    }},
                    {'data' : 'Addr1', 'render' : function(data, type, row, meta) {
                        return row.ZipCode + '<br/>' + data + '<br/>' + row.Addr2;
                    }},
                    {'data' : 'InvoiceNo', 'render' : function(data, type, row, meta) {
                        var bt_html = '', attr_disabled = '';
                        if (data !== '') {
                            attr_disabled = ' disabled="disabled"';
                        } else {
                            bt_html = '<button name="btn_invoice_regist" class="btn btn-xs btn-success mb-0 ml-5" data-order-idx="' + row.OrderIdx + '">저장</button>' +
                                '<button name="btn_invoice_cancel" class="btn btn-xs btn-danger mb-0 mr-0" data-order-idx="' + row.OrderIdx + '">취소</button>';
                        }

                        return '<input type="text" name="invoice_no" class="form-control input-sm" value="' + data + '" data-order-idx="' + row.OrderIdx + '"' + attr_disabled + ' style="width: 120px;" />' + bt_html;
                    }}
                ]
            });

            // 송장엑셀업로드 버튼 클릭
            $('button[name="btn_invoice_file_upload"]').on('click', function() {
                registInvoiceNo('excel', {});
            });

            // 송장엑셀다운로드 버튼 클릭
            $('button[name="btn_invoice_file_download"]').on('click', function() {
                location.replace('{{ site_url('/pay/delivery/sampleDownload') }}');
            });

            // 프린트 버튼 클릭
            $('.btn-print').on('click', function() {
                var $params = {};
                var $order_idx = $list_table.find('input[name="order_idx"]');

                $order_idx.each(function(idx) {
                    if ($(this).is(':checked') === true) {
                        $params[idx] = $(this).val();
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('프린트할 주문을 선택해 주세요.');
                    return;
                }

                if (Object.keys($params).length > 3) {
                    alert('프린트할 주문을 3건 이하로 선택해 주세요.');
                    return;
                }

                $('.btn-print').setLayer({
                    'url' : '{{ site_url('/pay/delivery/print') }}',
                    'width' : 1200,
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'params', 'name' : '주문식별자', 'value' : JSON.stringify($params), 'required' : true },
                        { 'id' : 'status', 'name' : '배송상태', 'value' : 'invoice', 'required' : true }
                    ]
                });
            });

            // 송장번호 저장 버튼 클릭
            $('.btn-invoice-regist').on('click', function() {
                var $params = {};
                var $order_idx = $list_table.find('input[name="order_idx"]');
                var $invoice_no = $list_table.find('input[name="invoice_no"]');
                var invoice_no = '';
                var is_check = true;

                $order_idx.each(function(idx) {
                    if ($(this).is(':checked') === true) {
                        invoice_no = $invoice_no.eq(idx).val();
                        if (invoice_no.trim().length < 1 || $invoice_no.eq(idx).prop('disabled') === true) {
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

                if (Object.keys($params).length < 1) {
                    alert('송장번호를 등록할 주문을 선택해 주세요.');
                    return;
                }

                registInvoiceNo('form', $params);
            });

            // 개별 송장번호 저장 버튼 클릭
            $list_table.on('click', 'button[name="btn_invoice_regist"]', function() {
                var $params = {};
                var order_idx = $(this).data('order-idx');
                var invoice_no = $list_table.find('input[name="invoice_no"][data-order-idx="' + order_idx + '"]').val();

                if (invoice_no.trim().length < 1) {
                    alert('송장번호를 입력해 주세요.');
                    return;
                }

                $params[order_idx] = invoice_no;
                registInvoiceNo('form', $params);
            });

            // 개별 송장번호 취소 버튼 클릭
            $list_table.on('click', 'button[name="btn_invoice_cancel"]', function() {
                var order_idx = $(this).data('order-idx');
                $list_table.find('input[name="invoice_no"][data-order-idx="' + order_idx + '"]').val('');
            });

            // 송장번호 저장
            var registInvoiceNo = function($data_src, $params) {
                var data, is_file, files;

                if ($data_src === 'form') {
                    data = {
                        '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method' : 'POST',
                        'data_src' : $data_src,
                        'params' : JSON.stringify($params)
                    };
                    is_file = false;
                } else {
                    files = $invoice_form.find('input[name="attach_invoice_file"]')[0].files[0];
                    if (typeof files === 'undefined') {
                        alert('송장 엑셀파일을 선택해 주세요.');
                        return;
                    }

                    data = new FormData();
                    data.append('{{ csrf_token_name() }}', $invoice_form.find('input[name="{{ csrf_token_name() }}"]').val());
                    data.append('_method', 'POST');
                    data.append('data_src', $data_src);
                    data.append('attach_invoice_file', $invoice_form.find('input[name="attach_invoice_file"]')[0].files[0]);
                    is_file = true;
                }

                if (!confirm('송장번호 저장 후 ‘발송준비(환불반영)’탭으로 배송정보를 이관하시겠습니까?')) {
                    return;
                }

                sendAjax('{{ site_url('/pay/delivery/redata') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();

                        if ($data_src === 'excel') {
                            $invoice_form.find('input[name="attach_invoice_file"]').val('');
                        }
                    }
                }, showError, false, 'POST', 'json', is_file);
            };

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/pay/delivery/excel/book/invoice') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/pay/delivery/show/book/invoice') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
