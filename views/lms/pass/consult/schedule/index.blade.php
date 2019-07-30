@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원방문상담 예약일정을 등록하고 관리하는 페이지입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($offLineSite_def_code, 'tabs_site_code', 'tab', false, [], false, $offLineSite_list) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select($offLineSite_def_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false, $offLineSite_list) !!}
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

                        <select class="form-control" id="search_consult_type" name="search_consult_type">
                            <option value="">마감여부</option>
                            <option value="I">진행중</option>
                            <option value="E">마감</option>
                        </select>

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>


                    <label class="control-label col-md-1" for="search_start_date">기간검색</label>
                    <div class="col-md-6 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="I">접수일</option>
                            <option value="R">등록일</option>
                        </select>
                        <div class="input-group mb-0">
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
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
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
                "createdRow": function( row, data, dataIndex ) {
                    var reg_date = parseInt(dateFormat(data.RegDatm));
                    var now_date = parseInt(nowDate());
                    if (reg_date == now_date) {
                        $(row).addClass("warning");
                    }
                },
                columns: [
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
                        var str = '';
                        if (data != null) {
                            var obj = data.split(',');
                            for (key in obj) {
                                str += obj[key] + "<br>";
                            }
                        }
                            return str;
                        }},
                    {'data' : 'ConsultDate', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.CsIdx + '"><u>' + data + ' ('+ getInputDayLabel(data) +')' + '</u></a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.CsIdx + '"><u>' + data.memCount +' / '+ data.totalConsult + '</u></a>';
                        }},

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            if (data.memCount == data.totalConsult) { return '마감'; } else { return '진행중'; }
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ],
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url("/pass/consult/schedule/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            // 데이터 Read 페이지
            $list_table.on('click', '.btn-read', function() {
                location.href='{{ site_url("/pass/consult/schedule/read") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

        });

        //날짜 형식 리턴 (yyyymmdd)
        function dateFormat(input) {
            var date = new Date(input);
            return [
                date.getFullYear(),
                ("0" + (date.getMonth()+1)).slice(-2),
                ("0" + date.getDate()).slice(-2)
            ].join('');
        }
        
        function nowDate() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd='0'+dd
            }
            if(mm<10) {
                mm='0'+mm
            }

            today = yyyy+mm+dd;
            return today;
        }

        function getInputDayLabel(val_date) {
            var week = new Array('일', '월', '화', '수', '목', '금', '토');
            var today = new Date(val_date).getDay();
            var todayLabel = week[today];
            return todayLabel;
        }
    </script>
@stop
