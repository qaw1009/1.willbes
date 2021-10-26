@extends('lcms.layouts.master_modal')
@section('layer_title')
    관리자 신청
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_admin_form" name="_admin_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
@endsection

@section('layer_content')
    <div class="well well-sm">
        <ul class="no-margin">
            <li>관리자 신청이 완료되면 담당자 승인 후 접속이 가능합니다. (승인 문자 발송)</li>
            <li>1시간 내에 승인 문자가 발송되지 않을 경우 웹기획팀(직통번호:7122)에 문의해 주세요.</li>
        </ul>
    </div>
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_name">이름 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="text" id="admin_name" name="admin_name" required="required" class="form-control" title="이름" value="">
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_id">아이디 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="text" id="admin_id" name="admin_id" required="required" pattern="alphanumeric" class="form-control" title="아이디" value="" data-passwd-verify="id">
        </div>
        <div class="col-md-6 pl-0">
            <button type="button" id="btn_duplicate_check" class="btn btn-sm btn-primary">중복확인</button>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_passwd">비밀번호 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="password" id="admin_passwd" name="admin_passwd" required="required" class="form-control" title="비밀번호" value="" data-passwd-verify="passwd">
        </div>
        <div class="col-md-6 pl-0 form-inline">
            {{-- 비밀번호 유효성검사 버튼 --}}
            @include('lcms.common.passwd_verify_partial', ['placement' => 'left'])
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_re_passwd">비밀번호 확인 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="password" id="admin_re_passwd" name="admin_re_passwd" required="required" data-validate-linked="admin_passwd" class="form-control" title="비밀번호 확인" value="">
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_phone1">휴대폰번호 <span class="required">*</span>
        </label>
        <div class="col-md-10 form-inline item multi">
            <select name="admin_phone1" id="admin_phone1" class="form-control" required="required" title="휴대폰번호1" style="width: 90px;">
                @foreach($phone1_ccd as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
            - <input type="number" id="admin_phone2" name="admin_phone2" required="required" class="form-control" maxlength="4" title="휴대폰번호2" value="" style="width: 90px">
            - <input type="number" id="admin_phone3" name="admin_phone3" required="required" class="form-control" maxlength="4" title="휴대폰번호3" value="" style="width: 90px">
            <input type="hidden" id="admin_phone" name="admin_phone" required="required" pattern="mobile" title="휴대폰번호" value=""/>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_dept_ccd">소속/직급
        </label>
        <div class="col-md-10 form-inline item">
            <select name="admin_dept_ccd" id="admin_dept_ccd" class="form-control" title="소속">
                <option value="">선택</option>
                @foreach($dept_ccd as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
            <select name="admin_position_ccd" id="admin_position_ccd" class="form-control" title="직급">
                <option value="">선택</option>
                @foreach($position_ccd as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_mail_id">E-mail <span class="required">*</span>
        </label>
        <div class="col-md-10 form-inline item">
            <input type="text" id="admin_mail_id" name="admin_mail_id" required="required" class="form-control" title="메일 아이디" value="" style="width: 160px">
            @ <input type="text" id="admin_mail_domain" name="admin_mail_domain" required="required" class="form-control" title="메일 도메인" value="" style="width: 140px">
            <select name="admin_mail_domain_ccd" id="admin_mail_domain_ccd" class="form-control" title="메일 도메인">
                @foreach($mail_domain_ccd as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_desc">설명
        </label>
        <div class="col-md-9 item">
            <textarea id="admin_desc" name="admin_desc" class="form-control" rows="3" title="설명" placeholder="권한유형을 기입해 주세요. (모르면 생략)"></textarea>
        </div>
    </div>
    <script type="text/javascript">
        var $admin_form = $('#_admin_form');

        $(document).ready(function() {
            // 메일 도메인 선택
            $admin_form.on('change', 'select[name=admin_mail_domain_ccd]', function() {
                setMailDomain('admin_mail_domain_ccd', 'admin_mail_domain');
            });
            setMailDomain('admin_mail_domain_ccd', 'admin_mail_domain', 'willbes.com');

            // 아이디 중복 체크
            $admin_form.on('click', '#btn_duplicate_check', function() {
                var data = {
                    '{{ csrf_token_name() }}' : $admin_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'admin_id' : $admin_form.find('input[name=admin_id]').val()
                };
                sendAjax('{{ site_url('/lcms/auth/regist/idCheck') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        if (confirm(ret.ret_msg)) {
                            $admin_form.find('input[name=admin_id]').prop('readonly', true);
                        } else {
                            $admin_form.find('input[name=admin_id]').val('');
                        }
                    }
                }, showError, false, 'POST');
            });

            // 관리자 신청
            $admin_form.submit(function() {
                var _url = '{{ site_url('/lcms/auth/regist/store') }}';

                ajaxSubmit($admin_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, function() {
                    // 아이디 중복체크 완료 여부 체크
                    if ($admin_form.find('input[name=admin_id]').prop('readonly') !== true) {
                        alert('아이디 중복확인을 체크해 주세요.');
                        return false;
                    }
                    // 메일 유효성 체크
                    var admin_mail = $admin_form.find('input[name=admin_mail_id]').val() + '@' + $admin_form.find('input[name=admin_mail_domain]').val();
                    if ((new FormValidator()).checkRegex(admin_mail, 'email').valid === false) {
                        return false;
                    }
                    return true;
                }, false, 'alert');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">관리자 신청</button>
@endsection

@section('layer_footer')
    </form>
@endsection