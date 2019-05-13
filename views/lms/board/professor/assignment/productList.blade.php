@extends('lcms.layouts.master')

@section('content')
<h5>- {{$arr_prof_info['ProfNickName']}} 교수 첨삭 게시판</h5>
@include('lms.board.professor.assignment.common_partial')

<form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    {!! html_def_site_tabs($arr_prof_info['SiteCode'], 'tabs_site_code', 'tab', false, [], false, array($arr_prof_info['SiteCode'] => $arr_prof_info['SiteName'])) !!}
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">강좌검색</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="search_value" name="search_value">
                </div>
                <div class="col-md-2">
                    <p class="form-control-static">명칭, 코드 검색 가능</p>
                </div>

                <label class="control-label col-md-1 col-lg-offset-1" for="search_is_use">조건검색</label>
                <div class="col-md-2 form-inline">
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
            <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
        </div>
    </div>
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table" class="table table-striped table-bordered">
            <thead>
            <tr class="bg-odd">
                <th rowspan="2" class="pb-30">NO</th>
                <th rowspan="2" class="rowspan pb-30">강좌기본정보</th>
                <th rowspan="2" class="rowspan pb-30">강좌유형</th>
                <th rowspan="2" class="rowspan pb-30">과정</th>
                <th rowspan="2" class="rowspan pb-30">과목</th>
                <th rowspan="2" class="rowspan pb-30">단강좌명</th>
                <th rowspan="2" class="rowspan pb-30">판매가</th>
                <th rowspan="2" class="rowspan pb-30">과제등록</th>
                <th rowspan="2" class="rowspan pb-30">첨삭현황</th>
                <th colspan="4">강좌별 첨삭</th>
            </tr>
            <tr class="bg-odd">
                <th>총과제 수</th>
                <th>미체점 수</th>
                <th>체점 수</th>
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
        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [],
            ajax: {
                'url' : '{{ site_url("/board/professor/{$boardName}/productListAjax?") }}' + '{!! $boardDefaultQueryString !!}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            rowsGroup: ['.rowspan'],
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                    }},
                {'data' : 'LecTypeCcd_Name'},//강좌유형
                {'data' : 'CourseName'},//과정명
                {'data' : 'SubjectName'},//과목명
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '['+row.ProdCode+ '] ' + row.ProdName;
                    }},//단강좌명
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                    }},//판매가
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-assignment-manager" data-prod-code="' + row.ProdCode + '"><u>등록</u></a>';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-assignment-info" data-prod-code="' + row.ProdCode + '"><u>확인</u></a>';
                    }},
                {'data' : 'BoardTotalCnt'}, //첨삭 수
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<span class="red">' + row.BoardCnt2 + '</span>';
                    }},
                {'data' : 'BoardCnt3'}, //첨삭 체점 수
            ],
        });

        //과제등록관리
        $list_table.on('click', '.btn-assignment-manager', function() {
            location.href='{{ site_url("/board/professor/{$boardName}/registForBoard") }}/' + $(this).data('prod-code') + '?' + '{!! $boardDefaultQueryString !!}';
        });

        //과제현황관리
        $list_table.on('click', '.btn-assignment-info', function() {
            location.href='{{ site_url("/board/professor/{$boardName}/issueForBoard") }}/' + $(this).data('prod-code') + '?' + '{!! $boardDefaultQueryString !!}';
        });
    });
</script>
@stop