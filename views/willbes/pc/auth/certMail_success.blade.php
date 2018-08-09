@extends('willbes.pc.layouts.master')

@section('content')
    <form name="mail_form" id="mail_form" method="post" action=
    @if($CertTypeCcd == '662001')
        "/Member/joinForm/"
    @elseif($CertTypeCcd == '662002')
        "/Member/FindIDProc/"
    @elseif($CertTypeCcd == '662003')
        "/Member/FindPWDForm/"
    @elseif($CertTypeCcd == '662004')
        "/Member/ActivateSleep/"
    @elseif($CertTypeCcd == '662005')
        "/Member/ChangeMailProc/"
    @elseif($CertTypeCcd == '662006')
        "/Member/CombineForm/"
    @endif >
    {!! csrf_field() !!}
    <input type="hidden" id="enc_data" name="enc_data" value="{{$enc_data}}">
    <input type="hidden" id="jointype" name="jointype" value="655003">
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">이메일인증</span>
        </div>
        <!-- 휴면회원 해제 : 완료 -->
        <div class="Member mem-SearchClear widthAuto690">
            <div class="user-Txt tx-black">
                이메일 인증이 확인되었습니다.</br>
                아래 확인 버튼을 눌러서 다음 단계로 이동해주십시요.
            </div>
            <div class="info-Txt tx-gray mt30">
                이용과 관련한 궁금한 점이 있으실 경우 <a href="#none" class="tx-blue">윌비스 고객센터</a>로 문의주시기 바랍니다.
            </div>
            <div class="searchclear-Btn btnAuto180 mt50 h36">
                <button type="submit" class="mem-Btn bg-blue bd-dark-blue">
                    <span>확인</span>
                </button>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/>
    </div>
    </form>
@stop