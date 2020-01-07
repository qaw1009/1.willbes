@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">통합 서비스 안내</span>
        </div>
        <!-- 통합 서비스 안내 : 고객센터-->
        <div class="Member mem-Combine widthAuto690 mb100">
            <div class="user-Txt tx-black">
                일치하는 정보가 없습니다.<br>
                다시 <span class="tx-red">본인인증을 진행</span>해 주시거나 고객센터로 문의해 주시기 바랍니다.
            </div>
            <div class="convert-Btn mt40 pt30 tx-center btnAuto h66">
                <button type="button" onclick="location.replace('{{front_app_url('/member/combine/dup', 'www')}}');" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                    <span>본인인증 다시 하기</span>
                </button>
            </div>
            <div class="info-Txt-cs NG">
            <span>
                1544-5006 <a href="{{ site_url('/support/main') }}" target="_blank">고객센터 ></a>
            </span>
            </div>
        </div>
        <!-- End 통합회원가입 : 아이디 변경 -->

    </div>
    <!-- End Container -->
@stop