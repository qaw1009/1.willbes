@extends('lcms.layouts.master')

@section('content')
    <h5>- 운영자 정보를 관리하는 메뉴입니다. (권한유형 설정만 가능하며, 운영자 정보 변경은 WBS에서만 가능합니다.)</h5>
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
                        <div class="checkbox mt-10">
                            <input type="checkbox" id="search_chk_no_site_campus" name="search_chk_no_site_campus" class="flat" value="N"/> <label for="search_chk_no_site_campus" class="input-label">사이트/캠퍼스 권한 미부여</label>
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
                    <th>메뉴권한유형</th>
                    <th>사이트/캠퍼스권한</th>
                    <th>소속/직급</th>
                    <th>휴대폰번호</th>
                    <th>E-mail</th>
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
                        return '<a href="#" class="btn-modify" data-idx="' + row.wAdminIdx + '"><u class="blue">' + data + ' (' + row.wAdminId.substr(0, row.wAdminId.length - 3) + '***)' + '</u></a>';
                    }},
                    {'data' : 'RoleIdx', 'render' : function(data, type, row, meta) {
                        var html = '';

                        html += '<select class="form-control input-sm" name="role_idx" data-idx="' + row.wAdminIdx + '">';
                        html += '<option value="">권한미설정</option>';
                        @foreach($roles as $key => $val)
                            html += '<option value="{{ $key }}"' + ((data === '{{ $key }}') ? ' selected="selected"' : '') + '>{{ $val }}</option>';
                        @endforeach
                        html += '</select>';

                        return html;
                    }},
                    {'data' : 'IsSiteCampus', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '부여완료' : '<span class="red">미부여</span>';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.wAdminDeptCcdName + '/' + row.wAdminPositionCcdName;
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.wAdminPhone1 + '-' + row.wAdminPhone2 + '-' + row.wAdminPhone3;
                    }},
                    {'data' : 'wAdminMail'},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'wRegAdminName'},
                    {'data' : 'wRegDatm'}
                ]
            });

            // 권한유형 변경
            $list_table.on('change', 'select[name="role_idx"]', function() {
                if (!confirm('해당 권한유형으로 변경하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'idx' : $(this).data('idx'),
                    'role_idx' : $(this).val()
                };
                sendAjax('{{ site_url('/sys/admin/rerole') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/sys/admin/edit') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop
