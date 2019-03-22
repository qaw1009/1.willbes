@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">휴면회원 해제</span>
        </div>
        <!-- 휴면회원 해제 : 완료 -->
        <div class="Member mem-SearchClear widthAuto690">
            <div class="user-Txt tx-black">
                본인 인증이 완료되어 고객님의 계정이 활성화 되었습니다.</br>
                재로그인 후 정상적으로 서비스 이용이 가능합니다.
            </div>
            <div class="info-Txt tx-gray mt30">
                이용과 관련한 궁금한 점이 있으실 경우 <a href="#none" class="tx-blue">윌비스 고객센터</a>로 문의주시기 바랍니다.
            </div>
            <div class="searchclear-Btn btnAuto180 mt50 h36">
                <button type="button" onclick="location.replace('{{front_app_url('/member/login/', 'www')}}');" class="mem-Btn bg-blue bd-dark-blue">
                    <span>로그인페이지</span>
                </button>
            </div>
        </div>
        <!-- End 휴면회원 해제 : 완료 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
@stop