@extends('lcms.layouts.master_single')

@section('content')
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <section class="login_content">
                <form id="login_form" name="login_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <h1>{{ $__cfg['site_name'] }} LOGIN</h1>
                    <p class="text-left">계정정보 입력없이 로그인 버튼 클릭</p>
                    <div class="item">
                        <input type="text" name="admin_id" id="admin_id" class="form-control" placeholder="아이디" required="required" title="아이디" value="{{ $saved_admin_id }}" />
                    </div>
                    <div class="item">
                        <input type="password" name="admin_passwd" id="admin_passwd" class="form-control" placeholder="비밀번호" required="required" title="비밀번호" />
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="is_save_admin_id" class="flat" @if($saved_admin_id != '') checked="checked" @endif value="Y"/> 아이디 저장
                        </label>
                    </div>
                    <div class="mt-20">
                        <button type="submit" id="btn_login" class="btn btn-sm btn-default">로그인</button>
                        @if(SUB_DOMAIN != 'tzone')
                            <button type="button" id="btn_regist" class="btn btn-sm btn-default">관리자 신청</button>
                        @endif
                    </div>
                </form>
            </section>
        </div>
    </div>
    <script type="text/javascript">
        var $login_form = $('#login_form');

        $(document).ready(function() {
            // 로그인
            $login_form.submit(function() {
                var _url = '{{ site_url('/lcms/auth/login/login') }}';

                ajaxSubmit($login_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        location.replace('{{ site_url('/home/main') }}');
                    }
                }, showLoginError, null, false, 'alert');
            });

            function showLoginError(result, status) {
                showValidateError(result, status);

                if (status == 403) {
                    $('<button id="btn_hidden" class="hide"></button>').insertBefore('form:eq(0)');
                    $('#btn_hidden').setLayer({
                        'url' : '{{ site_url('/lcms/auth/login/certification') }}/' + $login_form.find('input[name="admin_id"]').val(),
                        'width' : 900
                    }).click();
                }

                $login_form.find('input[name="admin_id"]').val('');
                $login_form.find('input[name="admin_passwd"]').val('');
                $login_form.find('input[name="admin_id"]').focus();
            }

            @if(SUB_DOMAIN != 'tzone')
                $('#btn_regist').setLayer({
                    'url' : '{{ site_url('/lcms/auth/regist/create') }}',
                    'width' : 900
                });
            @endif
        });
    </script>
@stop