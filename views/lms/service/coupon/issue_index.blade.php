@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원별 전체 쿠폰 사용 현황을 확인할 수 있습니다.</h5>
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
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능 (관리자명, 아이디 검색 가능)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">쿠폰/상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1">쿠폰사용조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-10" id="search_is_issue" name="search_is_issue">
                            <option value="">발급여부</option>
                            <option value="Y">발급</option>
                            <option value="N">미발급</option>
                        </select>
                        <select class="form-control mr-10" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">발급</option>
                            <option value="N">미사용</option>
                        </select>
                        <select class="form-control mr-10" id="search_is_valid" name="search_is_valid">
                            <option value="">유효여부</option>
                            <option value="Y">유효</option>
                            <option value="N">만료</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="">발급일</option>
                            <option value="">사용일</option>
                            <option value="">회수일</option>
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
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                    <th>No</th>
                    <th>회원명 (아이디)</th>
                    <th>휴대폰번호</th>
                    <th>쿠폰정보</th>
                    <th>발급구분</th>
                    <th>발급일 (발급자)</th>
                    <th>유효여부 (만료일)</th>
                    <th>사용여부 (사용일)</th>
                    <th>사용상품 (주문번호)</th>
                    <th>발급회수일 (회수자)</th>
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

            // 쿠폰발급 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-undo mr-5"></i> 쿠폰발급회수', className: 'btn-sm btn-success border-radius-reset mr-15 btn-issue-back' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/coupon/issue/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'CouponIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="" class="flat" value="' + data + '">';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '<u class="blue">(' + row.MemId + ')</u>';
                    }},
                    {'data' : 'Phone', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.SmsRcvStatus + ')';
                    }},
                    {'data' : 'CouponName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + row.CouponIdx + '">[' + row.CouponIdx + '] <u class="blue">' + data + '</u></a>';
                    }},
                    {'data' : 'IssueTypeName'},
                    {'data' : 'IssueDate', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.IssuerName + ')';
                    }},
                    {'data' : 'IsValid', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '유효 (' + row.ExpireDate + ')' : '<span class="red">만료</span> (' + row.ExpireDate + ')';
                    }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용 (' + row.UsedDate + ')' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return data + '<u class="blue">(' + row.OrderNo + ')</u>';
                    }},
                    {'data' : 'BackDate', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.BackName + ')';
                    }}
                ]
            });

            // 쿠폰 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/service/coupon/regist/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop
