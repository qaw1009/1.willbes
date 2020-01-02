@extends('lcms.layouts.master_modal')

@section('layer_title')
    쪽지 발송
    @stop

    @section('layer_header')
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" novalidate action="{{ site_url('/crm/message/storeSend') }}">--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="send_type" value="1" title="발송타입">
        <input type="hidden" name="choice_mem_idx">
        <input type="hidden" name="choice_mem_id">
        <input type="hidden" name="del_datas">
        <input type="hidden" name="temp_mem_idx" value="{{$temp_mem_idx}}">
        <input type="hidden" name="temp_mem_id" value="{{$temp_mem_id}}">
    @endsection

    @section('layer_content')
        <div class="form-group form-group-sm">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#content_1" class="send_type" data-content-type="1">개별 발송</a></li>
                <li><a data-toggle="tab" href="#content_2" class="send_type" data-content-type="2">일괄 발송</a></li>
            </ul>
        </div>

        <div class="form-group form-group-sm">
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4" for="site_code">운영 사이트 <span class="required">*</span></label>
                        <div class="col-md-8 item">
                            {!! html_site_select('', 'site_code', 'site_code', '', '운영 사이트', 'required') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4" for="content">내용 <span class="required">*</span></label>
                        <div class="col-md-8 item">
                            <textarea id="send_content" name="send_content" class="form-control" rows="15" title="내용" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-4" for=""></label>
                        <div class="col-md-8 text-right form-inline">
                            <input type="text" readonly="readonly" class="form-control border-red red" id="content_byte" value="0" style="width: 50px;"> <span class="red">byte</span>
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-4" for="content">첨부파일</label>
                        <div class="col-md-8">
                            <input type="file" id="send_attach_file" name="send_attach_file" class="form-control" title="첨부파일"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="tab-content">
                        <div id="content_1" class="form-group tab-pane fade in active">
                            <div class="form-group">
                                <label class="control-label col-md-8" for="content" style="text-align: left !important;">수신번호 입력</label>
                                <div class="col-md-3 col-lg-offset-1">
                                    <button type="button" class="btn btn-default btn-sm btn-primary" id="btn_member_searching">회원검색</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <table id="mem_id_table_1" class="table" style="font-size: 12px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = 1; $i <= ceil($set_row_count/2); $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td class="col-md-12 form-inline">
                                                    <input type="text" id="mem_id_{{$i}}" name="mem_id[]" class="form-control mb-5" title="수신아이디" value="{{(empty($list_send_member[$i-1]['MemId']) === false  ) ? $list_send_member[$i-1]['MemId'] : ''}}" maxlength="11" readonly="readonly" style="width: 100px;">
                                                    <a href="#none" data-del-number="{{$i-1}}" class="btn-member-del" data-><i class="fa fa-times red ml-10"></i></a>
                                                </td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table id="mem_id_table_2" class="table" style="font-size: 12px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = ceil($set_row_count/2) + 1; $i <= $set_row_count; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td class="col-md-12 form-inline">
                                                    <input type="text" id="mem_id_{{$i}}" name="mem_id[]" class="form-control mb-5" title="수신아이디" value="{{(empty($list_send_member[$i-1]['MemId']) === false  ) ? $list_send_member[$i-1]['MemId'] : ''}}" maxlength="11" readonly="readonly" style="width: 100px;">
                                                    <a href="#none" data-del-number="{{$i-1}}" class="btn-member-del" data-><i class="fa fa-times red ml-10"></i></a>
                                                </td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="content_2" class="form-group tab-pane fade">
                            <div class="form-group">
                                <label class="control-label col-md-8" for="content" style="text-align: left !important;">수신번호 등록</label>
                                <div class="col-md-4">
                                    <a href="{{site_url('/crm/message/sampleDownload/')}}" class="btn btn-default btn-sm btn-primary" target="_blank">양식다운로드</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input type="file" id="attach_file" name="attach_file" class="form-control" title="첨부파일"/>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-default btn-sm btn-primary" id="btn_file_upload">List Up</button>
                                </div>
                            </div>
                            <div style="border-bottom: 1px solid #2A3F54; margin-bottom: 5px;"></div>
                            <div class="form-group">
                                <div class="col-md-12 form-group-sm" style="height: 290px; max-height: 290px; overflow-y: auto;">
                                    <table id="mem_id_list" class="table" style="font-size: 12px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12" for="content" style="text-align: left !important;">발송옵션</label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 item form-inline">
                                <div class="radio">
                                    @foreach($arr_send_option_ccd as $key => $val)
                                        <input type="radio" id="send_option_ccd_{{$key}}" name="send_option_ccd" class="flat send_option_ccd" title="{{$val}}" @if($loop->first)checked="checked"@endif data-option-type="{!! $loop->first ? 'Y' : 'N' !!}" value="{{$key}}"/> <label for="send_option_ccd_{{$key}}" class="input-label">{{$val}}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5 form-inline">
                                <div class="input-group item">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker" id="send_datm_day" name="send_datm_day" value="" required="required_if:send_option_ccd,N">
                                    {{--<input type="text" class="form-control" id="send_datm_day" name="send_datm_day" value="">--}}
                                </div>
                            </div>
                            <div class="col-md-7 form-inline">
                                <select class="form-control" id="send_datm_h" name="send_datm_h">
                                    @for($i = 0; $i < 24; $i++)
                                        @php
                                            $_temp = '';
                                            if(strlen($i) == '1') {
                                                $_temp = '0';
                                            }
                                        @endphp
                                        <option value="{{$_temp.$i}}">{{$_temp.$i}}</option>
                                    @endfor
                                </select> 시
                                <select class="form-control" id="send_datm_m" name="send_datm_m">
                                    @for($i = 0; $i <= 59; $i++)
                                        @php
                                            $_temp = '';
                                            if(strlen($i) == '1') {
                                                $_temp = '0';
                                            }
                                        @endphp
                                        <option value="{{$_temp.$i}}">{{$_temp.$i}}</option>
                                    @endfor
                                </select> 분
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var $modal_regi_form = $('#modal_regi_form');
            $(document).ready(function() {
                var $parent_js_action = '';
                //js 파라미터 검사 [undefined, function]
                if (typeof {{$js_action}} != 'undefined' && typeof {{$js_action}} == 'function') {
                    $parent_js_action = {{$js_action}};
                }

                // 발송 타입 설정
                $('.send_type').click(function (){
                    $modal_regi_form.find('input[name="send_type"]').val($(this).data('content-type'));
                });

                //발송데이터 삭제
                $modal_regi_form.on('click', '.btn-member-del', function() {
                    var temp_mem_idx;
                    var temp_mem_id;

                    if ($modal_regi_form.find('input[name="temp_mem_idx"]').val() == '') {
                        temp_mem_idx = $modal_regi_form.find('input[name="choice_mem_idx"]').val();
                        temp_mem_id = $modal_regi_form.find('input[name="choice_mem_id"]').val();
                    } else {
                        temp_mem_idx = $modal_regi_form.find('input[name="temp_mem_idx"]').val();
                        temp_mem_id = $modal_regi_form.find('input[name="temp_mem_id"]').val();
                    }

                    var arr_temp_mem_idx = temp_mem_idx.split(',');
                    var arr_temp_mem_id = temp_mem_id.split(',');
                    arr_temp_mem_idx.splice($(this).data('del-number'), 1);
                    arr_temp_mem_id.splice($(this).data('del-number'), 1);

                    $('input[name="mem_id[]"]').val('');
                    var i=1;
                    $.each(arr_temp_mem_idx, function(key, value) {
                        $('#mem_id_'+i).val(arr_temp_mem_id[key]);
                        i++;
                    });

                    $('input[name="choice_mem_idx"]').val(arr_temp_mem_idx);
                    $('input[name="choice_mem_id"]').val(arr_temp_mem_id);
                    $('input[name="temp_mem_idx"]').val('');
                    $('input[name="temp_mem_id"]').val('');
                });

                // 일괄발송 -> 파일 등록 및 Excel Data 셋팅
                $('#btn_file_upload').click(function (){
                    var data;
                    var _url = '{{ site_url("/crm/message/fileUploadAjax/") }}';
                    var fd = new FormData();
                    var files = $('#attach_file')[0].files[0];

                    if (files === undefined) {
                        alert('파일을 선택해 주세요.');
                        return false;
                    }

                    // TR 초기화
                    $('#mem_id_list > tbody > tr').remove();

                    // Ajax 데이터 셋팅
                    fd.append('{{ csrf_token_name() }}',$modal_regi_form.find('input[name="{{ csrf_token_name() }}"]').val());
                    fd.append('_method','PUT');
                    fd.append('attach_file',files);
                    data = fd;

                    var send_list = '';
                    sendLoadingAjax(_url, data, function(ret) {
                        if (ret.ret_cd) {
                            $.each(ret.ret_data.excel_data, function(i, item) {
                                send_list = '<tr>';
                                send_list += '<td>'+i+'</td>';
                                send_list += '<td>'+item.A+'</td>';
                                send_list += '</tr>';
                                $('#mem_id_list > tbody').append(send_list);
                            });

                        }
                    }, showError, 'POST', $modal_regi_form, 'json', true);
                });

                // 바이트 수
                $('#send_content').on('change keyup input', function() {
                    var content_byte = fn_chk_byte($(this).val());
                    $('#content_byte').val(content_byte);
                });

                // 회원검색
                $('#btn_member_searching').click(function() {
                    var param = '?temp_mem_idx=' + $('input[name="temp_mem_idx"]').val();
                    param += '&temp_mem_id=' + $('input[name="temp_mem_id"]').val();
                    param += '&choice_mem_idx=' + $('input[name="choice_mem_idx"]').val();
                    param += '&choice_mem_id=' + $('input[name="choice_mem_id"]').val();

                    $('#btn_member_searching').setLayer({
                        "url" : "{{ site_url('crm/sms/listMemberModal/message') }}" + param,
                        "width" : "1200",
                        "modal_id" : "modal_html2"
                    });
                });

                // 발송옵션에 따른 설정 변경
                $modal_regi_form.on('ifChanged ifCreated', 'input[name="send_option_ccd"]:checked', function() {
                    var $send_datm_day = $modal_regi_form.find('input[name="send_datm_day"]');
                    var $send_datm_h = $modal_regi_form.find('select[name="send_datm_h"]');
                    var $send_datm_m = $modal_regi_form.find('select[name="send_datm_m"]');

                    if ($(this).data('option-type') === 'N') {
                        $send_datm_day.prop('disabled', false);
                        $send_datm_h.prop('disabled', false);
                        $send_datm_m.prop('disabled', false);
                    } else {
                        $send_datm_day.prop('disabled', true);
                        $send_datm_h.prop('disabled', true);
                        $send_datm_m.prop('disabled', true);
                    }
                });

                // 등록
                $modal_regi_form.submit(function() {
                    var _url = '{{ site_url('/crm/message/storeSend') }}';
                    ajaxLoadingSubmit($modal_regi_form, _url, function(ret) {
                        if(ret.ret_cd) {
                            var msg_cnt = ret.ret_data.upload_cnt;
                            var msg = '총 '+msg_cnt+'건의 메시지가 처리되었습니다.';

                            notifyAlert('success', '알림', msg);
                            $("#pop_modal").modal('toggle');
                            if ($parent_js_action != '') {
                                $parent_js_action();
                            }
                        }
                    }, showValidateError, addValidate, 'alert', $modal_regi_form);
                });
            });

            function addValidate() {
                var flag = false;
                var send_type = $("input[name='send_type']").val();
                var mem_id_length = $("input[name='mem_id[]']").length;

                for(var i=0; i<mem_id_length; i++) {
                    if ($("input[name='mem_id[]']")[i].value) {flag = true;}
                }

                if (send_type == 1 && flag === false) {
                    alert('수신번호는 필수입니다.');
                    return false;
                }
                return true;
            }
        </script>
    @stop

    @section('add_buttons')
        <button type="submit" class="btn btn-success">발송</button>
    @endsection

    @section('layer_footer')
    </form>
@endsection