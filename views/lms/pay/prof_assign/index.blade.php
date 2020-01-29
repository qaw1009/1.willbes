@extends('lcms.layouts.master')

@section('content')
    <h5>- 종합반 중 종합반 유형이 ’선택형(강사배정)’인 상품을 결제한 수강생의 강사배정현황을 확인할 수 있습니다.</h5>
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
                        <select class="form-control mr-10" id="search_lg_cate_code" name="search_lg_cate_code">
                            <option value="">대분류</option>
                            @foreach($arr_lg_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_md_cate_code" name="search_md_cate_code">
                            <option value="">중분류</option>
                            @foreach($arr_md_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_method_ccd" name="search_pay_method_ccd">
                            <option value="">결제수단</option>
                            @foreach($arr_pay_method_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_status_ccd" name="search_pay_status_ccd">
                            <option value="">결제상태</option>
                            @foreach($arr_pay_status_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_is_unpaid" name="search_is_unpaid">
                            <option value="">미수금여부</option>
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                        </select>
                        <select class="form-control mr-10" id="search_is_prof_assign" name="search_is_prof_assign">
                            <option value="">강사배정여부</option>
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
                            <option value="paid">결제완료일</option>
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
                        <li><i class="fa-li fa fa-check-square-o"></i>[강사배정] 팝업에서 단과반별 수강증 출력이 가능합니다.</li>
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
                    <th class="valign-middle">선택</th>
                    <th class="valign-middle">No</th>
                    <th class="valign-middle">주문번호</th>
                    <th class="valign-middle">회원정보</th>
                    <th class="valign-middle">카테고리</th>
                    <th class="valign-middle">캠퍼스</th>
                    <th class="valign-middle">종합반명</th>
                    <th class="valign-middle">결제루트</th>
                    <th class="valign-middle">결제수단</th>
                    <th>결제금액<br/>(환불금액)</th>
                    <th>결제완료일<br/>(환불완료일)</th>
                    <th class="valign-middle">결제상태</th>
                    <th class="valign-middle">미수금여부</th>
                    <th class="valign-middle">강사배정</th>
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

            // 캠퍼스, 카테고리 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/pay/offProfAssign/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
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
                    {'data' : 'LgCateName', 'render' : function(data, type, row, meta) {
                        return data + (row.MdCateName !== '' ? '>' + row.MdCateName : '');
                    }},
                    {'data' : 'CampusCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '[' + row.ProdCode + '] ' + data;
                    }},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data)
                            + (row.PayStatusCcd === '{{ $chk_pay_status_ccd['refund'] }}' ? '<br/>(' + row.RefundPrice + ')' : '');
                    }},
                    {'data' : 'CompleteDatm', 'render' : function(data, type, row, meta) {
                        return data
                            + (row.PayStatusCcd === '{{ $chk_pay_status_ccd['refund'] }}' ? '<br/>(' + row.RefundDatm + ')' : '');
                    }},
                    {'data' : 'PayStatusCcdName'},
                    {'data' : 'IsUnPaid'},
                    {'data' : 'IsProfAssign', 'render' : function(data, type, row, meta) {
                        return ((row.IsUnPaid === 'N' || (row.IsUnPaid === 'Y' && row.UnPaidUnitNum === '1')) ?
                            '<a class="blue cs-pointer btn-prof-assign" data-order-idx="' + row.OrderIdx + '" data-order-prod-idx="' + row.OrderProdIdx + '" data-prod-code="' + row.ProdCode + '">[강사배정]</a><br/>' + (data === 'Y' ? '<div class="inline-block red">Y</div>' : 'N') : '');
                    }}
                ]
            });

            // 강사배정 버튼 클릭
            $list_table.on('click', '.btn-prof-assign', function() {
                $('.btn-prof-assign').setLayer({
                    'url' : '{{ site_url('/pay/offProfAssign/assign') }}',
                    'width' : 1200,
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'order_idx', 'name' : '주문식별자', 'value' : $(this).data('order-idx'), 'required' : true },
                        { 'id' : 'order_prod_idx', 'name' : '주문상품식별자', 'value' : $(this).data('order-prod-idx'), 'required' : true },
                        { 'id' : 'prod_code', 'name' : '상품코드', 'value' : $(this).data('prod-code'), 'required' : true }
                    ]
                });
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/pay/offProfAssign/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 주문내역 보기
            $list_table.on('click', '.btn-view', function() {
                location.href = '{{ site_url('/pay/offProfAssign/show') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
