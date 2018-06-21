@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원방문상담 예약일정을 등록하고 관리하는 페이지입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs('', 'tabs_site_code', 'tab', true, [], false, $offLineSite_list) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false, $offLineSite_list) !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">구분</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
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
                    <label class="control-label col-md-1" for="search_value">제목/내용</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <label class="control-label col-md-1" for="search_start_date">등록일</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default mr-20" id="_btn_reset">검색초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>캠퍼스</th>
                    <th>카테고리</th>
                    <th>일자(요일)</th>
                    <th>신청현황</th>
                    <th>마감여부</th>
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
            // 기간 조회 디폴트 셋팅
            //setDefaultDatepicker(0, 'days', 'search_start_date', 'search_end_date');

            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_category"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> 삭제', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-del' },
                    { text: '<i class="fa fa-pencil mr-10"></i> 일정등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url("/pass/consult/schedule/create") }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url("/pass/consult/schedule/listAjax?") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat" name="copy" value="' +row.BoardIdx+ '">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            if (row.IsBest == 'Y') {
                                return 'BEST';
                            } else {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CampusName'},
                    {'data' : 'CateCode', 'render' : function(data, type, row, meta){
                            var obj = data.split(',');
                            var str = '';
                            for (key in obj) {
                                str += obj[key]+"<br>";
                            }
                            return str;
                        }},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'AttachFileName', 'render' : function(data, type, row, meta) {
                            var tmp_return;
                            (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                            return tmp_return;
                        }},

                    {'data' : 'wAdminName'},
                    {'data' : 'RegDatm'},

                    {'data' : 'IsBest', 'render' : function(data, type, row, meta) {
                            //return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                            var chk = '';
                            if (data == 'Y') { chk = 'checked=checked'; } else { chk = ''; }
                            return '<input type="checkbox" name="is_best" value="Y" class="flat is-best" data-is-best-idx="' + row.BoardIdx + '" '+chk+'/>';
                        }},

                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : 'ReadCnt'},
                    {'data' : 'BoardIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                        }},
                ],
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url("/pass/consult/schedule/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });

            // 데이터 Read 페이지
            $list_table.on('click', '.btn-read', function() {
                location.replace('{{ site_url("/pass/consult/schedule/read") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });

        });
    </script>
@stop
