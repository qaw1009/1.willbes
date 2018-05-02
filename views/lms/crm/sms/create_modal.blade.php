@extends('lcms.layouts.master_modal')

@section('layer_title')
    SMS 발송
    @stop

    @section('layer_header')
    {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" onsubmit="return false;" novalidate>--}}
    <form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" novalidate action="{{ site_url('/crm/sms/storeSend') }}">
        {!! csrf_field() !!}
        {!! method_field($method) !!}
    @endsection

    @section('layer_content')
        <div class="form-group form-group-sm">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#content_1">개별 발송</a></li>
                <li><a data-toggle="tab" href="#content_2">일괄 발송</a></li>
            </ul>
        </div>

        <div class="form-group form-group-sm">
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4" for="site_code">운영 사이트 <span class="required">*</span></label>
                        <div class="col-md-8 item">
                            <select class="form-control" id="site_code" name="site_code" required="required" title="운영 사이트">
                                <option value="">사이트선택</option>
                                @foreach($get_site_array as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="cs_tel">발신번호 <span class="required">*</span></label>
                        <div class="col-md-8 item">
                            <input type="text" id="cs_tel" name="cs_tel" required="required" class="form-control" title="발신번호" value="">
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
                        <label class="control-label col-md-4" for=""></label>
                        <div class="col-md-8">(80byte 초과 시 LMS로 전환됩니다.)</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="tab-content">
                        <div id="content_1" class="form-group tab-pane fade in active">
                            <div class="form-group">
                                <label class="control-label col-md-8" for="content" style="text-align: left !important;">수신번호 ('-' 없이 숫자만 입력)</label>
                                <div class="col-md-3 col-lg-offset-1">
                                    <button type="button" class="btn btn-default btn-sm btn-primary" id="btn_member_searching">회원검색</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <table id="mem_phone_table_1" class="table" style="font-size: 12px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>휴대폰번호</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = 1; $i <= $set_row_count-6; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>
                                                    <input type="text" id="mem_idx_{{$i}}" name="mem_idx[]" value="" hidden>
                                                    <input type="text" id="mem_id_{{$i}}" name="mem_id[]" value="" hidden>
                                                    <input type="text" id="mem_phone_{{$i}}" name="mem_phone[]" class="form-control" title="수신번호" value="">
                                                </td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table id="mem_phone_table_2" class="table" style="font-size: 12px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>휴대폰번호</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = 7; $i <= $set_row_count; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>
                                                    <input type="text" id="mem_idx_{{$i}}" name="mem_idx[]" value="" hidden>
                                                    <input type="text" id="mem_id_{{$i}}" name="mem_id[]" value="" hidden>
                                                    <input type="text" id="mem_phone_{{$i}}" name="mem_phone[]" class="form-control" title="수신번호" value="">
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
                                <label class="control-label col-md-8" for="content" style="text-align: left !important;">수신번호</label>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-default btn-sm btn-primary" id="btn_sample_file_download">양식다운로드</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-lg-offset-8">
                                    <button type="button" class="btn btn-default btn-sm btn-primary" id="btn_sample_file_download">File Upload</button>
                                </div>
                            </div>
                            <div style="border-bottom: 1px solid #2A3F54; margin-bottom: 5px;"></div>
                            <div class="form-group">
                                <div class="col-md-12 form-group-sm" style="max-height: 296px; overflow-y: auto;">
                                    <table id="mem_phone_list" class="table" style="font-size: 12px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>이름</th>
                                            <th>휴대폰번호</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--@for($i = 1; $i <= $set_row_count; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>최{{$i}}</td>
                                                <td>010{{$i}}</td>
                                            </tr>
                                        @endfor--}}
                                        </tbody>
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
                                    <input type="radio" id="send_option_ccd_y" name="send_option_ccd" class="flat" value="N" required="required" title="사용여부" checked="checked"/> <label for="send_option_ccd_y" class="input-label">즉시발송</label>
                                    <input type="radio" id="send_option_ccd_n" name="send_option_ccd" class="flat" value="Y"/> <label for="send_option_ccd_n" class="input-label">예약발송</label>
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


        {{--<div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                 aria-valuemin="0" aria-valuemax="100" style="width:70%">
                <span class="sr-only">70% Complete</span>
            </div>
        </div>--}}


        <script type="text/javascript">
            var $regi_form = $('#modal_regi_form');

            $(document).ready(function() {
                var test = "<tr><td>aaa</td><td>bbb</td><td>ccc</td></tr>";
                $('#mem_phone_list > tbody').append(test);

                // 바이트 수
                $('#send_content').on('change keyup input', function() {
                    var content_byte = fn_chk_byte($(this).val());
                    $('#content_byte').val(content_byte);
                });

                // 회원검색
                $('#btn_member_searching').click(function() {
                    $('#btn_member_searching').setLayer({
                        "url" : "{{ site_url('crm/sms/listMemberModal') }}",
                        "width" : "1200",
                        "modal_id" : "modal_html2"
                    });
                });

                // 발송옵션에 따른 설정 변경
                $regi_form.on('ifChanged ifCreated', 'input[name="send_option_ccd"]:checked', function() {
                    var $send_datm_day = $regi_form.find('input[name="send_datm_day"]');
                    var $send_datm_h = $regi_form.find('select[name="send_datm_h"]');
                    var $send_datm_m = $regi_form.find('select[name="send_datm_m"]');

                    if ($(this).val() === 'Y') {
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
                $regi_form.submit(function() {
                    var _url = '{{ site_url('/crm/sms/storeSend') }}';

                    /*ajaxSubmit($regi_form, _url, function(ret) {
                        if(ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $("#pop_modal").modal('toggle');
                            location.reload();
                        }
                    }, showValidateError, addValidate, false, 'alert');*/
                });
            });

            function addValidate() {
                var flag = false;
                var mem_phone_length = $("input[name='mem_phone[]']").length;

                for(var i=0; i<mem_phone_length; i++) {
                    if ($("input[name='mem_phone[]']")[i].value) {flag = true;}
                }

                if (flag === false) {
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