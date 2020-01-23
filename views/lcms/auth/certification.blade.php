@extends('lcms.layouts.master_modal')
@section('layer_title')
    본인 인증
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="admin_id" value="{{ $admin_id }}"/>
@endsection

@section('layer_content')
    <div class="well well-sm">
        <ul class="no-margin">
            <li>이전 로그인 정보와 일치하지 않습니다. 본인인증을 진행해 주세요.</li>
        </ul>
    </div>
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="cert_phone1">휴대폰 번호
        </label>
        <div class="col-md-9 form-inline">
            <select name="cert_phone1" id="cert_phone1" class="form-control" title="휴대폰번호1">
                <option value="010">010</option>
                <option value="011">011</option>
                <option value="016">016</option>
                <option value="017">017</option>
                <option value="018">018</option>
                <option value="019">019</option>
            </select>
            - <input type="number" id="cert_phone2" name="cert_phone2" class="form-control" maxlength="4" title="휴대폰번호2" value="" style="width: 100px">
            - <input type="number" id="cert_phone3" name="cert_phone3" class="form-control" maxlength="4" title="휴대폰번호3" value="" style="width: 100px">
            <button type="button" class="btn btn-sm btn-primary ml-5 btn-send-auth-number" data-type="sms">인증번호 받기</button>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="cert_mail">E-mail
        </label>
        <div class="col-md-9 form-inline">
            <input type="email" id="cert_mail" name="cert_mail" class="form-control" title="E-mail" value="" style="width: 235px">
            <button type="button" class="btn btn-sm btn-primary ml-5 btn-send-auth-number" data-type="mail">인증번호 받기</button>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <p class="form-control-static ml-20 blue">* WBS에 등록된 휴대폰번호 또는 이메일주소로만 본인인증이 가능합니다.</p>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="auth_number">인증번호
        </label>
        <div class="col-md-9 item form-inline">
            <input type="number" id="auth_number" name="auth_number" required="required" class="form-control" title="인증번호" value="" style="width: 100px">
            <p class="form-control-static ml-20">남은 시간 : <span id="timer" class="red">3분 0초</span>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <p class="form-control-static ml-20 blue">* 발송된 인증번호를 입력해 주세요.</p>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#_regi_form');
        var $is_sended_auth_number = false;

        $(document).ready(function() {
            // 인증번호 받기
            $('.btn-send-auth-number').click(function() {
                var type = $(this).data('type');
                var validator = new FormValidator();
                var cert_phone = '', cert_mail = '';

                if (type == 'sms') {
                    cert_phone = $regi_form.find('select[name="cert_phone1"]').val() + '-' + $regi_form.find('input[name="cert_phone2"]').val() + '-' + $regi_form.find('input[name="cert_phone3"]').val();
                    if (validator.checkRegex(cert_phone, 'phone').valid === false) {
                        return false;
                    }
                } else {
                    cert_mail = $regi_form.find('input[name="cert_mail"]').val();
                    if (validator.checkRegex(cert_mail, 'email').valid === false) {
                        return false;
                    }
                }

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'admin_id' : $regi_form.find('input[name=admin_id]').val(),
                    'cert_type' : type,
                    'cert_phone' : cert_phone,
                    'cert_mail' : cert_mail
                };
                sendAjax('{{ site_url('/lcms/auth/login/sendAuthNumber') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $regi_form.find('input[name=auth_number]').focus();
                        $is_sended_auth_number = true;

                        // 인증번호 남은시간 타이머
                        var set_sec = 180;
                        var $timer = setInterval(function() {
                            // 분,초 표시
                            $('#timer').html(Math.floor(set_sec / 60) + "분 " + (set_sec % 60) + "초");

                            set_sec--;
                            if (set_sec < 0) {
                                notifyAlert('error', '알림', '인증번호 입력 제한시간이 초과되었습니다. 인증번호 받기를 다시 진행해 주세요.');
                                clearInterval($timer);
                            }
                        }, 1000);
                    }
                }, showError, false, 'POST');
            });

            // 인증하기
            $regi_form.submit(function() {
                if ($is_sended_auth_number === false) {
                    alert('먼저 인증번호 받기를 진행해 주세요.');
                    return;
                }

                var _url = '{{ site_url('/lcms/auth/login/certification') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">인증하기</button>
@endsection

@section('layer_footer')
    </form>
@endsection