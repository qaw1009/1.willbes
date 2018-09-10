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
                <li><a href="{{app_url('/member/find/id/', 'www')}}">아이디 찾기</a></li>
                <li><a href="{{app_url('/member/find/pwd/', 'www')}}">비밀번호 찾기</a></li>
                <li><a class='on' href="{{app_url('/Member/Sleep', 'www')}}">휴면회원 해제</a></li>
            </ul>
            <ul class="tabWrap tabLoginDepth2 tabs-Certi">
                <li id="tab1"><a href="#lock_certi1"><div>휴대폰 인증</div></a></li>
                <li id="tab2"><a href="#lock_certi2"><div>E-mail 인증</div></a></li>
                <li id="tab3"><a href="#lock_certi3"><div>아이핀 인증</div></a></li>
            </ul>
            <div clsas="tabBox">
                <form name="phone_form" id="phone_form" method="post" onsubmit=" return false;">
                    <input type="hidden" name="sms_stat" id="sms_stat" value="NEW" />
                    {!! csrf_field() !!}
                    <div id="lock_certi1">
                        <div class="widthAuto460 mt30">
                            <div class="inputBox p_re item">
                                <input type="text" id="var_id" name="var_id" class="iptId" placeholder="아이디" maxlength="30" required="required" title="이름" >
                            </div>
                            <div class="tx-red mb30" style="display: block;" for="var_name"></div>
                            <div class="inputBox p_re">
                                <input type="text" id="var_phone" name="var_phone" class="iptPhone certi" placeholder="휴대폰번호(-제외)" maxlength="11" required="required" pattern="numeric" data-validate-length="10,11" title="휴대전화번호" />
                                <button type="button" id="btn_send_sms" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                                    <span>인증번호발송</span>
                                </button>
                            </div>
                            <div class="tx-red mb30" style="display: block;" id="sms_msg"></div>
                            <div class="inputBox p_re">
                                <input type="text" id="var_auth" name="var_auth" class="iptNumber certi" placeholder="인증번호입력" maxlength="6" disabled  required="required" pattern="numeric" data-validate-length="6" title="인증번호" />
                                <button type="button" class="mem-Btn certi bg-dark-blue bd-dark-blue" disabled>
                                    <span id="remain_time">00:00</span>
                                </button>
                            </div>
                            <div class="tx-red mb30" style="display: block;" id="sms_msg2"></div>
                        </div>
                        <div class="search-Btn btnAuto120 h36">
                            <button type="button" id="btn_sms_auth" class="mem-Btn bg-blue bd-dark-blue" disabled>
                                <span>확인</span>
                            </button>
                        </div>
                    </div>
                </form>
                <form name="mail_form" id="mail_form" method="post" onsubmit=" return false;">
                    {!! csrf_field() !!}
                    <div id="lock_certi2">
                        <div class="widthAuto460 mt30">
                            <div class="inputBox p_re item">
                                <input type="text" id="var_id" name="var_id" class="iptId" placeholder="아이디" maxlength="30" required="required" title="이름">
                            </div>
                            <div class="inputBox p_re">
                                <input type="text" id="mail_id" name="mail_id" class="iptEmail01" placeholder="아이디" maxlength="30" required="required" title="이메일아이디"> @
                                <input type="text" id="mail_domain" name="mail_domain" class="iptEmail02" maxlength="30" required="required" placeholder="메일주소" title="이메일주소">
                                <select id="domain" name="domain" title="직접입력" class="seleEmail">
                                    @foreach($mail_domain_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="tx-red" style="display: block;" id="mail_msg">가입 시 입력한 메일주소를 입력해 주세요.</div>
                        </div>
                        <div class="search-Btn btnAuto120 mt70 h36">
                            <button type="button" id="btn_send_mail" class="mem-Btn bg-blue bd-dark-blue">
                                <span>확인</span>
                            </button>
                        </div>
                        <div class="notice-Txt tx-gray mt40">* 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.</div>
                    </div>
                </form>
                <div id="lock_certi3">
                    <form name="form_ipin" id="form_ipin" method="post">
                        <input type="hidden" name="m" value="pubmain">
                        <input type="hidden" name="enc_data" value="{{$encData}}">
                        <input type="hidden" name="param_r1" value="sleep">
                        <input type="hidden" name="param_r3" value="">
                        <input type="text" style="display:none;" />
                        <div class="widthAuto460">
                            <div class="inputBox mt30 p_re">
                                <input type="text" id="ipin_id" name="param_r2" class="iptId" placeholder="아이디" maxlength="30">
                            </div>
                            <div class="tx-red" style="display: block;" id="msg_ipin"></div>
                            <br>
                        </div>
                        <div class="search-Btn btnAuto120 h36">
                            <button type="button" id="btn_ipin" xonclick="ipin();" class="mem-Btn bg-blue bd-dark-blue">
                                <span>아이핀 인증</span>
                            </button>
                        </div>
                        <div class="notice-Txt tx-gray mt40">
                            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End 비밀번호 찾기 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
    <form name="vnoform" id="vnoform" method="post" action="/Member/ActivateSleep/">
        {!! csrf_field() !!}
        <input type="hidden" name="jointype" value="655001" />
        <input type="hidden" name="enc_data" value="" />
        <input type="hidden" name="var_id" value="" />
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
                if($('#ipin_id').val() == "" ){
                    $('#msg_ipin').html('아이디를 입력해주십시요.');
                    return;
                } else {
                    $('#msg_ipin').html('');
                }
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
                var _url = "/Member/SleepSms/";
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

                var _url = "/Member/SleepSms/";

                ajaxSubmit($p_form, _url, function(ret) {
                    clearTimeout(objTimer);
                    $("#enc_data").val(ret.ret_data.enc_data);
                    $("#phone_number").val(ret.ret_data.phone_number);
                    $("#find_form").prop("action", "/Member/ActivateSleep/").submit();

                }, function(ret){
                    //alert(ret.ret_msg);
                    $('#sms_msg2').html(ret.ret_msg);
                }, null, true, 'alert');
            });


            $("#btn_send_mail").click(function () {
                var _url = "/Member/SleepMail/";
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