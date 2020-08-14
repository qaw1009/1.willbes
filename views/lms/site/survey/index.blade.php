@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 설문을 등록하는 메뉴입니다.</h5>
    <h5 class="mt-20 red">- 설문링크 와 프로모션페이지 내 그래프를 willbes/pc/eventSurvey/index+spidx 와 willbes/pc/eventSurvey/graph+spidx 경로에 생성해주세요.</h5>
    <h5 class="mt-20 red">- 프로모션 블레이드에 &#64;include('willbes.pc.eventsurvey.show_graph_partial') </h5>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
    </form>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="MgIdx" name="MgIdx" value="">
    </form>

    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
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
                pageLength: 10,
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/survey/eventSurveyCreate') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/survey/eventSurveyList') }}',
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
                    {'data' : 'SurveyIsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var SpUseYn = (row.SurveyIsUse === 'Y') ? '<span>사용</span>' : '<span class="red">미사용</span>';
                            return SpUseYn;
                        }},
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/site/survey/eventSurveyCreate/') }}' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

        });

        function popGraph(sp_idx){
            var _param = 'sp_idx=' + sp_idx;
            var _url = '{{ site_url('/site/survey/surveyGraphPopup') }}' + '?' + _param;

            win = window.open(_url, 'surveyPopup', 'width=1100, height=845, scrollbars=yes, resizable=yes');
            win.focus();
        }
    </script>
@stop
