@extends('lcms.layouts.master')

@section('content')
    <h5>- 관리자가 임의로 0원 상품을 부여할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">결제기본정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_pay_route_ccd" name="search_pay_route_ccd" title="결제루트">
                            <option value="">결제루트</option>
                        @foreach($arr_pay_route_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                         <select class="form-control" id="search_prod_type_ccd" name="search_prod_type_ccd" title="상품구분">
                            <option value="">상품구분</option>
                        @foreach($arr_prod_type_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd" title="상품상세구분">
                            <option value="">상품상세구분</option>
                        @foreach($arr_learn_pattern_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control" id="search_pay_status_ccd" name="search_pay_status_ccd" title="결제상태">
                            <option value="">결제상태</option>
                        @foreach($arr_pay_status_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control" id="search_delivery_status_ccd" name="search_delivery_status_ccd" title="배송상태">
                            <option value="">배송상태</option>
                        @foreach($arr_delivery_status_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control" id="search_admin_reason_ccd" name="search_admin_reason_ccd" title="부여사유유형">
                            <option value="">부여사유유형</option>
                        @foreach($arr_admin_reason_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                        </select>
                        <select class="form-control" id="search_is_lec_unit" name="search_is_lec_unit" title="회차등록여부">
                            <option value="">회차등록여부</option>
                            <option value="Y">회차등록</option>
                            <option value="N">일반등록</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3 form-inline">
                        <select class="form-control" id="search_member_keyword" name="search_member_keyword" style="width: 26%;" title="회원검색키워드">
                            <option value="MemId">회원아이디</option>
                            <option value="MemIdx">회원식별자</option>
                            <option value="MemName">회원명</option>
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
                            <option value="paid">결제완료일</option>
                            <option value="refund">환불완료일</option>
                            <option value="delivery_send">발송완료일</option>
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
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="rowspan">선택</th>
                    <th class="">No</th>
                    <th class="rowspan">주문번호</th>
                    <th class="rowspan">회원정보</th>
                    <th class="rowspan">결제루트</th>
                    <th class="rowspan">결제완료일</th>
                    <th class="">상품구분</th>
                    <th class="">상품명</th>
                    <th class="">회차수</th>
                    <th class="rowspan">결제상태</th>
                    <th class="">수강시작일 (수강기간)</th>
                    <th class="">부여사유유형</th>
                    <th class="">상세부여사유</th>
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
                    { text: '<i class="fa fa-pencil mr-5"></i> 0원결제등록', className: 'btn-sm btn-success border-radius-reset btn-zero-order' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pay/zeroPay/listAjax') }}',
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
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'CompleteDatm'},
                    {'data' : 'ProdTypeCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return (row.LecTypeCcdName !== '' ? '<span class="red no-line-height">' + row.LecTypeCcdName + '</span> ' : '')
                            + '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> '
                            + data + (row.RealPayPrice > 0 ? ' (' + addComma(row.RealPayPrice) + '원)' : '');
                    }},
                    {'data' : 'wUnitCnt', 'render' : function(data, type, row, meta) {
                        return data;
                    }},
                    {'data' : 'PayStatusCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.PayStatusCcd === '{{ $_pay_status_ccd['refund'] }}' ? '<br/>' + (row.RefundDatm !== null ? row.RefundDatm.substr(0, 10) : '') + '<br/>(' + row.RefundAdminName + ')' : '');
                    }},
                    {'data' : 'LecStartDate', 'render' : function(data, type, row, meta) {
                        return data != null ? data + '<br/>(' + row.LecExpireDay + '일)' : '';
                    }},
                    {'data' : 'AdminReasonCcdName'},
                    {'data' : 'AdminEtcReason', 'render' : function(data, type, row, meta) {
                        return data != null ? data.substr(0, 20) : '';
                    }}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                {!! check_menu_perm_inner_script('excel') !!}
                event.preventDefault();
                var confirm_msg = '{{ config_get('privacy_excel_down_msg', '정말로 엑셀다운로드 하시겠습니까?') }}';
                if (confirm(confirm_msg)) {
                    formCreateSubmit('{{ site_url('/pay/zeroPay/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 0원결제등록 버튼 클릭
            $('.btn-zero-order').on('click', function() {
                {!! check_menu_perm_inner_script('write') !!}
                location.href = '{{ site_url('/pay/zeroPay/create') }}' + dtParamsToQueryString($datatable);
            });

            // 주문내역 보기
            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/pay/zeroPay/show') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
