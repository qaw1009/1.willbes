@extends('btob.layouts.master_single')

@section('content')
    <div class="row lms">
        <div class="login_header col-md-12 pt-10 pd-zero p_re">
            <div class="col-md-4 logo">
                @if(empty($btob_id) === false)
                    <img src="https://static.willbes.net/public/images/btob/{{ $btob_id }}_logo.png" alt="BtoB 로고" class="ml-15" onerror="javascript:this.style.display = 'none';">
                @endif
                <img src="/public/img/logo.png" class="ml-20"/>
            </div>
            <div class="col-md-5">
            </div>
            <div class="col-md-3 nav_txt">
                <span class="pull-right valign-middle"></span>
            </div>
        </div>
        <div class="login_section">
            <section class="login_content">
                <form id="login_form" name="login_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="btob_id" value="{{ $btob_id }}" required="required" title="제휴사아이디"/>
                    <h1 class="color"><span>{{ $__cfg['site_name'] }}</span> Administrator</h1>
                    <h2><img src="/public/img/login.png" /></h2>
                    <div class="loginform">
                        <div class="loginbox">
                            <div class="item">
                                <input type="text" name="admin_id" id="admin_id" class="form-control" placeholder="아이디" required="required" title="아이디" value="{{ $saved_admin_id }}" />
                                <input type="password" name="admin_passwd" id="admin_passwd" class="form-control" placeholder="비밀번호" required="required" title="비밀번호" />
                            </div>
                            <button type="submit" id="btn_login" class="btn bg">로그인</button>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_save_admin_id" class="flat" @if($saved_admin_id != '') checked="checked" @endif value="Y"/> 아이디 저장
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="logininfo mt-30">
                        <ul>
                            <li>관리자 접속 권한이 없으신 경우 본사 담당자에게 관리자 계정을 신청해 주시기 바랍니다.</li>
                        </ul>
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
                var _url = '{{ site_url('/auth/login/login') }}';

                ajaxSubmit($login_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        location.replace('{{ site_url('/home/main') }}');
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop
