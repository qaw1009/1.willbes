@extends('lcms.layouts.master_single')

@section('content')
    <div class="row @if(SUB_DOMAIN == 'wbs')wbs @else(SUB_DOMAIN == 'lms')lms @endif">
        <div class="login_header col-md-12 pt-10 pd-zero p_re">
            <div class="col-md-4 logo">
                <img src="/public/img/logo.png" class="ml-15 mr-20"/>
            </div>
            @if(SUB_DOMAIN != 'tzone')
                <div class="col-md-5">
                    <ul class="nav nav-tabs bar_tabs">
                        <li role="presentation" class="@if(SUB_DOMAIN == 'wbs') active @endif"><a href="{{ app_url('/lcms/auth/login', 'wbs') }}" class="">WBS</a></li>
                        <li role="presentation" class="@if(SUB_DOMAIN == 'lms') active @endif"><a href="{{ app_url('/lcms/auth/login', 'lms') }}" class="">LMS</a></li>
                    </ul>
                </div>
            @else
                <div class="col-md-5">
                </div>
            @endif
            <div class="col-md-3 nav_txt">
                <span class="pull-right valign-middle">윌비스 통합 관리자(LCMS)</span>
            </div>
        </div>
        <div class="login_section">
            <section class="login_content">
                <form id="login_form" name="login_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <h1 class="color"><span>{{ $__cfg['site_name'] }}</span> Administrator</h1>
                    <h2><img src="/public/img/login.png" /></h2>
                    <div class="loginform">
                        <div class="loginbox">
                            <div class="item">
                                <input type="text" name="admin_id" id="admin_id" class="form-control" placeholder="아이디" required="required" title="아이디" value="{{ $saved_admin_id }}" />
                                <input type="password" name="admin_passwd" id="admin_passwd" class="form-control" placeholder="비밀번호" required="required" title="비밀번호" />
                            </div>
                            <button type="submit" id="btn_login" class="btn btn-sm btn-default bg">로그인</button>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_save_admin_id" class="flat" @if($saved_admin_id != '') checked="checked" @endif value="Y"/> 아이디 저장
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="logininfo">
                        <ul>
                            <li>
                                {{ $__cfg['site_name'] }} 접속권한이 없으신 경우 관리자를 신청해 주시기 바랍니다.
                                @if(SUB_DOMAIN != 'tzone')
                                    <button type="button" id="btn_regist" class="btn btn-sm btn-default bg">관리자 신청</button>
                                @endif
                            </li>
                            <li>보안 유지로 인해 최초 로그인 시 또는 아이피 주소가 변경될 때마다 본인인증을 진행해 주셔야 합니다.</li>
                            <li>담당자 외 접속은 IP 추적을 통해 법적 조치하겠습니다.</li>
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