@extends('lcms.layouts.master')

@section('content')
    <h5>- 강좌 구성을 위한 교재 정보를 관리하는 메뉴입니다. (WBS > PMS 정보 연동)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드, 아이디 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
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
                    <th rowspan="2" class="pb-30">No</th>
                    <th rowspan="2" class="pb-30">운영사이트</th>
                    <th rowspan="2" class="pb-30">교재코드</th>
                    <th rowspan="2" class="pb-30">교재아이디</th>
                    <th rowspan="2" class="pb-30">교재명</th>
                    <th rowspan="2" class="pb-20">카테고리정보<br/>(대표카테고리만 표기)</th>
                    <th colspan="3" style="border-width: 1px; border-left: 0; border-bottom: 0;">게시판운영여부</th>
                    <th rowspan="2" class="pb-30">사용여부</th>
                    <th rowspan="2" class="pb-30">등록자</th>
                    <th rowspan="2" class="pb-30">등록일</th>
                </tr>
                <tr>
                    <th style="">공지</th>
                    <th>Q&A</th>
                    <th style="border-right-width: 1px;">자료실</th>
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
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 신규/추천 적용', className: 'btn-sm btn-success border-radius-reset mr-15 btn-new-best-modify' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 교재 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/bms/book/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ],
                ajax: {
                    'url' : '{{ site_url('/product/base/professor/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'SiteName'},
                    {'data' : 'ProfIdx'},
                    {'data' : 'wProfId'},
                    {'data' : 'wProfName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + row.ProfIdx + '"><u class="blue">' + data + '</u></a>';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.CateName + ' > ' + row.SubjectName;
                    }},
                    {'data' : 'IsNoticeBoard'},
                    {'data' : 'IsQnaBoard'},
                    {'data' : 'IsDataBoard'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/bms/book/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop
