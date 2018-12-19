@extends('lcms.layouts.master')

@section('content')
    <h5>- 장바구니에 담은 전체 주문내역 확인 및 관리자가 별도 장바구니 담기를 진행할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">주문(등록)자 검색</label>
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
                        <p class="form-control-static">상품명 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
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
                    <th rowspan="2" class="rowspan pb-30">선택</th>
                    <th rowspan="2" class="pb-30">No</th>
                    <th rowspan="2" class="rowspan pb-30">운영사이트</th>
                    <th rowspan="2" class="rowspan pb-30">회원정보</th>
                    <th colspan="7">상품구분별정보</th>
                </tr>
                <tr class="bg-odd">
                    <th>상품구분</th>
                    <th>상품명</th>
                    <th>결제금액</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>등록사유</th>
                    <th>삭제</th>
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

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 장바구니 담기', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-cart-regist' },
                    { text: '<i class="fa fa-trash-o mr-5"></i> 삭제', className: 'btn-sm btn-danger border-radius-reset btn-cart-delete' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pay/cart/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                rowGroup: {
                    startRender: null,
                    endRender: function(rows, group) {
                        var t_real_sale_price = rows.data().pluck('RealSalePrice').reduce(function(a, b) {
                            return a + b.replace(/[^\d]/g, '') * 1;
                        }, 0);

                        var t_html = '<strong>[총 결제예상금액] <span class="blue">' + addComma(t_real_sale_price) + '</span></strong>';

                        return $('<tr class="bg-odd"><td colspan="4"></td><td colspan="7">' + t_html + '</td></tr>');
                    },
                    dataSrc : 'MemIdx'
                },
                columns: [
                    {'data' : 'MemIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="mem_idx[]" class="flat target-crm-member" value="' + data + '" data-mem-idx="' + row.MemIdx + '">';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'SiteName'},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'ProdTypeCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealSalePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return row.IsRegAdmin === 'Y' ? row.RegAdminName + '(운)' : data;
                    }},
                    {'data' : 'RegDatm'},
                    {'data' : 'AdminRegReason'},
                    {'data' : 'CartIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="cart_idx[]" class="flat" value="' + data + '" data-mem-idx="' + row.MemIdx + '" data-prod-code="' + row.ProdCode + '" data-parent-prod-code="' + row.ParentProdCode + '">';
                    }}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/pay/cart/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 장바구니 담기 버튼 클릭
            $('.btn-cart-regist').on('click', function(event) {
                location.href = '{{ site_url('/pay/cart/create') }}' + dtParamsToQueryString($datatable);
            });

            // 선택 체크박스 클릭
            $datatable.on('ifChanged', 'input[name="mem_idx[]"]', function() {
                var mem_idx = $(this).val();
                var $cart_idx = $list_table.find('input[name="cart_idx[]"][data-mem-idx="' + mem_idx + '"]');

                if ($(this).prop('checked') === true) {
                    $cart_idx.iCheck('check');
                    $cart_idx.iCheck('disable');
                } else {
                    $cart_idx.iCheck('uncheck');
                    $cart_idx.iCheck('enable');
                }
            });

            // 삭제 버튼 클릭
            $('.btn-cart-delete').on('click', function() {
                var $mem_idx = $list_table.find('input[name="mem_idx[]"]:checked');
                var $cart_idx = $list_table.find('input[name="cart_idx[]"]:checked');
                var confirm_msg = $mem_idx.length > 0 ? '해당 회원의 장바구니 전체 내역을 삭제하시겠습니까?' : '해당 장바구니 내역을 삭제하시겠습니까?';
                var json_mem_idx = {}, json_cart_idx = {}, json_prod_code = {}, json_parent_prod_code = {}, data = {};

                if ($cart_idx.length < 1) {
                    alert('삭제할 장바구니 내역을 선택해 주세요.');
                    return;
                }

                if (confirm(confirm_msg)) {
                    $cart_idx.each(function(idx) {
                        json_cart_idx[idx] = $(this).val();
                        json_prod_code[idx] = $(this).data('prod-code');
                        json_parent_prod_code[idx] = $(this).data('parent-prod-code');
                        json_mem_idx[idx] = $(this).data('mem-idx');
                    });

                    data = {
                        '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method' : 'DELETE',
                        'cart_idx' : JSON.stringify(json_cart_idx),
                        'mem_idx' : JSON.stringify(json_mem_idx),
                        'prod_code' : JSON.stringify(json_prod_code),
                        'parent_prod_code' : JSON.stringify(json_parent_prod_code)
                    };

                    sendAjax('{{ site_url('/pay/cart/destroy') }}', data, function(ret) {
                        if (ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $datatable.draw();
                        }
                    }, showError, false, 'POST');
                }
            });
        });
    </script>
@stop
