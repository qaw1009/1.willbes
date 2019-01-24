@extends('lcms.layouts.master_modal')

@section('layer_title')
    제휴사 IP 정보
@stop

@section('layer_header')
        <form class="form-horizontal form-label-left" id="_regi_form_modal" name="_regi_form_modal" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field($method) !!}

            <input type="hidden" name="btobidx" id="btobidx" value="{{$btobidx}}"/>

        @endsection

        @section('layer_content')
            <div class="x_title text-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            {!! form_errors() !!}
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="BtobName">IP등록
                </label>
                <div class="col-md-4 item">
                    <input type="text" id="ApprovalIp" name="ApprovalIp" required="required" class="form-control" title="ip주소" value="">
                </div>
                <button type="submit" class="btn btn-sm btn-success">저장</button>
            </div>
        </form>

        <form class="form-horizontal" id="_search_modal_form" name="_search_modal_form" method="POST" >
            <input type="hidden" name="btobidx" id="btobidx" value="{{$btobidx}}"/>
        </form>
            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th width="200px">IP정보</th>
                            <th >등록일</th>
                            <th width="120px">등록자</th>
                            <th width="60px">삭제</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        <form class="form-horizontal" id="_delete_form" name="_delete_form" method="POST" >
            {!! csrf_field() !!}
            <input type="hidden" name="btobidx" id="btobidx" value="{{$btobidx}}"/>
            <input type="hidden" name="biIdx" id="biIdx" value=""/>
        </form>

            <script type="text/javascript">
                var $_regi_form_modal = $('#_regi_form_modal');
                var $_datatable;
                var $_search_modal_form = $('#_search_modal_form');
                var $_list_ajax_table = $('#_list_ajax_table');
                var $_delete_form = $('#_delete_form');

                $(document).ready(function() {
                    // 과목 등록
                    $_regi_form_modal.submit(function() {
                        var _url = '{{ site_url('/sys/btob/btobInfo/storeIp') }}';

                        ajaxSubmit($_regi_form_modal, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $_datatable.draw();
                                //$_search_modal_form.submit();
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                    // 페이징 번호에 맞게 일부 데이터 조회
                    $_datatable = $_list_ajax_table.DataTable({
                        serverSide: true,
                        buttons: [
                        ],
                        ajax: {
                            'url' : '{{ site_url('/sys/btob/btobInfo/listIp/') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($_search_modal_form.serializeArray()), { '{{csrf_token_name() }}' : $_regi_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(), 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    // 리스트 번호
                                    return $_datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},
                            {'data' : 'ApprovalIp'},
                            {'data' : 'RegDatm'},
                            {'data' : 'wAdminName'},
                            {'data' : null, 'render' : function(data,type,row,meta) {
                                    return '<a href="#" class="btn_del" data-idx="' + data.BiIdx + '" ><u>삭제</u></a>';
                                }}
                        ]
                    });


                    $_list_ajax_table.on('click', '.btn_del', function() {
                        var _del_url = '{{ site_url('/sys/btob/btobInfo/deleteIp/') }}';

                        $("#biIdx").val($(this).data('idx'));

                        ajaxSubmit($_delete_form, _del_url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $_datatable.draw();
                            }
                        }, showValidateError, null, false, 'alert');

                    });
                });


            </script>
        @stop
        @section('layer_footer')
    </form>
@endsection