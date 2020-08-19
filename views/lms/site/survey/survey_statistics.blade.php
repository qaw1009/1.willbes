@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 설문통계를 참고하는 메뉴입니다.</h5>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">설문제목</label>
                    <div class="col-md-3">
                        <select class="form-control" id="search_value" name="search_value" title="설문제목">
                            <option value="">선택하세요</option>
                            @foreach($statistics_title_list as $key => $val)
                                <option value="{{ $val['SsIdx'] }}">{{ $val['SurveyTitle'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">설문기간</label>
                    <div class="col-md-5 form-inline">
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 150px;"  type="text"  value="">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 150px;"  type="text"  value="">
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
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <colgroup>
                        <col style="width:3%">
                        <col style="">
                        <col style="width:19%">
                        <col style="width:7%">
                        <col style="width:15%">
                        <col style="width:12%">
                        <col style="width:7%">
                        <col style="width:7%">
                    </colgroup>
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="rowspan">설문제목</th>
                        <th class="text-center rowspan">설문기간</th>
                        <th class="text-center rowspan">전체 응시인원</th>
                        <th class="text-center rowspan">문항</th>
                        <th class="text-center">항목</th>
                        <th class="text-center">선택 비율</th>
                        <th class="text-center">선택 인원수</th>
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
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');
        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _END_ / _MAX_건 ]",
                },
                lengthMenu: [10, 20, 50, 100, 200],
                pageLength: 50,
                serverSide: true,
                buttons: [
                    @if($count == 0)
                    { text: '<i class="fa fa-copy mr-10"></i> old 데이타 업데이트(1회용)', className: 'btn btn-default btn-sm btn-danger border-radius-reset mr-15 btn-old-survey', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/survey/runOnce') }}' + dtParamsToQueryString($datatable);
                        }},
                    @endif
                ],
                ajax: {
                    'url' : '{{ site_url('/site/survey/surveyStatisticsList') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SurveyTitle', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+'</b>';
                        }},
                    {'data' : 'PeriodDate', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+'</b>';
                        }},
                    {'data' : 'SurveyCount', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+' 명</b>';
                        }},
                    {'data' : 'SurveyQuestion', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.SurveyQuestion;
                        }},
                    {'data' : 'SurveyItem', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.SurveyItem;
                        }},
                    {'data' : 'AnswerRate', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.AnswerRate + '%';
                        }},
                    {'data' : 'AnswerCount', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.AnswerCount + '명';
                        }},
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/site/survey/eventSurveyCreate/') }}' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

        });

        function popGraph(ss_idx){
            var _param = 'ss_idx=' + ss_idx;
            var _url = '{{ site_url('/site/survey/surveyGraphPopup') }}' + '?' + _param;

            win = window.open(_url, 'surveyPopup', 'width=1100, height=845, scrollbars=yes, resizable=yes');
            win.focus();
        }
    </script>
@stop
