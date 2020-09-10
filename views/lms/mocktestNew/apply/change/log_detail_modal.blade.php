@extends('lcms.layouts.master_modal')

@section('layer_title')
    백업데이터
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="search_log_idx" value="{{$log_idx}}">
@endsection

        @section('layer_content')
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group form-inline">
                        <label class="control-label col-md-1" for="search_value">접수정보</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" id="search_order_no" name="search_order_no" placeholder="주문번호" style="width: 150px;">
                            <input class="form-control" type="text" id="search_takenumber" name="search_takenumber" placeholder="응시번호" style="width: 150px;">
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="submit" class="btn btn-primary btn-sm btn-search" id="_btn_search">검 색</button>
                            <button type="button" class="btn btn-default btn-sm btn-search" id="modal_btn_reset">초기화</button>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label class="control-label col-md-1" for="search_value">회원정보</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" id="search_member_name" name="search_member_name" placeholder="아이디" style="width: 150px;">
                            <input class="form-control" type="text" id="search_member_id" name="search_member_id" placeholder="이름" style="width: 150px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <table id="list_ajax_table_modal" class="table table-bordered table-striped">
                    <thead class="bg-white-gray">
                    <tr>
                        <th>No</th>
                        <th>주문번호</th>
                        <th>응시번호</th>
                        <th>아이디</th>
                        <th>이름</th>
                        <th>응시형태</th>
                        <th>응시지역</th>
                        <th>복구</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                var $search_form_modal = $('#_search_form');
                var $datatable_modal;
                var $list_table_modal = $('#list_ajax_table_modal');
                $(document).ready(function() {
                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: true,
                        buttons: [],
                        ajax: {
                            'url' : '{{ site_url('/mocktestNew/apply/change/listLogDetailAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), {'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},
                            {'data' : 'OrderNo', 'class': 'text-center'},
                            {'data' : 'TakeNumber', 'class': 'text-center'},
                            {'data' : 'MemName', 'class': 'text-center'},
                            {'data' : 'MemId', 'class': 'text-center'},
                            {'data' : 'TakeFormName', 'class': 'text-center'},
                            {'data' : 'TakeAreaName', 'class': 'text-center'},
                            {'data' : null, 'render' : function(data,type,row,meta) {
                                    if (row.IsRestore == 'N') {
                                        return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.LogDetailIdx + '" data-mr-idx="' + row.MrIdx + '"><u>복구</u></a>';
                                    } else {
                                        return '복구완료';
                                    }
                                }},
                        ]
                    });

                    $search_form_modal.on('click', '.btn-modify', function() {
                        if(!confirm('복구하시겠습니까?')) return false;
                        var _url = '{{ site_url("/mocktestNew/apply/change/storeLogDetailData") }}';
                        var data = {
                            '{{ csrf_token_name() }}' : $search_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'log_detail_idx' : $(this).data('idx'),
                            'mr_idx' : $(this).data('mr-idx')
                        };
                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $datatable_modal.draw();
                                $datatable.draw();
                            }
                        }, showError, false, 'POST');
                    });

                    $('#modal_btn_reset').click(function(){
                        $search_form_modal[0].reset();
                        $datatable_modal.draw();
                    });
                });
            </script>
        @stop

@section('add_buttons')
@endsection
@section('layer_footer')
</form>
@endsection