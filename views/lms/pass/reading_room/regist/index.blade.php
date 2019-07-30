@extends('lcms.layouts.master')

@section('content')
    <h5>- {{$mang_title}} 상품을 등록하고 현황을 확인하여 좌석을 배정하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($offLineSite_def_code, 'tabs_site_code', 'tab', false, [], false, $offLineSite_list) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">조건</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select($offLineSite_def_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false) !!}
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
                    <label class="control-label col-md-1">기간검색</label>
                    <div class="col-md-6 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드, 강의실 검색 가능</p>
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
                    <th>No</th>
                    <th>운영사이트</th>
                    <th>캠퍼스</th>
                    <th>{{$mang_title}}코드</th>
                    <th>{{$mang_title}}명</th>
                    <th>강의실</th>
                    <th>예치금</th>
                    <th>판매가</th>
                    <th>좌석현황</th>
                    <th>잔여석</th>
                    <th>자동문자</th>
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
            // 날짜검색 디폴트 셋팅
            /*setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');*/

            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> {{$mang_title}}등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/pass/readingRoom/regist/create') }}' + dtParamsToQueryString($datatable) + '{!! $default_query_string !!}';
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/pass/readingRoom/regist/listAjax') }}' + '?' + '{!! $default_query_string !!}',
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
                    {'data' : 'ProdCode'},
                    {'data' : 'ReadingRoomName', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.LrIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'LakeLayer'},
                    {'data' : 'sub_RealSalePrice'},
                    {'data' : 'main_RealSalePrice'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify-seat-modal" data-idx="'+row.LrIdx+'" data-prod-code="'+row.ProdCode+'"><u>'+row.countY+'/'+row.UseQty+'</u></a>';
                        }},
                    {'data' : 'countN'},
                    {'data' : 'IsSmsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
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
                location.href='{{ site_url('/pass/readingRoom/regist/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $default_query_string !!}';
            });

            // 좌석현황/상태수정
            $list_table.on('click', '.btn-modify-seat-modal', function() {
                var param = '&lr_idx='+$(this).data('idx');
                $('.btn-modify-seat-modal').setLayer({
                    "url" : "{{ site_url('/pass/readingRoom/regist/modifySeatModal/') }}"+ $(this).data('prod-code') + '?' + '{!! $default_query_string !!}' + param,
                    "width" : "1200"
                });
            });
        });
    </script>
@stop
