@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원들에게 메일을 발송하고 내역을 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>메일발송</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url('/crm/mail/storeSend/') }}" novalidate>--}}
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="send_type" value="1" title="발송타입">
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영 사이트 <span class="required">*</span></label>
                    <div class="col-md-2 item">
                        {!! html_site_select('', 'site_code', 'site_code', '', '운영 사이트', 'required') !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="send_pattern_ccd">발송 성격 <span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="send_pattern_ccd" name="send_pattern_ccd" required="required" title="발송성격">
                            <option value="">발송성격선택</option>
                            @foreach($arr_send_pattern_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="send_mail">발신 메일<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <input type="text" id="send_mail" name="send_mail" class="form-control" title="발신메일" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="advertise_pattern_ccd">광고성 유무<span class="required">*</span></label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            @foreach($arr_advertise_pattern_ccd as $key => $val)
                                <input type="radio" id="advertise_pattern_ccd_{{ $loop->index }}" name="advertise_pattern_ccd" class="flat" value="{{ $key }}" required="required" title="광고성유무" data-advertise-type="{!! $loop->first ? '1' : '2' !!}"/> <label for="advertise_pattern_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="send_title">제목<span class="required">*</span></label>
                    <div class="col-md-4 item">
                        <input type="text" id="send_title" name="send_title" class="form-control" title="제목" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="send_content">내용<span class="required">*</span></label>
                    <div class="col-md-9">
                        <textarea id="send_content" name="send_content" class="form-control" rows="10" title="내용" placeholder=""></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="advertise_agree_content">광고동의문구</label>
                    <div class="col-md-9">
                        <textarea id="advertise_agree_content" name="advertise_agree_content" class="form-control" rows="5" title="광고동의문구" placeholder="{!! $advertise_placeholder !!}"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-11 text-right">
                        <span class="red">*</span>링크는 반드시 <span class="blue">[수신거부]</span>, <span class="blue">[HERE]</span> 으로 입력합니다.
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="send_attach_file">첨부파일</label>
                    <div class="col-md-4">
                        <input type="file" id="send_attach_file" name="send_attach_file" class="form-control" title="첨부파일"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="send_type">수신자 정보<span class="required">*</span></label>
                    <div class="col-md-9 mt-10">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="form-group ml-10">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="active"><a data-toggle="tab" href="#content_1" class="send_type" data-content-type="1">개별 발송</a></li>
                                            <li><a data-toggle="tab" href="#content_2" class="send_type" data-content-type="2">일괄 발송</a></li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <div id="content_1" class="form-group tab-pane fade in active">
                                            <div class="form-group">
                                                <label class="control-label col-md-2" for="content" style="text-align: left !important;">수신메일 입력</label>
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-default btn-sm btn-primary" id="btn_member_searching">회원검색</button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <table id="mem_mail_table_1" class="table" style="font-size: 12px;">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>이름</th>
                                                            <th>이메일</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @for($i = 1; $i <= $set_row_count-6; $i++)
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>
                                                                    <input type="text" id="mem_name_{{$i}}" name="mem_name[]" class="form-control" title="수신메일" value="" maxlength="6" style="width: 100px;">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="mem_mail_{{$i}}" name="mem_mail[]" class="form-control" title="수신메일" value="">
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table id="mem_mail_table_2" class="table" style="font-size: 12px;">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>이름</th>
                                                            <th>이메일</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @for($i = 7; $i <= $set_row_count; $i++)
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>
                                                                    <input type="text" id="mem_name_{{$i}}" name="mem_name[]" class="form-control" title="수신메일" value="" maxlength="6" style="width: 100px;">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="mem_mail_{{$i}}" name="mem_mail[]" class="form-control" title="수신메일" value="">
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
                                                <label class="control-label col-md-2" for="content" style="text-align: left !important;">수신메일 등록</label>
                                                <div class="col-md-4">
                                                    {{--<button type="button" class="btn btn-default btn-sm btn-primary" id="btn_sample_file_download">양식다운로드</button>--}}
                                                    <a href="{{site_url('/crm/mail/sampleDownload/')}}" class="btn btn-default btn-sm btn-primary" target="_blank">양식다운로드</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <input type="file" id="attach_file" name="attach_file" class="form-control" title="첨부파일"/>
                                                </div>
                                                <div class="col-md-5">
                                                    <button type="button" class="btn btn-default btn-sm btn-primary" id="btn_file_upload">List Up</button>
                                                </div>
                                            </div>
                                            <div style="border-bottom: 1px solid #2A3F54; margin-bottom: 5px;"></div>
                                            <div class="form-group">
                                                <div class="col-md-12" style="height: 290px; max-height: 290px; overflow-y: auto;">
                                                    <table id="mem_mail_list" class="table" style="font-size: 12px;">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>이름</th>
                                                            <th>이메일</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="content">발송옵션</label>
                    <div class="col-md-7 item">
                        <div class="row">
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
                                <div class="col-md-3 form-inline">
                                    <div class="input-group item">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control datepicker" id="send_datm_day" name="send_datm_day" value="" required="required_if:send_option_ccd,N">
                                        {{--<input type="text" class="form-control" id="send_datm_day" name="send_datm_day" value="">--}}
                                    </div>
                                </div>
                                <div class="col-md-3 form-inline">
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

                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">발송</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>

    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            //editor load
            var $editor_content = new cheditor();
            $editor_content.config.editorHeight = '300px';
            $editor_content.config.editorWidth = '100%';
            $editor_content.inputForm = 'send_content';
            $editor_content.run();

            // 광고성 값에 따른 광고동의문구활성,비활성
            var advertise_placeholder = '{{$advertise_placeholder}}';
            var rep_advertise_placeholder = advertise_placeholder.replace(/&#13;&#10;/g,'\r\n');
            $regi_form.on('ifChanged ifCreated', 'input[name="advertise_pattern_ccd"]:checked', function() {
                if ($(this).data('advertise-type') === 1) {
                    $('#advertise_agree_content').attr('placeholder', '');
                    $('#advertise_agree_content').val(rep_advertise_placeholder);
                } else {
                    $('#advertise_agree_content').attr('placeholder', rep_advertise_placeholder);
                    $('#advertise_agree_content').val('');
                }
            });

            // 발송 타입 설정
            $('.send_type').click(function (){
                $regi_form.find('input[name="send_type"]').val($(this).data('content-type'));
            });

            // 발송옵션에 따른 설정 변경
            $regi_form.on('ifChanged ifCreated', 'input[name="send_option_ccd"]:checked', function() {
                var $send_datm_day = $regi_form.find('input[name="send_datm_day"]');
                var $send_datm_h = $regi_form.find('select[name="send_datm_h"]');
                var $send_datm_m = $regi_form.find('select[name="send_datm_m"]');

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

            $regi_form.submit(function() {
                getEditorBodyContent($editor_content);
                var _url = '{{ site_url('/crm/mail/storeSend') }}';

                ajaxLoadingSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        var msg_cnt = ret.ret_data.upload_cnt;
                        var msg = '총 '+msg_cnt+'건의 메시지가 처리되었습니다.';

                        notifyAlert('success', '알림', msg);
                        location.replace('{{ site_url('/crm/mail/') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, 'alert', $regi_form);
            });
        });

        // 운영사이트 변경
        $regi_form.on('change', 'select[name="site_code"]', function() {
            if (this.value == '') {
                $('#send_mail').val('');
            } else {
                var _url = '{{ site_url('/crm/mail/getSiteMailInfoAjax/') }}' + this.value;
                var _data = {
                    '{{ csrf_token_name() }}': $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method': 'POST'
                };
                sendAjax(_url, _data, function (ret) {
                    $('#send_mail').val(ret.site_mail);
                }, showError, false, 'POST');
            }
        });

        function addValidate() {
            var flag = false;
            var send_type = $("input[name='send_type']").val();
            var mem_mail_length = $("input[name='mem_mail[]']").length;

            for(var i=0; i<mem_mail_length; i++) {
                if ($("input[name='mem_mail[]']")[i].value) {flag = true;}
            }

            if (send_type == 1 && flag === false) {
                alert('수신정보(메일)은 필수입니다.');
                return false;
            }
            return true;
        }

        // 회원검색
        $('#btn_member_searching').click(function() {
            $('#btn_member_searching').setLayer({
                "url" : "{{ site_url('crm/sms/listMemberModal') }}",
                "width" : "1200",
                "modal_id" : "modal_html2"
            });
        });

        // 일괄발송 -> 파일 등록 및 Excel Data 셋팅
        $('#btn_file_upload').click(function (){
            var data;
            var _url = '{{ site_url("/crm/mail/fileUploadAjax/") }}';
            var fd = new FormData();
            var files = $('#attach_file')[0].files[0];

            if (files === undefined) {
                alert('파일을 선택해 주세요.');
                return false;
            }

            // TR 초기화
            $('#mem_mail_list > tbody > tr').remove();

            // Ajax 데이터 셋팅
            fd.append('{{ csrf_token_name() }}',$regi_form.find('input[name="{{ csrf_token_name() }}"]').val());
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
                        send_list += '<td>'+item.B+'</td>';
                        send_list += '</tr>';
                        $('#mem_mail_list > tbody').append(send_list);
                    });

                }
            }, showError, 'POST', $regi_form, 'json', true);
        });

        // 목록 이동
        $('#btn_list').click(function() {
            location.replace('{{ site_url('/crm/mail/') }}' + getQueryString());
        });
    </script>
@stop