@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">휴면회원 해제</span>
        </div>
        <!-- 휴면회원 해제 : 휴대폰 인증 -->
        <div class="Member mem-Search widthAuto690">
            <div class="user-Txt tx-black">
                1년 이상 윌비스에 로그인하지 않아 휴면상태로 전환된 경우라도,</br>
                계정정보를 인증하시면 정상적으로 서비스를 이용하실 수 있습니다.
            </div>
            <ul class="tabs c_both">
                <li><a href="#none">아이디 찾기</a></li>
                <li><a href="#none">비밀번호 찾기</a></li>
                <li class="on"><a href="#none">휴면회원 해제</a></li>
            </ul>
            <ul class="tabs-Certi">
                <li id="tab1" class="on">
                    <a href="#none">
                        <div>휴대폰 인증</div>
                    </a>
                </li>
                <li id="tab2">
                    <a href="#none">
                        <div>E-mail 인증</div>
                    </a>
                </li>
                <li id="tab3">
                    <a href="#none">
                        <div>아이핀 인증</div>
                    </a>
                </li>
            </ul>
            <div class="widthAuto460">
                <div class="inputBox mt30 p_re">
                    <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                    <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
                </div>
                <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
            </div>
            <div class="search-Btn btnAuto120 mt30 h36">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>휴대폰 인증</span>
                </button>
            </div>
            <div class="notice-Txt tx-gray tx-left mt40 pl20">
                * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.<br/>
                * 아이디/비밀번호가 생각나지 않으신가요? 아이디/비밀번호 찾기를 이용해 주세요.
            </div>
        </div>
        <!-- End 휴면회원 해제 : 휴대폰 인증 -->


        <br/><br/><br/>


        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">아이디/비밀번호 찾기</span>
        </div>
        <!-- 휴면회원 해제 : E-mail 인증 -->
        <div class="Member mem-Search widthAuto690">
            <div class="user-Txt tx-black">
                1년 이상 윌비스에 로그인하지 않아 휴면상태로 전환된 경우라도,</br>
                계정정보를 인증하시면 정상적으로 서비스를 이용하실 수 있습니다.
            </div>
            <ul class="tabs c_both">
                <li><a href="#none">아이디 찾기</a></li>
                <li class="on"><a href="#none">비밀번호 찾기</a></li>
                <li><a href="#none">휴면회원 해제</a></li>
            </ul>
            <ul class="tabs-Certi">
                <li id="tab1">
                    <a href="#none">
                        <div>휴대폰 인증</div>
                    </a>
                </li>
                <li id="tab2" class="on">
                    <a href="#none">
                        <div>E-mail 인증</div>
                    </a>
                </li>
                <li id="tab3">
                    <a href="#none">
                        <div>아이핀 인증</div>
                    </a>
                </li>
            </ul>
            <div class="widthAuto460">
                <div class="inputBox mt30 p_re">
                    <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                    <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
                </div>
                <div class="inputBox p_re">
                    <label for="USER_EMAIL" class="labelEmail" style="display: block;">이메일</label>
                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" maxlength="30"> @
                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                    <select id="email" name="email" title="직접입력" class="seleEmail">
                        <option selected="selected">직접입력</option>
                        <option value="naver.com">naver.com</option>
                        <option value="daum.net">daum.net</option>
                    </select>
                </div>
                <div class="tx-red" style="display: block;">가입 시 입력한 메일주소를 입력해 주세요.</div>
            </div>
            <div class="search-Btn btnAuto120 mt70 h36">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>이메일 인증</span>
                </button>
            </div>
            <div class="notice-Txt tx-gray tx-left mt40 pl20">
                * 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.<br/>
                * 아이디/비밀번호가 생각나지 않으신가요? 아이디/비밀번호 찾기를 이용해 주세요.
            </div>
        </div>
        <!-- End 휴면회원 해제 : E-mail 인증 -->


        <br/><br/><br/>





    </div>
    <!-- End Container -->
@stop