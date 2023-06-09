@extends('lcms.layouts.master')

@section('content')
    <h5>- 관리자가 종합반 수강접수를 진행하는 메뉴입니다. (종합반 유형이 ‘일반형’,’선택형(강사배정)’)인 경우만 해당)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">결제기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd" title="캠퍼스">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" >{{$row['CampusName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_pack_type_ccd" name="search_pack_type_ccd" title="종합반유형">
                            <option value="">종합반유형</option>
                            @foreach($arr_pack_type_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_pay_route_ccd" name="search_pay_route_ccd" title="결제루트">
                            <option value="">결제루트</option>
                            @foreach($arr_pay_route_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_pay_method_ccd" name="search_pay_method_ccd" title="결제수단">
                            <option value="">결제수단</option>
                            @foreach($arr_pay_method_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_pay_status_ccd" name="search_pay_status_ccd" title="결제상태">
                            <option value="">결제상태</option>
                            @foreach($arr_pay_status_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_unpaid" name="search_is_unpaid" title="미수금여부">
                            <option value="">미수금여부</option>
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3 form-inline">
                        <select class="form-control" id="search_member_keyword" name="search_member_keyword" style="width: 26%;" title="회원검색키워드">
                            <option value="MemName">회원명</option>
                            <option value="MemId">회원아이디</option>
                            <option value="MemIdx">회원식별자</option>
                            <option value="Phone3">휴대폰번호</option>
                        </select>
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value" style="width: 72%;" title="회원검색어">
                    </div>
                    <div class="col-md-8">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                    <div class="col-md-3 form-inline">
                        <select class="form-control" id="search_prod_keyword" name="search_prod_keyword" style="width: 26%;" title="상품검색키워드">
                            <option value="OrderNo">주문번호</option>
                            <option value="OrderIdx">주문식별자</option>
                            <option value="CertNo">수강증번호</option>
                            <option value="ProdCode">상품코드</option>
                            <option value="ProdName">상품명</option>
                        </select>
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value" style="width: 72%;" title="상품검색어">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 주문번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_date_type" name="search_date_type" title="날짜구분">
                            <option value="order">접수신청일</option>
                            <option value="paid">결제완료일</option>
                        </select>
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" title="조회시작일">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" title="조회종료일">
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
            <div class="row">
                <div class="col-md-12">
                    <ul class="fa-ul mb-0">
                        <li><i class="fa-li fa fa-check-square-o"></i>‘일반형’, ’선택형(강사배정)’ 종합반만 관리자가 수기로 수강접수 가능하며, 프론트에서 접수대기로 신청한 ‘선택형(강사배정)’ 종합반의 경우도 수강접수 가능합니다.</li>
                        <li><i class="fa-li fa fa-check-square-o"></i>프론트에서 접수대기로 신청한 ‘일반형’, ’선택형’ 종합반은 [일반]수강접수 메뉴에서만 확인 및 수강접수 가능합니다.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th rowspan="2" class="rowspan valign-middle">선택</th>
                    <th rowspan="2" class="valign-middle">No</th>
                    <th rowspan="2" class="rowspan valign-middle">주문번호</th>
                    <th rowspan="2" class="rowspan valign-middle">회원정보</th>
                    <th rowspan="2" class="rowspan valign-middle">결제루트</th>
                    <th rowspan="2" class="rowspan valign-middle">결제수단</th>
                    <th rowspan="2" class="rowspan valign-middle">결제완료일<br/>(접수신청일)</th>
                    <th colspan="10">상품구분별정보</th>
                </tr>
                <tr class="bg-odd">
                    <th>상품구분</th>
                    <th>캠퍼스</th>
                    <th>종합반유형</th>
                    <th>상품명</th>
                    <th>결제금액</th>
                    <th>환불금액</th>
                    <th>환불처리</th>
                    <th>결제상태</th>
                    <th>미수금여부</th>
                    <th>수강증출력</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script src="/public/js/lms/common_order.js"></script>
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
                    'url' : '{{ site_url('/pay/offVisitPackage/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.PayStatusCcd === '{{ $chk_pay_status_ccd['receipt_wait'] }}') {
                        $(row).addClass('bg-info');
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

                        return $('<tr class="bg-odd"><td colspan="7"></td><td colspan="10">' + t_html + '</td></tr>');
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
                        return '<a class="blue cs-pointer btn-view" data-idx="' + row.OrderIdx + '"><u>' + data + '</u></a><br/>' + row.SiteName + (row.IsEscrow === 'Y' ? '(e)' : '') +
                            (row.CertNo !== null ? '<br/>(수강증 : ' + row.CertNo + ')' : '');
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'CompleteDatm', 'render' : function(data, type, row, meta) {
                        return data !== null ? data : '' + '(' + row.OrderDatm + ')';
                    }},
                    {'data' : 'ProdTypeCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }},
                    {'data' : 'CampusCcdName'},
                    {'data' : 'PackTypeCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return row.PayStatusCcd === '{{ $chk_pay_status_ccd['refund'] }}' ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.PayStatusCcd === '{{ $chk_pay_status_ccd['paid'] }}' ? '<button class="btn btn-xs btn-success mr-0 btn-refund" data-order-idx="' + row.OrderIdx + '">환불처리</button>' : '';
                    }},
                    {'data' : 'PayStatusCcdName', 'render' : function(data, type, row, meta) {
                        return (row.PayStatusCcd === '{{ $chk_pay_status_ccd['receipt_wait'] }}' ? '<a class="blue cs-pointer btn-visit-order" data-idx="' + row.OrderIdx + '"><u>' + data + '</u></a>' : data)
                            + (row.PayStatusCcd === '{{ $chk_pay_status_ccd['refund'] }}' ? '<br/>' + (row.RefundDatm !== null ? row.RefundDatm.substr(0, 10) : '') + '<br/>(' + row.RefundAdminName + ')' : '');
                    }},
                    {'data' : 'IsUnPaid', 'render' : function(data, type, row, meta) {
                        return data === 'Y' ? '<a class="red cs-pointer btn-unpaid-order" data-order-idx="' + row.OrderIdx + '" data-unpaid-idx="' + row.UnPaidIdx + '" data-prod-code="' + row.ProdCode + '" data-mem-idx="' + row.MemIdx + '"><u>Y</u></a>' : 'N';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        {{-- 결제완료 일반형 종합반일 경우만 수강증 출력 버튼 노출 (미수금 주문일 경우 1번째 주문건만 노출) --}}
                        if (row.PayStatusCcd === '{{ $chk_pay_status_ccd['paid'] }}' && row.PackTypeCcd === '{{ $chk_pack_type_ccd['normal'] }}' && (row.IsUnPaid === 'N' || (row.IsUnPaid === 'Y' && row.UnPaidUnitNum === '1'))) {
                            return '<button type="button" class="btn btn-xs btn-success mr-0 btn-print" data-site-code="' + row.SiteCode + '" data-order-idx="' + row.OrderIdx + '" data-order-prod-idx="' + row.OrderProdIdx + '">수강증출력</button>' +
                                (row.IsPrintCert === 'Y' ? '<br/><a class="red cs-pointer btn-print-log" data-toggle="popover" data-html="true" data-placement="left" data-content="" data-order-idx="' + row.OrderIdx + '" data-order-prod-idx="' + row.OrderProdIdx + '">(Y)</a>' : '');
                        } else {
                            return '';
                        }
                    }}
                ]
            });

            // 수강접수하기 버튼 클릭
            $('.btn-visit-order').on('click', function() {
                {!! check_menu_perm_inner_script('write') !!}
                location.href = '{{ site_url('/pay/offVisitPackage/create') }}' + dtParamsToQueryString($datatable);
            });

            // 접수대기 버튼 클릭
            $list_table.on('click', '.btn-visit-order', function() {
                location.href = '{{ site_url('/pay/offVisitPackage/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            // 미수금여부 클릭
            $list_table.on('click', '.btn-unpaid-order', function() {
                location.href = '{{ site_url('/pay/offVisitPackage/create/') }}' + $(this).data('order-idx') + '/' + $(this).data('unpaid-idx') + '/' + $(this).data('prod-code') + '/' + $(this).data('mem-idx') + dtParamsToQueryString($datatable);
            });

            // 수강증 출력 버튼 클릭
            $list_table.on('click', '.btn-print', function() {
                var url = '{{ site_url('/common/printCert/') }}?prod_type=off_lecture&order_idx=' + $(this).data('order-idx') + '&order_prod_idx=' + $(this).data('order-prod-idx') + '&site_code=' + $(this).data('site-code');
                popupOpen(url, '_cert_print', 620, 350);
            });

            // 수강증 출력 로그 보기
            $list_table.on('mouseover', '.btn-print-log', function() {
                // 수강증 출력 로그 조회
                if ($(this).data('content').length < 1) {
                    var html = getPrintCertLog('PrintCert', $(this).data('order-idx'), $(this).data('order-prod-idx'), '');
                    $(this).data('content', html);
                }
            });

            // 환불처리 버튼 클릭
            $list_table.on('click', '.btn-refund', function() {
                {!! check_menu_perm_inner_script('write') !!}
                window.open('{{ site_url('/pay/refundProc/show/') }}' + $(this).data('order-idx'), '_blank');
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                {!! check_menu_perm_inner_script('excel') !!}
                event.preventDefault();
                var confirm_msg = '{{ config_get('privacy_excel_down_msg', '정말로 엑셀다운로드 하시겠습니까?') }}';
                if (confirm(confirm_msg)) {
                    formCreateSubmit('{{ site_url('/pay/offVisitPackage/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 주문내역 보기
            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/pay/offVisitPackage/show') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
