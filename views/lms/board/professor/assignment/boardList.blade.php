@extends('lcms.layouts.master')

@section('content')
    <h5>- {{$arr_prof_info['ProfNickName']}} 교수 건별 통합 현황 게시판</h5>
    @include('lms.board.professor.assignment.common_partial')

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($arr_prof_info['SiteCode'], 'tabs_site_code', 'tab', false, [], false, array($arr_prof_info['SiteCode'] => $arr_prof_info['SiteName'])) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호(끝4자리) 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_is_reply">조건검색</label>
                    <div class="col-md-2 form-inline">
                        <select class="form-control" id="search_is_reply" name="search_is_reply">
                            <option value="">채점여부</option>
                            <option value="Y">채점</option>
                            <option value="N">미채점</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_product_name">강좌검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_product_name" name="search_product_name">
                    </div>
                    <label class="control-label col-md-1 col-md-offset-3" for="search_title">강의검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_title" name="search_title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_start_date">기간검색</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="R">등록일</option>
                            <option value="M">채점일</option>
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
                <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
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
                    <th>강의명</th>
                    <th>첨부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>채점여부</th>
                    <th>채점자</th>
                    <th>채점일</th>
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
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url("/board/professor/{$boardName}/boardListAjax?") }}' + '{!! $boardDefaultQueryString !!}',
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
                    {'data' : 'ProdName'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-manager-assignment" data-idx="' + row.BaIdx + '" data-board-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'AttachFileIdx_User', 'render' : function(data, type, row, meta) {
                            var tmp_return;
                            (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                            return tmp_return;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return data.MemName +'('+data.MemId+')<Br>('+data.MemPhone+')';
                        }},
                    {'data' : 'RegDatm'},

                    {'data' : 'IsReply', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '채점' : '<p class="red">미채점</p>';
                        }},
                    {'data' : 'ReplyAdminName'},
                    {'data' : 'ReplyRegDatm'},

                    {'data' : 'BaIdx', 'render' : function(data, type, row, meta) {
                            if (row.IsStatus == 'Y') {
                                if (row.AssignmentStatusCcd == '698002') {
                                    return '<a href="javascript:void(0);" class="btn-delete" data-idx="' + row.BaIdx + '"><u><p class="red">삭제</p></u></a>';
                                } else {
                                    return '삭제불가';
                                }
                            } else {
                                return '삭제처리완료';
                            }
                        }},
                ]
            });

            //등록
            $list_table.on('click', '.btn-manager-assignment', function() {
                var idx = $(this).data('idx');
                var board_idx = $(this).data('board-idx');
                $('.btn-manager-assignment').setLayer({
                    "url" : "{{ site_url("/board/professor/{$boardName}/managerAssignmentModal?") }}" + '{!! $boardDefaultQueryString !!}',
                    "width" : "1200",
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'ba_idx', 'name' : '첨삭식별자', 'value' : idx, 'required' : true },
                        { 'id' : 'board_idx', 'name' : '첨삭식별자', 'value' : board_idx, 'required' : true }
                    ]
                });
            });

            $list_table.on('click', '.btn-delete', function() {
                var _url = '{{ site_url("/board/professor/{$boardName}/deleteAssignment") }}/' + $(this).data('idx') + getQueryString();
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
        });
    </script>
@stop