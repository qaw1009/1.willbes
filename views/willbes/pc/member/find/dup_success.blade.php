@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">통합회원 전환이 완료되었습니다!</span>
        </div>
        <!-- 통합회원 전환 : 약관동의/정보입력 : 전환완료 -->
        <div class="Member mem-Convert widthAuto690 mb100">
            <div class="user-Txt tx-black">
                <strong>윌비스 통합회원 전환을 환영합니다.</strong><br/>
                로그인후에 이용해 주시 바랍니다.
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
                        <td>{{$ChgDate}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="convert-Btn mt60 tx-center btnAuto h36">
                <button type="button" onclick="location.replace('{{front_app_url('/member/login/', 'www')}}');" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                    <span>로그인</span>
                </button>
            </div>
        </div>
        <!-- End 통합회원 전환 : 약관동의/정보입력 : 전환완료 -->
    </div>
    <!-- End Container -->
@stop