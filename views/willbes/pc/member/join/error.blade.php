@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">통합회원가입</span>
        </div>
        <!-- 통합회원가입 : 기가입자 -->
        <div class="Member mem-CombineFin widthAuto690">
            <ul class="tabs-Step mb60">
                <li>본인인증</li>
                <li>약관동의/정보입력</li>
                <li class="on">회원가입오류</li>
            </ul>
            <div class="user-Txt tx-black">
                회원가입에 실패했습니다.</br>
                입력하신 정보에 문제가 있거나 일시적인 문제가 발생했습니다.</br>
                다시 회원가입을 시도해주세요.
            </div>
            <div class="combinefin-Btn mt60">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="button" onclick="location.replace('{{front_app_url('/member/join/', 'www')}}');" class="mem-Btn bg-blue bd-dark-blue">
                            <span>회원가입</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End 통합회원가입 : 기가입자 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
@stop