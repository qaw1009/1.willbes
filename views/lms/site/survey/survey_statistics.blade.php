@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 설문통계를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="survey_update">설문통계로 업데이트</label>
                <div class="col-md-3">
                    <select class="form-control" id="survey_update" name="survey_update" title="설문업데이트">
                        <option value="">선택하세요</option>
                        @foreach($statistics_title_list as $key => $val)
                            <option value="{{ $val['SsIdx'] }}">{{ $val['SurveyTitle'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <button type="button" class="btn-sm btn-danger btn_survey_update">업데이트</button>
                    <span class="red">* 선택한 설문을 설문통계로 업데이트해줍니다.</span>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">설문제목</label>
                    <div class="col-md-3">
                        <input type="text" id="search_value" name="search_value" class="form-control">
                    </div>
                    <p class="form-control-static">설문제목, 설문번호 검색 가능</p>
                </div>

                <div class="form-group form-inline">
                    <label class="control-label col-md-1" for="search_sdate">설문기간</label>
                    <div class="input-group mb-0 ml-10">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control datepicker" id="search_sdate" name="search_sdate" value="">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control datepicker" id="search_edate" name="search_edate" value="">
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
                        <col style="width:4%">
                        <col style="width:25%">
                        <col style="width:12%">
                        <col style="width:5%">
                        <col style="width:5%">
                        <col style="width:7%">
                        <col style="width:10%">
                        <col style="">

                    </colgroup>
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="rowspan">설문번호</th>
                        <th class="rowspan">설문제목</th>
                        <th class="text-center rowspan">설문기간</th>
                        <th class="text-center rowspan">전체<br/>응시인원</th>
                        <th class="text-center rowspan">설문통계<br/>등록자</th>
                        <th class="text-center rowspan">설문통계<br/>등록일</th>
                        <th class="text-center rowspan">문항</th>
                        <th class="text-center">세부내역</th>
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
                lengthMenu: [50, 100, 200],
                pageLength: 50,
                serverSide: true,
                buttons: [
                    @if($old_survey_count == 0)
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
                    {'data' : 'SubIdx', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+'</b>';
                        }},
                    {'data' : 'SurveyTitle', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<button class="btn btn-sm btn-primary act-move" onClick="popGraph(' + row.SubIdx + ')">'+data+'</button>';
                        }},
                    {'data' : 'PeriodDate', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+'</b>';
                        }},
                    {'data' : 'SurveyCount', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+' 명</b>';
                        }},
                    {'data' : 'RegAdminName', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+'</b>';
                        }},
                    {'data' : 'RegDatm', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<b>'+data+'</b>';
                        }},
                    {'data' : 'SurveyQuestion', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.SurveyQuestion;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SpreadData + '<br/>' + row.CountData;
                        }},
                ]
            });

        });

        // 설문 업데이트
        $(".btn_survey_update").click(function () {
            var sub_idx = $("#survey_update option:selected").val();

            if(sub_idx == ''){
                alert('설문을 선택해주세요.');
                return;
            }

            if(confirm("해당 설문을 업데이트하시겠습니까?")) {
                location.href = '{{ site_url('/site/survey/storeSurveyStatistics/') }}' + sub_idx + dtParamsToQueryString($datatable);
            }
        });

        function popGraph(sub_idx){
            var _param = 'sub_idx=' + sub_idx;
            var _url = '{{ site_url('/site/survey/statisticsGraphPopup') }}' + '?' + _param;

            win = window.open(_url, 'statisticsPopup', 'width=1200, height=845, scrollbars=yes, resizable=yes');
            win.focus();
        }
    </script>
@stop
