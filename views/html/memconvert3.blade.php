@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="memContainer widthAuto c_both">

    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">통합 서비스 안내</span>
    </div>
    <!-- 통합 서비스 안내 -->
    <div class="Member mem-Convert widthAuto690 mb100">
        <div class="info-Txt tx-black">
            회원님의 아이디 <strong class="tx-blue">willbes</strong>는 이미 중복된 아이디입니다.<br/>
            번거로우시겠지만 <span class="tx-red">w윌비스 통합 서비스의 원활한 이용을 위해 아이디 변경</span>을 부탁드리겠습니다.
        </div>
        <div class="agree-user-Chk">
            <div class="agree-All-Tit tx-black p_re">
                통합회원정보
            </div>
            <ul>
                <li class="agree-Confirm bg-light-gray">
                    홍길동
                </li>
                <li class="agree-Confirm bg-light-gray">
                    1988-05-21
                </li>
                <li class="agree-Confirm bg-light-gray">
                    010-1234-5678
                </li>
                <li class="agree-User">
                    <div class="agree-Tit tx-gray">
                        <div class="inputBox agreeBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="신규 통합 아이디" maxlength="30">
                            <a class="bg-dark-blue" href="#none">중복확인</a>
                        </div>
                        <div class="tx-gray mb10">4~20자리 영문 대소문자, 숫자만 입력 가능</div>
                        <div class="tx-red" style="display: block;">* 유효성메시지노출</div>
                    </div>
                </li>
                <li class="agree-User">
                    <div class="agree-Tit tx-gray">
                        <div class="inputBox agreeBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="신규 비밀번호" maxlength="30">
                        </div>
                        <div class="tx-gray mb10">4~20자리 영문 대소문자, 숫자만 입력 가능</div>
                        <div class="tx-red" style="display: block;">* 유효성메시지노출</div>
                    </div>
                </li>
                <li class="agree-User">
                    <div class="agree-Tit tx-gray">
                        <div class="inputBox agreeBox p_re">
                            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="신규 비밀번호 확인" maxlength="30">
                            <a class="bg-dark-blue" href="#none">확인</a>
                        </div>
                        <div class="tx-gray mb10">8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합</div>
                        <div class="tx-red" style="display: block;">* 유효성메시지노출</div>
                    </div>
                </li>                
            </ul>
            <div class="convert-Btn mt40 pt30 tx-center btnAuto h66">
                <button type="submit" onclick="" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                    <span>아이디 변경하기</span>
                </button>
            </div>
        </div>        
    </div>
    <!-- End 아이디 변경하기-->

</div>
<!-- End Container -->
@stop