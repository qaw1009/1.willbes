@php
    $passwd_info_title = '# 비밀번호 생성규칙';
    $passwd_info_content = '
        - 최소 8자리 이상, 영문자/숫자/특수문자 혼용<br/>
        - 아이디 포함 금지<br/>
        - 동일문자 3회 이상 사용 금지 (ex. aaa, 111)<br/>
        - 연속된 문자 3회 이상 사용 금지 (ex. abc, 321)
    ';
@endphp
<button type="button" name="_btn_passwd_check" class="btn btn-sm btn-primary">유효성검사</button>
<span id="_btn_passwd_info" data-placement="{{ $placement or 'right' }}" data-html="true" data-title="{{ $passwd_info_title }}" data-content="{!! $passwd_info_content !!}" class="cs-pointer">
    <i class="fa fa-lg fa-question-circle"></i>
</span>
<script type="text/javascript">
    $(document).ready(function() {
        var $_passwd_form = $('button[name="_btn_passwd_check"]').closest('form');

        // 유효성검사 버튼 클릭
        $_passwd_form.on('click', 'button[name="_btn_passwd_check"]', function() {
            var id = $_passwd_form.find('input[data-passwd-verify="id"]').val();
            var passwd = $_passwd_form.find('input[data-passwd-verify="passwd"]').val();

            if (id.length < 1) {
                alert('아이디를 입력해 주세요.');
                return;
            }
            if (passwd.length < 1) {
                alert('비밀번호를 입력해 주세요.');
                return;
            }

            var data = {
                '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                '_method' : 'POST',
                'admin_id' : id,
                'admin_passwd' : passwd
            };
            sendAjax('{{ site_url('/lcms/common/passwdVerify/check') }}', data, function(ret) {
                alert(ret.ret_msg);
            }, showValidateError, false, 'POST');
        });

        // 비밀번호 생성규칙 표시
        $_passwd_form.find('#_btn_passwd_info').popover({
            container: 'body',
            trigger: 'hover'
        });
    });
</script>
