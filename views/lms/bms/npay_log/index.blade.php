@extends('lcms.layouts.master')

@section('content')
    <h5>- 네이버페이 연동 로그를 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_start_date">연동일자</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group mb-0">
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
                    <label class="control-label col-md-1" for="search_pay_type">구분</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-10" id="search_api_type" name="search_api_type">
                            <option value="">연동구분</option>
                            @foreach($codes['ApiType'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_api_pattern" name="search_api_pattern">
                            <option value="">상세구분</option>
                            @foreach($codes['ApiPattern'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_app_device" name="search_app_device">
                            <option value="">접근디바이스</option>
                            @foreach($codes['AppDevice'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_is_member" name="search_is_member">
                            <option value="">회원여부</option>
                            <option value="Y">회원</option>
                            <option value="N">비회원</option>
                        </select>
                        <select class="form-control mr-10" id="search_result_code" name="search_result_code">
                            <option value="">연동성공여부</option>
                            <option value="Y">연동성공</option>
                            <option value="N">연동실패</option>
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
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="valign-middle">No</th>
                    <th class="valign-middle">연동구분</th>
                    <th class="valign-middle">연동상세</th>
                    <th class="valign-middle">전달파라미터</th>
                    <th class="valign-middle">접근디바이스</th>
                    <th class="valign-middle">회원식별자</th>
                    <th class="valign-middle">세션아이디</th>
                    <th class="valign-middle">결과코드</th>
                    <th class="valign-middle">결과메시지</th>
                    <th class="valign-middle">등록일시</th>
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
            setDefaultDatepicker(0, 'days', 'search_start_date', 'search_end_date');

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/bms/npayLog/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.ResultCode !== 'Y') {
                        $(row).addClass("danger");
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'ApiType', 'render' : function(data, type, row, meta) {
                        return meta.settings.json.codes.ApiType[data];
                    }},
                    {'data' : 'ApiPattern', 'render' : function(data, type, row, meta) {
                        return meta.settings.json.codes.ApiPattern[data];
                    }},
                    {'data' : 'ApiParams'},
                    {'data' : 'AppDevice', 'render' : function(data, type, row, meta) {
                        return meta.settings.json.codes.AppDevice[data];
                    }},
                    {'data' : 'MemIdx'},
                    {'data' : 'SessId'},
                    {'data' : 'ResultCode'},
                    {'data' : 'ResultMsg'},
                    {'data' : 'RegDatm'}
                ]
            });
        });
    </script>
@stop
