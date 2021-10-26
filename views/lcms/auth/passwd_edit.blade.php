@extends('lcms.layouts.master_modal')
@section('layer_title')
    비밀번호 변경
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_passwd_form" name="_passwd_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
@endsection

@section('layer_content')
    <div class="">
        <div class="well well-sm">
            <ul class="no-margin">
                <li>비밀번호 사용기한이 만료되었습니다.<br/>안전한 사용을 위하여, 기존 비밀번호를 변경 후 다시 로그인 해 주십시오.</li>
                <li>비밀번호 생성규칙 안내<br/>
                    - 8자리 이상의 영문자, 숫자, 일부 특수기호를 혼용하여 사용<br/>
                    - 아이디 포함하여 사용 금지<br/>
                    - 동일 문자 3회 이상 사용 금지 (예. aaa, 111)<br/>
                    - 연속된 문자 3회 이상 사용 금지 (예. abc, cba, 123, 321)
                </li>
            </ul>
        </div>
        {!! form_errors() !!}
        <div class="form-group form-group-sm">
            <label class="control-label col-md-3" for="admin_id">아이디
            </label>
            <div class="col-md-5 item">
                <input type="text" id="admin_id" name="admin_id" required="required" pattern="alphanumeric" class="form-control" title="아이디" value="{{ $admin_id }}" data-passwd-verify="id" readonly="readonly"/>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-3" for="admin_passwd">현재 비밀번호
            </label>
            <div class="col-md-5 item">
                <input type="password" id="admin_passwd" name="admin_passwd" required="required" class="form-control" title="현재 비밀번호"/>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-3" for="admin_new_passwd">새 비밀번호
            </label>
            <div class="col-md-5 item">
                <input type="password" id="admin_new_passwd" name="admin_new_passwd" required="required" class="form-control" title="새 비밀번호" data-passwd-verify="passwd"/>
            </div>
            <div class="col-md-4 pl-0 form-inline">
                {{-- 비밀번호 유효성검사 버튼 --}}
                @include('lcms.common.passwd_verify_partial', ['placement' => 'left'])
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-3" for="admin_re_new_passwd">새 비밀번호 확인
            </label>
            <div class="col-md-5 item">
                <input type="password" id="admin_re_new_passwd" name="admin_re_new_passwd" required="required" class="form-control" data-validate-linked="admin_new_passwd" title="새 비밀번호 확인"/>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var $passwd_form = $('#_passwd_form');

            // 비밀번호 변경
            $passwd_form.submit(function() {
                ajaxSubmit($passwd_form, '{{ site_url('/lcms/auth/regist/forcedUpdatePasswd') }}', function(ret) {
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
    <button type="submit" class="btn btn-success">비밀번호 변경</button>
@endsection

@section('layer_footer')
    </form>
@endsection
