@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">휴면회원 안내</span>
        </div>
        <!-- 휴면회원 안내 -->
        <div class="Member mem-Dormant widthAuto690">
            <div class="user-Txt tx-black">
                안녕하세요. <span class="tx-blue">{{$MemName}}</span>회원님<br/>
                오랫동안 이용하지 않아 회원님의 아이디가 휴면 상태로 전환되었습니다.
            </div>
            <div class="info-Txt tx-gray">
                윌비스 전체 서비스를 다시 이용하고 싶은 경우에는<br/>
                <strong>'휴면회원 해제'</strong> 버튼을 클릭해 주세요.
            </div>
            <div class="dormant-Btn btnAuto180 h36">
                <button type="button" onclick="location.replace('{{app_url('/Member/Sleep', 'www')}}');" class="mem-Btn bg-blue bd-dark-blue">
                    <span>휴면회원 해제</span>
                </button>
            </div>
        </div>
        <!-- End 휴면회원 안내 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
@stop