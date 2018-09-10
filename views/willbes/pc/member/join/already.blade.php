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
                <li class="on">본인인증</li>
                <li>약관동의/정보입력</li>
                <li>회원가입완료</li>
            </ul>
            <div class="user-Txt tx-black">
                <strong class="tx-blue">{{$MemName}}</strong>회원님은 이미 윌비스 회원으로 등록되어 있습니다.</br>
                회원 아이디로 로그인하시거나, 비밀번호 찾기를 진행해 주세요.
            </div>
            <div class="info-Txt info-Txt-Wrap tx-black mt40">
                <strong class="tx-blue">{{$MemId}}</strong> ({{$JoinDate}})
            </div>
            <div class="combinefin-Btn mt60">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="button" onclick="location.replace('{{app_url('/member/login/', 'www')}}');" class="mem-Btn bg-blue bd-dark-blue">
                            <span>로그인</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="button" onclick="location.replace('{{app_url('/member/find/pwd/', 'www')}}');" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">비밀번호 찾기</span>
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