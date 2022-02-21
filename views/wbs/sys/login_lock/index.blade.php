@extends('lcms.layouts.master')

@section('content')
    <h5>- 운영자 로그인 계정잠금 이력을 확인하고 잠금해제하는 메뉴입니다. (5회 이상 로그인 실패시 계정잠금 처리)</h5>
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
                    <label class="control-label col-md-1" for="search_role_idx">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_role_idx" name="search_role_idx" title="권한유형">
                            <option value="">권한유형</option>
                            @foreach($roles as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_use" name="search_is_use" title="활동여부">
                            <option value="">활동여부</option>
                            <option value="Y">활동</option>
                            <option value="N">비활동</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_lock_start_date">잠금일자</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_lock_start_date" name="search_lock_start_date" value="" title="잠금시작일자">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_lock_end_date" name="search_lock_end_date" value="" title="잠금종료일자">
                        </div>
                    </div>
                    <label class="control-label col-md-1" for="search_unlock_start_date">해제일자</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_unlock_start_date" name="search_unlock_start_date" value="" title="해제시작일자">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_unlock_end_date" name="search_unlock_end_date" value="" title="해제종료일자">
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
                    <th>권한유형</th>
                    <th>활동여부</th>
                    <th>접근도메인</th>
                    <th>잠금일</th>
                    <th>잠금IP</th>
                    <th>해제일</th>
                    <th>해제자</th>
                    <th>해제처리</th>
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
            setDefaultDatepicker(-1, 'weeks', 'search_lock_start_date', 'search_lock_end_date');

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sys/loginLock/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'wAdminName', 'render' : function(data, type, row, meta) {
                        return data + ' (' + row.wAdminIdMask + ')';
                    }},
                    {'data' : 'wRoleName'},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        if (data === 'Y') {
                            return '활동';
                        } else if (data === 'N') {
                            return '<span class="red">비활동</span>';
                        }
                        return '-';
                    }},
                    {'data' : 'wLockSubDomain'},
                    {'data' : 'wLockDatm'},
                    {'data' : 'wLockIp'},
                    {'data' : 'wUnLockDatm'},
                    {'data' : 'wUnLockAdminName'},
                    {'data' : 'wIsUnLock', 'render' : function(data, type, row, meta) {
                        if (data === 'N') {
                            return '<button name="btn_unlock" class="btn btn-xs btn-success mb-0" data-idx="' + row.wLockIdx + '" data-admin-id="' + row.wAdminId + '">해제처리</button>';
                        } else if (data === 'Y') {
                            return '<span class="blue no-line-height">해제완료</span>';
                        } else {
                            return '<span class="red no-line-height">해제불가</span>';
                        }
                    }}
                ]
            });

            // 잠금해제 버튼 클릭
            $list_table.on('click', 'button[name="btn_unlock"]', function(event) {
                event.preventDefault();
                if (!confirm('해당 계정을 잠금해제 처리하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'idx' : $(this).data('idx'),
                    'admin_id' : $(this).data('admin-id')
                };
                sendAjax('{{ site_url('/sys/loginLock/unlock') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/sys/loginLock/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
