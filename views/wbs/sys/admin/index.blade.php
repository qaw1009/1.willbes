@extends('lcms.layouts.master')

@section('content')
    <h5>- WBS 운영자 정보를 관리하는 메뉴입니다.</h5>
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
                        <p class="form-control-static">이름, 아이디 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_dept_ccd">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_dept_ccd" name="search_dept_ccd">
                            <option value="">소속</option>
                            @foreach($dept_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_position_ccd" name="search_position_ccd">
                            <option value="">직급</option>
                            @foreach($position_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_role_idx" name="search_role_idx">
                            <option value="">권한유형</option>
                            @foreach($roles as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
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
                    <th>No</th>
                    <th>이름 (아이디)</th>
                    <th>CP사</th>
                    <th>소속</th>
                    <th>직급</th>
                    <th>권한유형</th>
                    <th>승인여부</th>
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
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 운영자 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/sys/admin/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ],
                ajax: {
                    'url' : '{{ site_url('/sys/admin/listAjax') }}',
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
                        return '<a href="#" class="btn-modify" data-idx="' + row.wAdminIdx + '"><u>' + data + '</u></a> (' + row.wAdminId.substr(0, row.wAdminId.length - 3) + '***)';
                    }},
                    {'data' : 'wCpNameList'},
                    {'data' : 'wAdminDeptCcdName'},
                    {'data' : 'wAdminPositionCcdName'},
                    {'data' : 'wRoleName'},
                    {'data' : 'wIsApproval', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '승인' : '<span class="red">미승인</span>';
                    }},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'wRegAdminName'},
                    {'data' : 'wRegDatm'}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/sys/admin/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop
