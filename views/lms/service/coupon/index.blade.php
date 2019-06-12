@extends('lcms.layouts.master')

@section('content')
    <h5>- 결제 시 할인 적용될 쿠폰을 발행하는 메뉴입니다. (쿠폰발급 페이지에서 사용내역 확인 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">쿠폰기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_cate_code" name="search_cate_code">
                            <option value="">카테고리</option>
                            @foreach($arr_cate_code as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_deploy_type" name="search_deploy_type">
                            <option value="">배포루트</option>
                            <option value="N">온라인</option>
                            <option value="F">오프라인</option>
                        </select>
                        <select class="form-control mr-10" id="search_apply_type_ccd" name="search_apply_type_ccd">
                            <option value="">적용구분</option>
                            @foreach($arr_apply_type_ccd as $key => $arr)
                                <option value="{{ $key }}">{{ $arr[0] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_lec_type_ccd" name="search_lec_type_ccd">
                            <option value="">적용상세구분</option>
                            @foreach($arr_lec_type_ccd as $key => $arr)
                                <option value="{{ $key }}">{{ $arr[0] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_apply_range_type" name="search_apply_range_type">
                            <option value="">적용범위</option>
                            <option value="A">전체</option>
                            <option value="I">항목별</option>
                            <option value="P">특정상품</option>
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
                        <select class="form-control mr-10" id="search_issue_valid" name="search_issue_valid">
                            <option value="">유효여부</option>
                            <option value="유효">유효</option>
                            <option value="만료">만료</option>
                            <option value="발급전">발급전</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="I">유효기간</option>
                            <option value="R">등록일</option>
                        </select>
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
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
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>복사<br/>선택</th>
                    <th class="valign-middle">운영사이트</th>
                    <th class="valign-middle">카테고리</th>
                    <th class="valign-middle">쿠폰명</th>
                    <th class="valign-middle">배포루트</th>
                    <th class="valign-middle">쿠폰유형</th>
                    <th>핀번호유형<br/>(발급개수)</th>
                    <th class="valign-middle">적용구분</th>
                    <th class="valign-middle">적용상세구분</th>
                    <th class="valign-middle">적용범위</th>
                    <th>사용기간<br/>(유효기간)</th>
                    <th class="valign-middle">유효여부</th>
                    <th>할인율<br/>(할인금액)</th>
                    <th>쿠폰발급<br/>(<span class="red">사용</span>/발급)</th>
                    <th class="valign-middle">발급여부</th>
                    <th class="valign-middle">등록자</th>
                    <th class="valign-middle">등록일</th>
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

            // 카테고리 자동변경
            $search_form.find('select[name="search_cate_code"]').chained("#search_site_code");

            // 쿠폰 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-files-o mr-5"></i> 쿠폰복사', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-copy' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 쿠폰등록하기', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/coupon/regist/listAjax') }}',
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
                        return '<a href="#none" class="btn-modify" data-idx="' + row.CouponIdx + '"><u class="blue">' + data + '</u></a> [' + row.CouponIdx + ']';
                    }},
                    {'data' : 'DeployName'},
                    {'data' : 'CouponTypeName'},
                    {'data' : 'PinName', 'render' : function(data, type, row, meta) {
                        return data + ((row.PinType === 'R') ? '<br/>(' + row.PinIssueCnt + '개)' : '');
                    }},
                    {'data' : 'ApplyTypeName'},
                    {'data' : 'LecTypeNames', 'render' : function(data, type, row, meta) {
                        return data.replace(/,/gi, '<br/>');
                    }},
                    {'data' : 'ApplyRangeName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.ValidDay + '일<br/>(' + row.IssueStartDate + '~' + row.IssueEndDate + ')';
                    }},
                    {'data' : 'IssueValid', 'render' : function(data, type, row, meta) {
                        return (data !== '유효') ? '<span class="red">' + data + '</span>' : data;
                    }},
                    {'data' : 'DiscRate', 'render' : function(data, type, row, meta) {
                        return data + ((row.DiscType === 'R') ? '%' : '원');
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<a href="#none" class="btn-issue" data-idx="' + row.CouponIdx + '"><u>[쿠폰발급]</u></a><br/>(<span class="red">' + row.UseCnt + '</span>/' + row.IssueCnt + ')';
                    }},
                    {'data' : 'IsIssue', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '발급' : '<span class="red">미발급</span>';
                    }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 쿠폰복사 버튼 클릭
            $('.btn-copy').on('click', function() {
                var coupon_idx = $list_table.find('input[name="coupon_idx"]:checked').val();
                if (typeof coupon_idx === 'undefined') {
                    alert('복사할 쿠폰을 선택해 주세요.');
                    return;
                }

                location.href = '{{ site_url('/service/coupon/regist/create') }}/' + coupon_idx + '/copy' + dtParamsToQueryString($datatable);
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/service/coupon/regist/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 데이터 등록 폼
            $('.btn-regist').on('click', function() {
                location.href = '{{ site_url('/service/coupon/regist/create') }}' + dtParamsToQueryString($datatable);
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/service/coupon/regist/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            // 쿠폰발급 폼
            $list_table.on('click', '.btn-issue', function() {
                location.href = '{{ site_url('/service/coupon/issue/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
