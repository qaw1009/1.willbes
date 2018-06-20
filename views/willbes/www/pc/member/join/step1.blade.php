@extends('willbes.layouts.pc.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="/public/img/front/login/logo.gif">
            <span class="tx-blue">통합회원가입</span>
        </div>
        <!-- 통합회원가입 : 휴대폰 인증 -->
        <div class="Member mem-Combine widthAuto690">
            <ul class="tabs-Step mb60">
                <li class="on">본인인증</li>
                <li>약관동의/정보입력</li>
                <li>회원가입완료</li>
            </ul>
            <ul class="tabs c_both">
                <li class="on"><a href="#none">휴대폰 인증</a></li>
                <li><a href="#none">E-mail 인증</a></li>
                <li><a href="#none">아이핀 인증</a></li>
            </ul>
            <ul class="tabs-Certi tx-center mb20">
                <img src="/public/img/front/login/icon_phone_on_sm.gif">
            </ul>
            <div class="search-Btn btnAuto120 h36">
                <button type="submit" onclick="javascript:fnCp();" class="mem-Btn bg-blue bd-dark-blue">
                    <span>휴대폰 인증</span>
                </button>
            </div>
            <div class="notice-Txt tx-gray mt40">
                * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며,
                인증 이외의 용도로 이용 또는 저장하지 않습니다.
            </div>
        </div>
        <!-- End 통합회원가입 : 휴대폰 인증 -->


        <br/><br/><br/>


        <div class="mem-Tit">
            <img src="/public/img/front/login/logo.gif">
            <span class="tx-blue">통합회원가입</span>
        </div>
        <!-- 통합회원가입 : E-mail 인증 -->
        <div class="Member mem-Combine widthAuto690">
            <ul class="tabs-Step mb60">
                <li class="on">본인인증</li>
                <li>약관동의/정보입력</li>
                <li>회원가입완료</li>
            </ul>
            <ul class="tabs c_both">
                <li><a href="#none">휴대폰 인증</a></li>
                <li class="on"><a href="#none">E-mail 인증</a></li>
                <li><a href="#none">아이핀 인증</a></li>
            </ul>
            <div class="widthAuto560">
                <div class="inputBox combineBox">
                    <img src="/public/img/front/login/icon_email_on_sm.gif">
                    <div class="inputBox-Wrap p_re">
                        <label for="USER_EMAIL" class="labelEmail" style="display: block;">이메일</label>
                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" maxlength="30"> @
                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                        <select id="email" name="email" title="직접입력" class="seleEmail">
                            <option selected="selected">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.net">daum.net</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="search-Btn btnAuto120 mt70 h36">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>이메일 인증</span>
                </button>
            </div>
            <div class="notice-Txt tx-gray mt40">
                * 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.
            </div>
        </div>
        <!-- End 통합회원가입 : E-mail 인증 -->


        <br/><br/><br/>


        <div class="mem-Tit">
            <img src="/public/img/front/login/logo.gif">
            <span class="tx-blue">통합회원가입</span>
        </div>
        <!-- 통합회원가입 : 아이핀 인증 -->
        <div class="Member mem-Combine widthAuto690">
            <ul class="tabs-Step mb60">
                <li class="on">본인인증</li>
                <li>약관동의/정보입력</li>
                <li>회원가입완료</li>
            </ul>
            <ul class="tabs c_both">
                <li><a href="#none">휴대폰 인증</a></li>
                <li><a href="#none">E-mail 인증</a></li>
                <li class="on"><a href="#none">아이핀 인증</a></li>
            </ul>
            <ul class="tabs-Certi tx-center mb20">
                <img src="/public/img/front/login/icon_ipin_on_sm.gif">
            </ul>
            <div class="search-Btn btnAuto120 h36">
                <button type="submit" onclick="javascript:fnIpin();" class="mem-Btn bg-blue bd-dark-blue">
                    <span>아이핀 인증</span>
                </button>
            </div>
            <div class="notice-Txt tx-gray mt40">
                * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며,
                인증 이외의 용도로 이용 또는 저장하지 않습니다.
            </div>
        </div>
        <!-- End 통합회원가입 : 아이핀 인증 -->
        <br/><br/><br/>
    </div>
    <!-- End Container -->

    <form name="form_cp" method="post">
        <input type="hidden" name="m" value="checkplusSerivce">
        <input type="hidden" name="EncodeData" value="<?= $cpData['encData'] ?>">
    </form>

    <form name="form_ipin" method="post">
        <input type="hidden" name="m" value="pubmain">
        <input type="hidden" name="enc_data" value="<?= $ipinData['encData'] ?>">
        <input type="hidden" name="param_r1" value="join">
        <input type="hidden" name="param_r2" value="">
        <input type="hidden" name="param_r3" value="">
    </form>

    <form name="vnoform" method="post">
        <input type="hidden" name="enc_data">
        <input type="hidden" name="param_r1" value="">
        <input type="hidden" name="param_r2" value="">
        <input type="hidden" name="param_r3" value="">
    </form>

    <script src='/public/js/util.js'></script>
    <script>
        function fnCp()
        {
            popupOpen('', 'popupCP', '500', '550', null, null);
            document.form_cp.target = "popupCP";
            document.form_cp.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
            document.form_cp.submit();
        }

        function fnIpin()
        {
            popupOpen('', 'popupIPIN', '450', '550', null, null);
            document.form_ipin.target = "popupIPIN";
            document.form_ipin.action = "https://cert.vno.co.kr/ipin.cb";
            document.form_ipin.submit();
        }
    </script>
@stop