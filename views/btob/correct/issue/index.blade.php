@extends('btob.layouts.master')
@section('content')
    <h5>- 전체 첨삭 현황을 확인하고 채점자들을 관리할 수 있는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="AssignCcd">조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_prod_code" name="search_prod_code" title="강좌명">
                            <option value="">-강좌명-</option>
                            @foreach($lecture_data as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_correct_idx" name="search_correct_idx" title="회차명">
                            <option value="">-회차명-</option>
                        </select>
                        <select class="form-control" id="search_admin_idx" name="search_admin_idx" title="담당자">
                            <option value="">-담당자-</option>
                            @foreach($assign_admin as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_reply" name="search_is_reply" title="채점여부">
                            <option value="">채점여부</option>
                            <option value="Y">채점완료</option>
                            <option value="N">미채점</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">회원검색</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">아이디, 이름 검색가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_start_date">기간검색</label>
                    <div class="col-md-6 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="ca.RegDatm">배정일</option>
                            <option value="cua.ReplyRegDatm">채점일</option>
                            <option value="cua.RegDatm">제출일</option>
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
                    <th>NO</th>
                    <th>강좌명</th>
                    <th>회차명</th>
                    <th>첨부</th>
                    <th>등록자</th>
                    <th>제출기간</th>
                    <th>제출일</th>
                    <th>배정일</th>
                    <th>담당자</th>
                    <th>채점여부</th>
                    <th>채점일</th>
                    <th>점수</th>
                    <th>채점료</th>
                    <th>삭제</th>
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
            $datatable = $list_table.DataTable({
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' }

                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/correct/issue/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                "createdRow" : function( row, data, index ) {
                    if (data['IsStatus'] == 'N') {
                        $(row).addClass('bg-gray-custom');
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'ProdName'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-manager-assignment" data-idx="' + row.CuaIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'AttachAssignmentData_User', 'render' : function(data, type, row, meta) {
                            var tmp_return;
                            (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                            return tmp_return;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var str = row.MemId;
                            return row.MemName + ' ('+str.replace(str.slice(-3),'***')+')';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.StartDate + ' - ' + row.EndDate;
                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'AssignRegDate'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var str = row.AssignAdminName;
                            if (row.IsReply == 'Y' && row.SuperAdminName != null) {
                                str += '<p><b>관리자채점 : '+row.SuperAdminName+'</b></p>';
                            }
                            return str;
                        }},
                    {'data' : 'IsReply', 'render' : function(data, type, row, meta) {
                            var str = '<p class="red">미채점</p>';
                            if (data == 'Y') {
                                var str = '채점완료';
                            }
                            return str;
                        }},
                    {'data' : 'IsReply', 'render' : function(data, type, row, meta) {
                            var str = '<p class="red">미채점</p>';
                            if (data == 'Y') {
                                var str = row.ReplyRegDatm;
                            }
                            return str;
                        }},
                    {'data' : 'ReplyScore'},
                    {'data' : 'Price', 'render' : function(data, type, row, meta) {
                            return comma(data);
                        }},
                    {'data' : 'BaIdx', 'render' : function(data, type, row, meta) {
                            if (row.IsStatus == 'Y') {
                                if (row.AssignmentStatusCcd == '698002') {
                                    return '<a href="javascript:void(0);" class="btn-delete" data-idx="' + row.CuaIdx + '"><u><p class="red">삭제</p></u></a>';
                                } else {
                                    return '삭제불가';
                                }
                            } else {
                                return '삭제처리완료';
                            }
                        }},
                ]
            });

            $search_form.on('change', 'select[name="search_prod_code"]', function() {
                $('#search_correct_idx').children('option:not(:first)').remove();
                if ($(this).val() != '') {
                    var add_options = '';
                    var data = {
                        '{{ csrf_token_name() }}': $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        'prod_code': $(this).val()
                    };
                    var url = '/common/search/correctUnitAjax/';
                    sendAjax(url, data, function (ret) {
                        if (ret !== null && Object.keys(ret).length > 0) {
                            $.each(ret, function (k, row) {
                                add_options += '<option value="' + row['CorrectIdx'] + '">' + row['Title'] + '</option>';
                            });
                            $('#search_correct_idx').append(add_options);
                        }
                    }, showValidateError, false, 'POST');
                }
            });

            $list_table.on('click', '.btn-manager-assignment', function() {
                var idx = $(this).data('idx');
                $('.btn-manager-assignment').setLayer({
                    "url" : "{{ site_url("/grade/issue/managerAssignmentModal") }}",
                    "width" : "1200",
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'cua_idx', 'name' : '첨삭식별자', 'value' : idx, 'required' : true }
                    ]
                });
            });

            $list_table.on('click', '.btn-delete', function() {
                var _url = '{{ site_url("/correct/regist/deleteAssignment") }}/' + $(this).data('idx') + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };

                if (!confirm('해당 과제를 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/correct/issue/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });

        function comma(str) {
            str = String(str);
            return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
        }
    </script>
@stop