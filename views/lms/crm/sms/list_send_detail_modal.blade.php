@extends('lcms.layouts.master_modal')

@section('layer_title')
    발송 상세리스트
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="form-group form-group-bordered pt-10 pb-10">
                <div class="row mt-5">
                    <label class="control-label col-md-2 pt-5" for="search_sms_is_agree">조건</label>
                    <div class="col-md-2">
                        <select class="form-control input-sm" id="search_sms_is_agree" name="search_sms_is_agree">
                            <option value="">수신동의</option>
                            <option value="Y">동의</option>
                            <option value="N">미동의</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-5">
                    <label class="control-label col-md-2 pt-5" for="search_value">발송데이터검색
                    </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">아이디, 이름, 휴대폰번호(끝4자리)</p>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm btn-search" id="btn_search_modal">검 색</button>
            </div>

            <div class="form-group pt-10 pb-10">
                <div class="row mt-5 bdb-line">
                    <label class="control-label col-md-1" for="search_sms_is_agree">발송메시지</label>
                    <div class="form-control-static col-md-8">{!! nl2br($data['Content']) !!}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="form-group">
                        <table id="_list_modal_ajax_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>회원아이디</th>
                                <th>회원명</th>
                                <th>수신휴대폰</th>
                                <th>수신 메세지종류</th>
                                <th>메세지결과</th>
                                <th>수신동의</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#search_form_modal');
                var $list_modal_table = $('#_list_modal_ajax_table');
                var send_type = '{{$send_type}}';
                var send_idx = '{{$send_idx}}';
                var member_idx = '{{$member_idx}}';

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable_modal = $list_modal_table.DataTable({
                        serverSide: true,
                        ajax: {
                            "url" : "{{ site_url('crm/sms/listSendDetailModalAjax/') }}" + send_idx + "/?member_idx=" + member_idx,
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                // 리스트 번호
                                return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }},
                            {'data' : 'MemIdx', 'render' : function(data, type, row, meta) {
                                if (data == 0) {
                                    return '비회원';
                                } else {
                                    return row.MemId;
                                }
                            }},
                            {'data' : 'MemIdx', 'render' : function(data, type, row, meta) {
                                return row.Receive_Name;
                            }},
                            {'data' : 'Receive_PhoneEnc'},
                            {'render' : function(data, type, row, meta) {
                                var rtn_str = '';
                                if(row.log_data != null && row.log_data.RSLT_SEND_NAME != null && typeof row.log_data.RSLT_SEND_NAME != 'undefined'){
                                    rtn_str = row.log_data.RSLT_SEND_NAME;
                                }
                                return rtn_str;
                            }},
                            {'render' : function(data, type, row, meta) {
                                var rtn_str = '';
                                if(row.log_data != null && row.log_data.RSLT_INFO != null && typeof row.log_data.RSLT_INFO != 'undefined'){
                                    rtn_str = row.log_data.RSLT_INFO;
                                }
                                return rtn_str;
                            }},
                            {'data' : 'SmsRcvStatus'}
                        ]
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection