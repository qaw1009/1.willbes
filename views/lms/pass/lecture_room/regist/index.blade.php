@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원 강의실 좌석을 관리하는 메뉴입니다. ([학원]상품관리 메뉴에서 상품 등록 시 해당 정보 매핑)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">조건</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false) !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_is_sms_use" name="search_is_sms_use">
                            <option value="">자동문자</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                    <label class="control-label col-md-1">좌석선택기간</label>
                    <div class="col-md-6 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="seat_choice_start_date" name="seat_choice_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="seat_choice_end_date" name="seat_choice_end_date" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">강의실 명칭, 코드 검색 가능</p>
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
            <table id="list_ajax_table" class="table table-bordered table-striped">
                <thead class="bg-white-gray">
                <tr>
                    <th rowspan="2" class="text-center valign-middle">No</th>
                    <th rowspan="2" class="text-center valign-middle">운영사이트</th>
                    <th rowspan="2" class="text-center valign-middle">캠퍼스</th>
                    <th rowspan="2" class="text-center valign-middle">강의실코드</th>
                    <th rowspan="2" class="text-center valign-middle">강의실명</th>
                    <th colspan="6" class="text-center valign-middle">강의실정보</th>
                    <th rowspan="2" class="text-center valign-middle">사용여부</th>
                    <th rowspan="2" class="text-center valign-middle">등록자</th>
                    <th rowspan="2" class="text-center valign-middle">등록일</th>
                </tr>
                <tr>
                    <th class="valign-middle">좌석정보명</th>
                    <th class="valign-middle">좌석선택기간</th>
                    <th class="valign-middle">사용중/총좌석</th>
                    <th class="valign-middle">잔여석</th>
                    <th class="valign-middle">자동문자 사용여부</th>
                    <th class="valign-middle">회차별 사용여부</th>
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
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 마스터강의실등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/pass/lectureRoom/regist/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/pass/lectureRoom/regist/listAjax') }}',
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
                    {'data' : 'CampusName'},
                    {'data' : 'LrCode'},
                    {'data' : 'LectureRoomName', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.LrCode + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var arr_unit_data = jQuery.parseJSON(row.UnitData);
                            var str = '';
                            $.each(arr_unit_data, function(i, key) {
                                if (key.LrUnitCode != null) {
                                    str += '<div class="mb-5 btn-unit-modify bg-danger" style="border-bottom: 1px solid #ff9797; cursor:pointer;" data-lr-code="'+row.LrCode+'" data-lr-unit-code="'+key.LrUnitCode+'">' + key.UnitName + '[' + key.LrUnitCode + ']' + '</div>';
                                }
                            });
                            return str;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var arr_unit_data = jQuery.parseJSON(row.UnitData);
                            var str = '';
                            $.each(arr_unit_data, function(i, key) {
                                if (key.LrUnitCode != null) {
                                    str += '<div class="mb-5" style="border-bottom: 1px solid #ff9797;">' + key.SeatChoiceStartDate + ' ~ ' + key.SeatChoiceEndDate + '</div>';
                                }
                            });
                            return str;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var arr_unit_data = jQuery.parseJSON(row.UnitData);
                            var str = '';
                            $.each(arr_unit_data, function(i, key) {
                                if (key.LrUnitCode != null) {
                                    str += '<div class="mb-5 btn-unit-seat-view bg-danger" style="border-bottom: 1px solid #ff9797; cursor:pointer;" data-lr-code="'+row.LrCode+'" data-lr-unit-code="'+key.LrUnitCode+'">' + key.UseSeatCnt + '/' + key.TotalSeat + '</div>';
                                }
                            });
                            return str;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var arr_unit_data = jQuery.parseJSON(row.UnitData);
                            var str = '';
                            $.each(arr_unit_data, function(i, key) {
                                if (key.LrUnitCode != null) {
                                    str += '<div class="mb-5" style="border-bottom: 1px solid #ff9797;">' + key.RemainSeatCnt + '</div>';
                                }
                            });
                            return str;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var arr_unit_data = jQuery.parseJSON(row.UnitData);
                            var str = '';
                            $.each(arr_unit_data, function(i, key) {
                                if (key.LrUnitCode != null) {
                                    str += '<div class="mb-5" style="border-bottom: 1px solid #ff9797;">';
                                    str += (key.IsSmsUse == 'Y') ? '사용' : '미사용';
                                    str +=  '</div>';
                                }
                            });
                            return str;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var arr_unit_data = jQuery.parseJSON(row.UnitData);
                            var str = '';
                            $.each(arr_unit_data, function(i, key) {
                                if (key.LrUnitCode != null) {
                                    str += '<div class="mb-5" style="border-bottom: 1px solid #ff9797;">';
                                    str += (key.unitIsUse == 'Y') ? '사용' : '미사용';
                                    str +=  '</div>';
                                }
                            });
                            return str;
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/pass/lectureRoom/regist/create/') }}' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            $list_table.on('click', '.btn-unit-modify', function() {
                $('.btn-unit-modify').setLayer({
                    "url" : "{{ site_url('/pass/lectureRoom/regist/createUnitModal/') }}" + $(this).data('lr-code') + '/' + $(this).data('lr-unit-code'),
                    "width" : "1200",
                });
            });

            $list_table.on('click', '.btn-unit-seat-view', function() {
                $('.btn-unit-seat-view').setLayer({
                    "url" : "{{ site_url('/pass/lectureRoom/regist/infoSeatModal/') }}" + $(this).data('lr-code') + '/' + $(this).data('lr-unit-code'),
                    "width" : "1200",
                });
            });
        });
    </script>
@stop