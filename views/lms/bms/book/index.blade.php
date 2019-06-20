@extends('lcms.layouts.master')

@section('content')
    <h5>- 강좌 구성을 위한 교재 정보를 관리하는 메뉴입니다. (WBS > PMS 정보 연동)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">교재기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
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
                        <select class="form-control mr-10" id="search_subject_idx" name="search_subject_idx">
                            <option value="">과목</option>
                            @foreach($arr_subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_prof_idx" name="search_prof_idx">
                            <option value="">교수</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                        <select class="form-control mr-10" id="search_w_is_use" name="search_w_is_use">
                            <option value="">사용여부(W)</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                        <select class="form-control" id="search_sale_ccd" name="search_sale_ccd">
                            <option value="">판매여부</option>
                            @foreach($arr_sale_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_publ_author">출판/저자명</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="search_publ_author" name="search_publ_author">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">신규/추천</label>
                    <div class="col-md-5 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="search_chk_is_new" id="search_chk_is_new" class="flat" value="Y"> 신규
                        </div>
                        &nbsp;
                        <div class="checkbox">
                            <input type="checkbox" name="search_chk_is_best" id="search_chk_is_best" class="flat" value="Y"> 추천
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
                    <th>과목/교수정보</th>
                    <th>교재코드</th>
                    <th>교재명</th>
                    <th>출판사</th>
                    <th>저자</th>
                    <th>판매가</th>
                    <th>신규</th>
                    <th>추천</th>
                    <th>재고</th>
                    <th>사용여부</th>
                    <th>사용여부(W)</th>
                    <th>판매여부</th>
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
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 신규/추천 적용', className: 'btn-sm btn-success border-radius-reset mr-15 btn-new-best-modify' },
                    { text: '<i class="fa fa-files-o mr-5"></i> 교재복사', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-copy' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 교재등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/bms/book/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ],
                ajax: {
                    'url' : '{{ site_url('/bms/book/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'ProdCode', 'render' : function(data, type, row, meta) {
                        return '<input type="radio" name="prod_code" class="flat" value="' + data + '">';
                    }},
                    {'data' : 'SiteName'},
                    {'data' : 'BCateName', 'render' : function(data, type, row, meta) {
                        return data + (row.MCateName !== '' ? ' > ' + row.MCateName : '');
                    }},
                    {'data' : 'ProfSubjectNames', 'render' : function(data, type, row, meta) {
                        return data !== null ? data.replace(/,/g, '<br/>') : '';
                    }},
                    {'data' : 'ProdCode'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + row.ProdCode + '"><u class="blue">' + data + '</u></a>';
                    }},
                    {'data' : 'wPublName'},
                    {'data' : 'wAuthorNames'},
                    {'data' : 'RealSalePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + '원';
                    }},
                    {'data' : 'IsNew', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="is_new" class="flat" value="Y" data-idx="' + row.ProdCode + '" data-origin-is-new="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                    }},
                    {'data' : 'IsBest', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="is_best" class="flat" value="Y" data-idx="' + row.ProdCode + '" data-origin-is-best="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                    }},
                    {'data' : 'wStockCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'wSaleCcdName'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 교재복사 버튼 클릭
            $('.btn-copy').on('click', function() {
                var prod_code = $list_table.find('input[name="prod_code"]:checked').val();
                if (typeof prod_code === 'undefined') {
                    alert('복사할 교재를 선택해 주세요.');
                    return;
                }

                location.href = '{{ site_url('/bms/book/create') }}/' + prod_code + '/copy' + dtParamsToQueryString($datatable);
            });

            // 과목, 교수 자동 변경
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");
            $search_form.find('select[name="search_subject_idx"]').chained("#search_site_code");
            $search_form.find('select[name="search_prof_idx"]').chained("#search_site_code");

            // 신규, 추천 상태 변경
            $('.btn-new-best-modify').on('click', function() {
                if (!confirm('신규/추천 상태를 적용하시겠습니까?')) {
                    return;
                }

                var $is_new = $list_table.find('input[name="is_new"]');
                var $is_best = $list_table.find('input[name="is_best"]');
                var $params = {};
                var origin_val, this_val, this_new_val, this_best_val;

                $is_new.each(function(idx) {
                    // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                    this_new_val = $(this).filter(':checked').val() || 'N';
                    this_best_val = $is_best.eq(idx).filter(':checked').val() || 'N';
                    this_val = this_new_val + ':' + this_best_val;
                    origin_val = $(this).data('origin-is-new') + ':' + $is_best.eq(idx).data('origin-is-best');

                    if (this_val !== origin_val) {
                        $params[$(this).data('idx')] = { 'IsNew' : this_new_val, 'IsBest' : this_best_val };
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/bms/book/redata') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/bms/book/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
