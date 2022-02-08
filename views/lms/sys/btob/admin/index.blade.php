@extends('lcms.layouts.master')

@section('content')
    <h5>- 제휴사 운영자를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_btob_idx">제휴사검색</label>
                    <div class="col-md-2">
                        <select class="form-control" id="search_btob_idx" name="search_btob_idx">
                            <option value="">제휴사선택</option>
                            @foreach($arr_btob_idx as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static"><span class="required">*</span> 제휴사를 선택해 주세요.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">이름, 아이디 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_admin_area_ccd" name="search_admin_area_ccd" title="지역">
                            <option value="">지역</option>
                            @foreach($arr_area_ccd as $key => $val)
                                <option value="{{ $key }}" class="{{ str_first_pos_before($val, '::') }}">{{ str_first_pos_after($val, '::') }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_admin_branch_ccd" name="search_admin_branch_ccd" title="지점">
                            <option value="">지점</option>
                            @foreach($arr_branch_ccd as $row)
                                <option value="{{ $row['BranchCcd'] }}" class="{{ $row['AreaCcd'] }}">{{ $row['BranchCcdName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_role_idx" name="search_role_idx" title="권한유형">
                            <option value="">권한유형</option>
                            @foreach($arr_role as $row)
                                <option value="{{ $row['RoleIdx'] }}" class="{{ $row['BtobIdx'] }}">{{ $row['RoleName'] }}</option>
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
            <table id="list_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>제휴사명</th>
                    <th>이름 (아이디)</th>
                    <th>지역</th>
                    <th>지점</th>
                    <th>권한유형</th>
                    <th>사용여부</th>
                    <th>최종접속일</th>
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
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // 지역, 지점, 권한유형 자동변경
            $search_form.find('select[name="search_admin_area_ccd"]').chained("#search_btob_idx");
            $search_form.find('select[name="search_admin_branch_ccd"]').chained("#search_admin_area_ccd");
            $search_form.find('select[name="search_role_idx"]').chained("#search_btob_idx");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 운영자 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/sys/btob/btobAdmin/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ],
                ajax: {
                    'url' : '{{ site_url('/sys/btob/btobAdmin/listAjax') }}',
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
                    {'data' : 'BtobName', 'render' : function(data, type, row, meta) {
                        return row.BtobId === null ? '<span class="red no-line-height">전체제휴사</span>' : data;
                    }},
                    {'data' : 'AdminName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + row.AdminIdx + '"><u>' + data + '</u></a> (' + row.AdminId + ')';
                    }},
                    {'data' : 'AdminAreaCcdName'},
                    {'data' : 'AdminBranchCcdName'},
                    {'data' : 'RoleName'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red no-line-height">미사용</span>';
                    }},
                    {'data' : 'LastLoginDatm'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/sys/btob/btobAdmin/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
