@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원정보(전화번호, 이메일)가 포함된 엑셀파일 다운로드시 저장되는 로그입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-5 form-inline" >
                        <select class="form-control" id="search_down_type_ccd" name="search_down_type_ccd" style="width:150px">
                            <option value="">다운로드구분</option>
                            @foreach($down_type_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <input type="text" class="form-control" id="search_value" name="search_value">
                        <p class="form-control-static">운영자 이름, 아이디, 식별자</p>
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
                    <th width="50px">No</th>
                    <th width="160px">이름(아이디)</th>
                    <th width="200px">다운로드구분</th>
                    <th>세부구분</th>
                    <th width="300px">파일명</th>
                    <th width="80px">데이터수</th>
                    <th width="100px">접속IP</th>
                    <th width="150px">처리일</th>
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
            setDefaultDatepicker(-5, 'days', 'search_start_date', 'search_end_date');

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/sys/excelDownLog/listAjax') }}',
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
                    {'data' : 'CcdName'},
                    {'data' : 'CcdDesc'},
                    {'data' : 'DownloadFileName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<b>'+addComma(row.DataCount)+'</b> 건';
                        }},

                    {'data' : 'RegIp'},
                    {'data' : 'RegDatm'}
                ]
            });
        });
    </script>
@stop
