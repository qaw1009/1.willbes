@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">로그인</span>
        </div>

        <!-- 로그인 -->
        <div class="Member mem-Login widthAuto460">
            <div class="inputBox p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="inputBox p_re">
                <label for="USER_PWD" class="labelPwd" style="display: block;">비밀번호</label>
                <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" maxlength="30">
            </div>
            <div class="tx-red" style="display: block;">아이디 또는 비밀번호가 일치하지 않습니다.</div>
            <div class="chkBox mt30">
                <ul>
                    <li class="chkBox-Save">
                        <input type="checkbox" id="USER_ID_SAVE" name="USER_ID_SAVE" class="iptSave">
                        <label for="USER_ID_SAVE" class="labelSave tx-gray">아이디 저장</label>
                    </li>
                    <li class="chkBox-Search tx-gray">
                        <span><a class="tx-gray" href="/Member/FindID">아이디</a>/<a class="tx-gray" href="/Member/FindPWD">비밀번호찾기</a></span>
                    </li>
                </ul>
            </div>
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>로그인</span>
            </button>
            <table cellspacing="0" cellpadding="0" class="joinTable tx-gray mt40">
                <colgroup>
                    <col width="356px"/>
                    <col width="104px"/>
                </colgroup>
                <tbody>
                <tr>
                    <td>
                        <span class="tx-blue">아직 윌비스 통합회원이 아니신가요?</span><br/>
                        가입 즉시 패밀리 포인트 3,000P를 받으실 수 있습니다.
                    </td>
                    <td>
                        <a class="bg-dark-blue" href="/Member/Join">통합회원가입</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><span class="tx-blue">윌비스 통합회원이란?</span><br/>
                        한번의 회원가입으로 윌비스 전체 서비스를 이용하실 수 있는 멤버십입니다.
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- End 로그인 -->
        <br/><br/><br/>
    </div>
    <!-- End Container -->
@stop