@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 설문을 등록하고 관리하는 메뉴입니다.</h5>
    <h5 class="mt-20 red">- 설문링크 와 프로모션페이지 내 그래프를 willbes/pc/eventSurvey/index+SsIdx 와 willbes/pc/eventSurvey/graph+SsIdx 경로에 생성해주세요.</h5>
    <h5 class="mt-20 red">- 프로모션 블레이드에 &#64;include('willbes.pc.eventsurvey.show_graph_partial') </h5>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', false, $arr_site_code) !!}
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">설문제목</label>
                    <div class="col-md-3">
                        <input type="text" id="search_value" name="search_value" class="form-control">
                    </div>
                    <p class="form-control-static">설문제목, 설문번호 검색 가능</p>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_sdate">설문기간</label>
                    <div class="col-md-4 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="search_sdate" name="search_sdate" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="search_edate" name="search_edate" value="">
                        </div>
                    </div>
                    <label class="control-label col-md-1" for="search_sdate">검색조건</label>
                    <div class="col-md-4 form-inline">
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
            <div class="form-group">
                <p class="red">* 설문조사 완료 후 설문통계 페이지에서 해당 설문을 업데이트 해주세요.</p>
            </div>
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <colgroup>
                        <col style="width:4%">
                        <col style="">
                        <col style="width:20%">
                        <col style="width:17%">
                        <col style="width:17%">
                        <col style="width:7%">
                        <col style="width:7%">
                    </colgroup>
                    <thead class="bg-white-gray">
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">설문팝업링크</th>
                            <th class="text-center">그래프추가시</th>
                            <th class="text-center">시작일 / 종료일</th>
                            <th class="text-center">결과</th>
                            <th class="text-center">사용유무</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _END_ / _MAX_건 ]",
                },
                pageLength: 10,
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/surveys/manager/eventSurveyCreate') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/surveys/manager/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SurveyTitle', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.SsIdx + '"><u class="blue">' + row.SurveyTitle + '</u></a>';
                        }},
                    {'data' : 'link', 'class': 'text-center'},
                    {'data' : 'include', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var date = row.StartDate + ' / ' + row.EndDate;
                            return date;
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var AnswerCnt = row.CNT > 0 ? '<button class="btn btn-sm btn-primary act-move" onClick="popGraph(' + row.SsIdx + ')">' + row.CNT + '</button>' : row.CNT;
                            return AnswerCnt;
                        }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var SpUseYn = (row.IsUse === 'Y') ? '<span>사용</span>' : '<span class="red">미사용</span>';
                            return SpUseYn;
                        }},
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/site/surveys/manager/eventSurveyCreate/') }}' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

        });

        function popGraph(ss_idx){
            var _param = 'ss_idx=' + ss_idx;
            var _url = '{{ site_url('/site/surveys/manager/surveyGraphPopup') }}' + '?' + _param;

            win = window.open(_url, 'surveyPopup', 'width=1100, height=845, scrollbars=yes, resizable=yes');
            win.focus();
        }
    </script>
@stop
