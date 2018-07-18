@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">휴면회원 해제</span>
        </div>
        <!-- 휴면회원 해제 -->
        <div class="Member mem-Search widthAuto690">
            <div class="user-Txt tx-black">
                1년 이상 윌비스에 로그인하지 않아 휴면상태로 전환된 경우라도,</br>
                계정정보를 인증하시면 정상적으로 서비스를 이용하실 수 있습니다.
            </div>
            <ul class="tabs c_both">
                <li><a href="{{app_url('/Member/FindID', 'www')}}">아이디 찾기</a></li>
                <li><a href="{{app_url('/Member/FindPWD', 'www')}}">비밀번호 찾기</a></li>
                <li><a class='on' href="{{app_url('/Member/Sleep', 'www')}}">휴면회원 해제</a></li>
            </ul>
            <ul class="tabWrap tabLoginDepth2 tabs-Certi">
                <li id="tab1"><a href="#lock_certi1"><div>휴대폰 인증</div></a></li>
                <li id="tab2"><a href="#lock_certi2"><div>E-mail 인증</div></a></li>
                <li id="tab3"><a href="#lock_certi3"><div>아이핀 인증</div></a></li>
            </ul>
            <div clsas="tabBox">
                <div id="lock_certi1">
                    <div class="widthAuto460 mt30">
                        <div class="inputBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="아이디" maxlength="30">
                        </div>
                        <div class="tx-red mb30" style="display: block;">이름을 정확하게 입력해 주세요.</div>
                        <div class="inputBox p_re">
                            <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone certi" placeholder="휴대폰번호(-제외)" maxlength="30">
                            <button type="submit" onclick="" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                                <span>인증번호 발송</span>
                            </button>
                        </div>
                        <div class="tx-red mb30" style="display: block;"> ‘-’ 없이 숫자만 입력해 주세요.</div>
                        <div class="inputBox p_re">
                            <input type="text" id="USER_NUMBER" name="USER_NUMBER" class="iptNumber" placeholder="인증번호입력" maxlength="30">
                        </div>
                        <div class="tx-red mb30" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
                    </div>
                    <div class="search-Btn btnAuto120 mt30 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>확인</span>
                        </button>
                    </div>
                    <div class="notice-Txt tx-gray mt40">* 아이디/비밀번호가 생각나지 않으신가요? <span class="underline valign-base">아이디/비밀번호 찾기</span>를 이용해 주세요.</div>
                </div>
                <div id="lock_certi2">
                    <div class="widthAuto460 mt30">
                        <div class="inputBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="아이디" maxlength="30">
                        </div>
                        <div class="inputBox p_re">
                            <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" placeholder="이메일" maxlength="30"> @
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
                            <span>확인</span>
                        </button>
                    </div>
                    <div class="notice-Txt tx-gray mt40">* 아이디/비밀번호가 생각나지 않으신가요? <span class="underline valign-base">아이디/비밀번호 찾기</span>를 이용해 주세요.</div>
                </div>
                <div id="lock_certi3">
                    <div class="widthAuto460 mt30">
                        <div class="inputBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="아이디" maxlength="30">
                        </div>
                        <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
                    </div>
                    <div class="search-Btn btnAuto120 mt30 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>아이핀 인증</span>
                        </button>
                    </div>
                    <div class="notice-Txt tx-gray tx-left mt40 pl60">
                        * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.<br/>
                        * 아이디/비밀번호가 생각나지 않으신가요? <span class="underline valign-base">아이디/비밀번호 찾기</span>를 이용해 주세요.
                    </div>
                </div>
            </div>
        </div>
        <!-- End 휴면회원 해제 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
    <form name="vnoform" id="vnoform" method="post" action="/member/FindIDProc/">
        {!! csrf_field() !!}
        <input type="hidden" name="jointype" id="jointype" value="655001" />
        <input type="hidden" name="enc_data" id="enc_data" value="" />
    </form>
    <form name="find_form" id="find_form" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="jointype" id="jointype" value="655002" />
        <input type="hidden" name="phone_number" id="phone_number" value="" />
        <input type="hidden" name="enc_data" id="enc_data" value="" />
    </form>
    <script>
        var $p_form = $('#phone_form');
        var $m_form = $('#mail_form');
        var rTime = null;
        var objTimer = null;

        $(document).ready(function() {
            $('#btn_ipin').click(function (){
                popupOpen('', 'popupIPIN', '450', '550', null, null);
                $('#form_ipin').attr('target','popupIPIN');
                $('#form_ipin').attr('action','https://cert.vno.co.kr/ipin.cb');
                $('#form_ipin').submit();
            });

            function remainTime()
            {
                now = new Date();
                days = (rTime - now) / 1000 / 60 / 60 / 24;
                daysRound = Math.floor(days);
                hours = (rTime - now) / 1000 / 60 / 60 - (24 * daysRound);
                hoursRound = Math.floor(hours);
                minutes = (rTime - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound);
                minutesRound = Math.floor(minutes);
                seconds = (rTime - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
                secondsRound = Math.round(seconds);

                $("#remain_time").text(minutesRound + "분 " + secondsRound + "초");

                if((rTime -now) < 1){
                    $("#btn_send_sms").prop("disabled", false);
                    $("#var_phone").prop("readonly", false);
                    $("#var_name").prop("readonly", false);
                    $("#var_auth").prop("disabled", true);
                    $("#btn_sms_auth").prop("disabled", true);
                    $("#var_auth").val('');
                    $("#var_phone").focus();
                    $("#sms_stat").val('NEW');
                    $("#remain_time").text("00:00");
                    alert("인증시간이 초과했습니다.");
                    return;
                }

                objTimer = setTimeout(remainTime, 1000);
            }

            $("#btn_send_sms").click(function () {
                var _url = "/member/findidSms/";
                $('#sms_msg').html('');

                ajaxSubmit($p_form, _url, function(ret) {
                    $("#btn_send_sms").prop("disabled", true);
                    $("#var_phone").prop("readonly", true);
                    $("#var_name").prop("readonly", true);
                    $("#var_auth").prop("disabled", false);
                    $("#btn_sms_auth").prop("disabled", false);
                    $("#var_auth").focus();
                    $("#sms_stat").val('OK');
                    rTime = new Date(ret.ret_data.limit_date);
                    remainTime();
                    alert(ret.ret_msg);

                }, function(ret){
                    //alert(ret.ret_msg);
                    $('#sms_msg').html(ret.ret_msg);
                }, null, true, 'alert');
            });

            $("#btn_sms_auth").click(function () {
                $('#sms_msg').html('');

                if($("#sms_stat").val() == "NEW"){
                    alert('먼저 이름과 전화번호를 입력후 인증번호를 받아 주십시요.');
                    return;
                }

                var _url = "/member/findidSms/";

                ajaxSubmit($p_form, _url, function(ret) {
                    clearTimeout(objTimer);
                    $("#enc_data").val(ret.ret_data.enc_data);
                    $("#phone_number").val(ret.ret_data.phone_number);
                    $("#find_form").prop("action", "/member/FindIDProc/").submit();

                }, function(ret){
                    //alert(ret.ret_msg);
                    $('#sms_msg2').html(ret.ret_msg);
                }, null, true, 'alert');
            });


            $("#btn_send_mail").click(function () {
                var _url = "/member/findidMail/";
                $('#mail_msg').html('');

                ajaxSubmit($m_form, _url, function(ret){
                    alert(ret.ret_msg);
                }, function(ret){
                    //alert(ret.ret_msg);
                    $('#mail_msg').html(ret.ret_msg);
                }, null, false, 'alert');
            });

            $("#domain").change(function (){
                setMailDomain('domain', 'mail_domain');
                if($(this).val() == ""){
                    $("#mail_domain").focus();
                } else {
                    $("#mail_id").focus();
                }
            });
        });
    </script>
@stop