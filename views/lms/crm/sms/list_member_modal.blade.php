@extends('lcms.layouts.master_modal')

@section('layer_title')
    회원 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="form-group form-group-bordered pt-10 pb-10">
                <div class="row">
                    <label class="control-label col-md-2" for="site_code">운영 사이트</label>
                    <div class="col-md-2">
                        <select class="form-control input-sm" id="site_code" name="site_code" title="운영 사이트">
                            <option value="">사이트선택</option>
                            @foreach($get_site_array as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-5">
                    <label class="control-label col-md-2 pt-5" for="search_sms_is_agree">조건</label>
                    <div class="col-md-2">
                        <select class="form-control input-sm" id="search_sms_is_agree" name="search_sms_is_agree">
                            <option value="">SMS수신동의</option>
                            <option value="Y">동의</option>
                            <option value="N">미동의</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control input-sm" id="search_email_is_agree" name="search_email_is_agree">
                            <option value="">메일수신동의</option>
                            <option value="Y">동의</option>
                            <option value="N">미동의</option>
                        </select>
                    </div>
                    <label class="control-label col-md-1 input-sm" for="search_member_start_regdate">가입일</label>
                    <div class="col-md-4 form-inline">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker input-sm" id="search_member_start_regdate" name="search_member_start_regdate" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker input-sm" id="search_member_end_regdate" name="search_member_end_regdate" value="">
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <label class="control-label col-md-2 pt-5" for="search_value">통합검색
                    </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">아이디, 이름, 휴대폰번호 검색 가능</p>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm btn-search" id="btn_search_modal">검 색</button>
            </div>
            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_modal_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>사이트</th>
                            <th>ID</th>
                            <th>이름</th>
                            <th>휴대폰번호</th>
                            <th>SMS 수신동의</th>
                            <th>가입일</th>
                            <th>상태</th>
                            <th>선택</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-info" type="button" id="btn_setting">등록</button>
                </div>
            </div>
            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#search_form_modal');
                var $list_modal_table = $('#_list_modal_ajax_table');
                var send_type_modal = '{{$send_type}}';

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable_modal = $list_modal_table.DataTable({
                        serverSide: true,
                        ajax: {
                            "url" : "{{ site_url('crm/sms/listMemberModalAjax') }}",
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
                            {'data' : 'SiteName'},
                            {'data' : 'MemId'},
                            {'data' : 'MemName'},
                            {'data' : 'Phone'},
                            {'data' : 'SmsRcvStatus', 'render' : function(data, type, row, meta) {
                                    if (data == 'Y') {return '동의'} else { return '미동의' }
                                }},

                            {'data' : 'JoinDate'},
                            {'data' : 'IsStatus'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    var val = '0';
                                    switch (send_type_modal) {
                                        case 'sms' :
                                            val = row.Phone;
                                            break;
                                    }
                                    return '<input type="checkbox" name="is_checked" value='+ val +' class="flat" data-is-checked-idx="' + row.MemIdx + '" data-is-checked-id="' + row.MemId + '">';
                                }}
                        ]
                    });

                    $('#btn_setting').on('click', function() {
                        var j=1;
                        var $params = {};
                        $('input[name="is_checked"]:checked').each(function() {
                            $params[$(this).data('is-checked-idx')] = [$(this).data('is-checked-id'), $(this).val()];
                        });

                        var $params_length = Object.keys($params).length;

                        if ($params_length <= '0') {
                            alert('수신인 명단을 선택해주세요.');
                            return false;
                        }

                        if ($params_length > '12') {
                            alert('수신인 명단은 12개까지 선택 가능합니다.');
                            return false;
                        }

                        if (!confirm('수신인 명단에 등록하시겠습니까?')) {
                            return;
                        }

                        switch (send_type_modal) {
                            case 'sms' :
                                $('input[name="mem_idx[]"]').val('');
                                $('input[name="mem_id[]"]').val('');
                                $('input[name="mem_phone[]"]').val('');

                                var i=1;
                                $.each($params, function(key, value) {
                                    $('#mem_idx_'+i).val(key);
                                    $('#mem_id_'+i).val(value[0]);
                                    $('#mem_phone_'+i).val(value[1]);
                                    i++;
                                });
                                break;
                            default :
                                alert('발송 타입이 없습니다. 관리자에게 문의해 주세요.');
                                break;
                        }

                        $("#modal_html2").modal('toggle');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection