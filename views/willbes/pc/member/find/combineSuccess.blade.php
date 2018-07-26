@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="memContainer widthAuto c_both">
    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합회원 전환이 완료되었습니다!</span>
    </div>
    <!-- 통합회원 전환 : 약관동의/정보입력 : 전환완료 -->
    <div class="Member mem-Convert widthAuto690">
        <ul class="tabs-Step mb60">
            <li>본인인증</li>
            <li>통합회원정보/약관동의</li>
            <li class="on">전환완료</li>
        </ul>
        <div class="user-Txt tx-black">
            <strong>윌비스 통합회원 전환을 환영합니다.</strong><br/>
            기존 수강강좌, 포인트, 쿠폰은 '통합 내강의실'에서 확인하실 수 있습니다.<br/>
            로그인후에 이용해주시기 바랍니다.
        </div>
        <div class="agree-user-Chk">
            <table cellspacing="0" cellpadding="0" class="auTable">
                <colgroup>
                    <col style="width: 180px;"/>
                    <col style="width: 510px;"/>
                </colgroup>
                <tbody>
                <tr>
                    <th>이름</th>
                    <td>{{$MemName}}</td>
                </tr>
                <tr>
                    <th>통합ID</th>
                    <td>{{$MemId}}</td>
                </tr>
                <tr>
                    <th>통합 전환일</th>
                    <td>{{$ChangeDate}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="convert-Btn mt60 tx-center btnAuto h36">
            <button type="button" onclick="location.replace('{{app_url('/Member/LoginForm/', 'www')}}');" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                <span>로그인</span>
            </button>
        </div>
    </div>
    <!-- End 통합회원 전환 : 약관동의/정보입력 : 전환완료 -->


    <br/><br/><br/><br/><br/><br/>
</div>
<!-- End Container -->
@stop