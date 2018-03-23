@extends('lcms.layouts.master')

@section('content')
    <h5>- WBS 내부 운영 보안을 위하여 운영자 접속 히스토리를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">이름, 아이디, 아이피 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_start_date">날짜</label>
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
                    <th>No</th>
                    <th>이름 (아이디)</th>
                    <th>소속</th>
                    <th>직급</th>
                    <th>권한유형</th>
                    <th>활동여부</th>
                    <th>로그유형</th>
                    <th>접속IP</th>
                    <th>접속일</th>
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
                    'url' : '{{ site_url('/sys/loginLog/listAjax') }}',
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
                    {'data' : 'wAdminName', 'render' : function(data, type, row, meta) {
                        return data + '</u> (' + row.wAdminId.substr(0, row.wAdminId.length - 3) + '***)';
                    }},
                    {'data' : 'wAdminDeptCcdName'},
                    {'data' : 'wAdminPositionCcdName'},
                    {'data' : 'wRoleName'},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        var is_use_text = '-'
                        if (data == 'Y') {
                            is_use_text = '활동';
                        } else if (data == 'N') {
                            is_use_text = '<span class="red">비활동</span>'
                        }
                        return is_use_text;
                    }},
                    {'data' : 'wLoginLogCcdName'},
                    {'data' : 'wLoginIp'},
                    {'data' : 'wLoginDatm'}
                ]
            });
        });
    </script>
@stop
