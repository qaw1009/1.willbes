@extends('html.m.layouts.master')

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
            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="아이디" maxlength="30">
        </div>
        <div class="inputBox p_re">
            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="비밀번호" maxlength="30">
        </div>
        <div class="tx-red" style="display: block;">아이디 또는 비밀번호가 일치하지 않습니다.</div>
        <div class="chkBox mt30">
            <ul>
                <li class="chkBox-Save">
                    <input type="checkbox" id="USER_ID_SAVE" name="USER_ID_SAVE" class="iptSave">
                    <label for="USER_ID_SAVE" class="labelSave tx-gray">아이디 저장</label>
                </li>
            </ul>
        </div>
        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
            <span>로그인</span>
        </button>
    </div>
    <!-- End 로그인 -->

</div>
<!-- End Container -->
@stop