@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">비밀번호 재설정</span>
        </div>
        <!-- 비밀번호 재설정 -->
        <div class="Member mem-renew-Password widthAuto690">
            <div class="user-Txt tx-black">
                비밀번호 재설정이 완료되었습니다.
                <div class="user-sub-Txt tx-gray">
                    설정한 비밀번호로 로그인인후 이용해주십시요.
                </div>
            </div>
            <div class="renew-password-Btn btnAuto180 h36">
                <button type="button" onclick="location.replace('{{app_url('/member/loginform/', 'www')}}');" class="mem-Btn bg-blue bd-dark-blue">
                    <span>로그인페이지</span>
                </button>
            </div>
        </div>
        <!-- End 비밀번호 재설정 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
@stop