@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 설문을 등록하고 관리하는 메뉴입니다.</h5>
    <h5 class="mt-20 red">- 설문링크 와 프로모션페이지 내 그래프를 willbes/pc/eventSurvey/index+SsIdx 와 willbes/pc/eventSurvey/graph+SsIdx 경로에 생성해주세요.</h5>
    <h5 class="mt-20 red">- 프로모션 블레이드에 &#64;include('willbes.pc.eventsurvey.show_graph_partial') </h5>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs('', 'tabs_site_code', 'tab', true, [], true) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_is_use">조건</label>
                            <div class="col-md-11 form-inline">
                                {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', true) !!}
                                <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                                    <option value="">캠퍼스</option>
                                    @foreach($arr_campus as $row)
                                        <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                                    @endforeach
                                </select>

                                <select class="form-control" id="search_category" name="search_category">
                                    <option value="">카테고리</option>
                                    @foreach($arr_category as $row)
                                        <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                                    @endforeach
                                </select>

                                <select class="form-control" id="search_md_cate_code" name="search_md_cate_code">
                                    <option value="">중분류</option>
                                    @foreach($arr_m_category as $row)
                                        <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                                    @endforeach
                                </select>

                                <select class="form-control" id="search_is_use" name="search_is_use">
                                    <option value="">사용여부</option>
                                    <option value="Y">사용</option>
                                    <option value="N">미사용</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_value">설문제목</label>
                            <div class="col-md-3">
                                <input type="text" id="search_value" name="search_value" class="form-control">
                            </div>
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

            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_category"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_category");

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
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var SpUseYn = (row.IsUse === 'Y') ? '<span>사용</span>' : '<span class="red">미사용</span>';
                            return SpUseYn;
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
