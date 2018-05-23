@extends('lcms.layouts.master')

@section('content')
    <h5>- 결제 시 할인 적용될 쿠폰을 발행하는 메뉴입니다. (쿠폰발급 페이지에서 사용내역 확인 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">쿠폰기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', '', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_cate_ccd" name="search_cate_ccd">
                            <option value="">카테고리</option>
                        </select>
                        <select class="form-control mr-10" id="search_issue_route_ccd" name="search_issue_route_ccd">
                            <option value="">배포루트</option>
                        </select>
                        <select class="form-control mr-10" id="search_prod_type_ccd" name="search_prod_type_ccd">
                            <option value="">적용구분</option>
                        </select>
                        <select class="form-control mr-10" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd">
                            <option value="">적용상세구분</option>
                        </select>
                        <select class="form-control mr-10" id="search_apply_range_ccd" name="search_apply_range_ccd">
                            <option value="">적용범위</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">쿠폰검색</label>
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
                            <option value="">유효기간</option>
                            <option value="">등록일</option>
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
                    <th>복사선택</th>
                    <th>운영사이트</th>
                    <th>카테고리</th>
                    <th>쿠폰명</th>
                    <th>배포루트</th>
                    <th>적용구분</th>
                    <th>적용상세구분</th>
                    <th>적용범위</th>
                    <th>사용기간<br/>(유효기간)</th>
                    <th>유효여부</th>
                    <th>할인율<br/>(할인금액)</th>
                    <th>쿠폰발급<br/>(<span class="red">사용</span>/발급)</th>
                    <th>발급여부</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
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

            // 날짜설정 버튼 클릭
            $('.btn-set-search-date').click(function() {
                var period = $(this).data('period');
                var periods = period.split('-');

                // 날짜 설정
                setDefaultDatepicker(-periods[0], periods[1], 'search_start_date', 'search_end_date');

                // set active class
                $('.btn-set-search-date').removeClass('active');
                $(this).addClass('active');
            });

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-files-o mr-5"></i> 쿠폰복사', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-copy' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 쿠폰등록하기', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/coupon/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'CouponIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="radio" name="coupon_idx" class="flat" value="' + data + '">';
                    }},
                    {'data' : 'SiteName'},
                    {'data' : 'CateName'},
                    {'data' : 'CouponName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + row.CouponIdx + '">[' + row.CouponIdx + '] <u class="blue">' + data + '</u></a>';
                    }},
                    {'data' : 'IssueRouteName'},
                    {'data' : 'ApplyTypeName'},
                    {'data' : 'ApplyDetailName'},
                    {'data' : 'ApplyRangeName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.UseDays + '일<br/>(' + row.ValidStartDate + '~' + row.ValidEndDate + ')';
                    }},
                    {'data' : 'IsValid', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '유효' : '<span class="red">만료</span>';
                    }},
                    {'data' : 'DiscRate'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-issue" data-idx="' + row.CouponIdx + '">[쿠폰발급]</a><br/>(<span class="red">' + row.UsedCnt + '</span>/' + row.IssueCnt + ')';
                    }},
                    {'data' : 'IsIssue', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '발급' : '<span class="red">미발급</span>';
                    }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/service/coupon/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop
