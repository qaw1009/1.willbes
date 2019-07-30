@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원방문상담 신청자들의 접수/취소 내역을 관리하는 메뉴입니다.</h5>
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

                        <select class="form-control" id="search_is_consult" name="search_is_consult">
                            <option value="">상담상태</option>
                            <option value="Y">완료</option>
                            <option value="N">미방문</option>
                        </select>
                    </div>


                    <label class="control-label col-md-1" for="search_start_date">기간검색</label>
                    <div class="col-md-6 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="I">상담일</option>
                            <option value="R">신청일</option>
                            <option value="C">취소일</option>
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
                    <th>선택</th>
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>캠퍼스</th>
                    <th>카테고리</th>
                    <th>일자(요일)</th>
                    <th>이름</th>
                    <th>연락처</th>
                    <th>생년월일</th>
                    <th>신청시간</th>
                    <th>응시정보</th>
                    <th>수험기간</th>
                    <th>수강여부</th>
                    <th>접수상태</th>
                    <th>상담상태</th>
                    <th>신청일<br>(취소일)</th>
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
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' },
                ],
                ajax: {
                    'url' : '{{ site_url("/pass/consult/member/listAjax?") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" name="is_checked" class="flat target-crm-member" data-mem-idx="' + row.MemIdx + '">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CampusName'},
                    {'data' : 'CateName'},
                    {'data' : 'ConsultDate', 'render' : function(data, type, row, meta) {
                            /*return data.ConsultDate + ' ('+data.yoil+')';*/
                            return data + ' ('+ getInputDayLabel(data) +')';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-schedule-member-read" data-csm-idx="'+data.CsmIdx+'"><u>'+data.MemName+'<Br>'+data.MemId+'</u></a>';
                        }},

                    {'data' : 'Phone'},
                    {'data' : 'BirthDay'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return data.StartHour + ':' + data.StartMin + ' ~ ' + data.EndHour + ':' + data.EndMin;
                        }},
                    {'data' : 'SerialName'},
                    {'data' : 'ExamPeriodName'},
                    {'data' : 'StudyName'},
                    {'data' : 'IsReg', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '접수' : '<p class="red">취소</p>';
                        }},
                    {'data' : 'IsConsult', 'render' : function(data, type, row, meta) {
                            return (data == 'N') ? '미방문' : '<p class="blue-sky">완료</p>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return data.RegDatm + '<br>'+data.CancelDatm;
                        }},
                ],
            });

            $list_table.on('click', '.btn-schedule-member-read', function() {
                var uri_param = $(this).data('csm-idx');
                console.log(uri_param);

                $('.btn-schedule-member-read').setLayer({
                    'url' : '{{ site_url('/pass/consult/schedule/detailMemberModal/') }}' + uri_param,
                    'width' : 900
                });
            });
        });

        function getInputDayLabel(val_date) {
            var week = new Array('일', '월', '화', '수', '목', '금', '토');
            var today = new Date(val_date).getDay();
            var todayLabel = week[today];
            return todayLabel;
        }
    </script>
@stop
