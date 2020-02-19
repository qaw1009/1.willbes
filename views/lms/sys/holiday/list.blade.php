@extends('lcms.layouts.master')
@section('page_title')
    시스템 공통관리 <i class="fa fa-angle-right"></i> <span class="blue">공통코드관리</span>
@stop

@section('content')
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_start_date">기간 조회</label>
                    <div class="col-md-5">
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
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_keyword">검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="reset" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="">No</th>
                    <th>날짜</th>
                    <th>설명</th>
                    <th>상태</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>수정</th>
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

        $(document).ready(function() {
            // 기간 조회 디폴트 셋팅
            setDefaultDatepicker(-1, 'years', 'search_start_date', 'search_end_date');

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $('#list_ajax_table').DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 신규등록', className: 'btn-sm btn-primary border-radius-reset btn-create-modal', action: function(e, dt, node, config) {
                            createModal();
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/sys/holiday/ajaxList') }}',
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
                    {'data' : 'hDate'},
                    {'data' : 'hDesc'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta){
                            return (data == 'Y' ? '<span class="blue">사용</span>' : '<span class="red">미사용</span>');
                        }},
                    {'data' : 'regAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                           return '<button class="btn btn-sm btn-primary btn-modify mr-10" type="button" data-idx="' + row.hIdx + '">수정</button>';
                        }}
                ]
            });

            // 데이터 수정 폼
            $('#list_table, #list_ajax_table, #list_paging_table').on('click', '.btn-modify', function() {
                $('.btn-modify').setLayer({
                    "url" : "{{ site_url('sys/holiday/create') }}/"+ $(this).data('idx'),
                    "max_height" : '400'
                });
            });

            // 데이터 삭제
            $('#list_table, #list_ajax_table, #list_paging_table').on('click', '.btn-delete', function() {
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'idx' : $(this).data('idx')
                };
                sendAjax('{{ site_url('/sys/holiday/destroy') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 데이터 등록 모달창 오픈
            function createModal() {
                $('.btn-create-modal').setLayer({
                    "url" : "{{ site_url('sys/holiday/create') }}",
                    "add_param" : [],
                    "max_height" : '400'
                });
            }
        });
    </script>
@stop
