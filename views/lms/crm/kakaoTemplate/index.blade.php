@extends('lcms.layouts.master')
@section('content')
<style>
    .msg-dot { max-width : 450px; overflow : hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; }
</style>
    <h5>- 알림톡 템플릿을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">메세지성격</option>
                            <option value="A">자동</option>
                            <option value="M">일반</option>
                        </select>
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">템플릿명/내용</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <label class="control-label col-md-1 col-md-offset-2" for="search_start_date">등록일</label>
                    <div class="col-md-5 form-inline">
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
            <div class="col-xs-2">
            </div>
            <div class="col-xs-8 text-center">
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
                    <th>메세지성격</th>
                    <th>템플릿코드</th>
                    <th>템플릿명</th>
                    <th>템플릿내용</th>
                    <th>사용여부</th>
                    <th>승인여부</th>
                    <th>등록자</th>
                    <th>승인자</th>
                    <th>등록일</th>
                    <th>승인일</th>
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
                buttons: [
                    @if(empty($is_allow_modify) === false && $is_allow_modify == 'Y')
                        {
                            text: '<i class="fa fa-pencil mr-10"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                                location.href = '{{ site_url("/crm/kakaoTemplate/create") }}' + dtParamsToQueryString($datatable);
                            }
                        }
                    @endif
                ],
                ajax: {
                    'url' : '{{ site_url("/crm/kakaoTemplate/listAjax?") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'SendKind', 'render' : function(data, type, row, meta) {
                        return data == 'A' ? '자동' : '일반';
                    }},
                    {'data' : 'TmplCd'},
                    {'data' : 'TmplName'},
                    {'data' : 'Msg', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-read msg-dot" data-idx="' + row.CktIdx + '"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return data == 'Y' ? '사용' : '<p class="red">미사용</p>';
                    }},
                    {'data' : 'IsApproval', 'render' : function(data, type, row, meta) {
                        return data == 'Y' ? '승인' : '<p class="red">미승인</p>';
                    }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'ApprovalAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'ApprovalDatm'}
                ],
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url("/crm/kakaoTemplate/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            // 데이터 Read 페이지
            $list_table.on('click', '.btn-read', function() {
                location.href='{{ site_url("/crm/kakaoTemplate/read") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

        });
    </script>
@stop
