@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">통합 서비스 안내</span>
        </div>
        <!-- 통합 서비스 안내 : 본인인증 -->
        <div class="Member mem-Combine widthAuto690 mb100">
            <div class="user-Txt tx-black">
                윌비스 한림법학원 회원 통합으로 인하여 <span class="tx-red">회원 개인정보 보안을 위해</span><br/>
                번거러우시더라도 <span class="tx-red">본인인증을 진행</span>해 주시기 바랍니다.
            </div>
            <ul class="tabWrap tabLoginDepth1 tabs full c_both mt40">
                <li><a href="#join1" class="on">휴대폰 인증</a></li>
            </ul>
            <form name="phone_form" id="phone_form" method="post" onsubmit=" return false;">
                <input type="hidden" name="isall" id="isall" value="Y" />
                <input type="hidden" name="sms_stat" id="sms_stat" value="NEW" />
                {!! csrf_field() !!}
                <div class="tabBox">
                    <div id="join1">
                        <div class="widthAuto460 mt30">
                            <div class="inputBox p_re item">
                                <input type="text" id="var_id" name="var_id" class="iptId bg-gray" value="{{$id}}" readonly required="required">
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
                </div>
            </form>
        </div>
        <!-- End 통합 서비스 안내 : 본인인증 -->

    </div>
    <!-- End Container -->

    <form name="vnoform" id="vnoform" method="post" action="/member/combine/form/">
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
                var _url = "/member/combine/sms/";
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

                var _url = "/member/combine/sms/";

                ajaxSubmit($p_form, _url, function(ret) {
                    clearTimeout(objTimer);
                    $("#enc_data").val(ret.ret_data.enc_data);
                    $("#phone_number").val(ret.ret_data.phone_number);
                    $("#find_form").prop("action", "/member/combine/dupform/").submit();

                }, function(ret){
                    //alert(ret.ret_msg);
                    $('#sms_msg2').html(ret.ret_msg);
                }, null, true, 'alert');
            });
        });
    </script>
@stop