@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        @if($agree != 'Y')
            <div class="mem-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">통합 서비스 안내</span>
            </div>
            <!-- 통합 서비스 안내 -->
            <form id="agree_form" name="agree_form" method="post" action="/member/combine/agree/">
                {!! csrf_field() !!}
                <div class="Member mem-Convert widthAuto690 mb100">
                    <div class="user-Txt tx-black">
                        윌비스공무원, 신광은경찰, 한림법학원이<br/>
                        더 좋은 서비스 제공을 위해 '윌비스' 라는 이름으로 새롭게 통합되었습니다.<br/>
                        기존 수강 강좌 및 혜택을 유지하기 위해 윌비스 통합회원으로 전환이 필요하며,<br/>
                        <div class="tx-red">전환을 신청하지 않을 시 서비스 이용이 불가능합니다.</div>
                    </div>
                    <div class="info-Txt tx-black">
                        통합회원 전환 시<br/>
                        <strong>하나의 ID로 윌비스의 전체 서비스를 이용</strong>하실 수 있습니다.
                    </div>
                    <div class="convert-chkBox mt30">
                        <img src="{{ img_url('login/willbes_convert_user.jpg') }}">
                        <div class="info-Txt tx-black bd-none">
                            남은 포인트 경우 윌비스공무원&신광은경찰은 교재포인트로, <bR>
                            한림법학원은 강좌포인트로 일괄 이관됩니다.
                        </div>
                        <div class="chkBox-Save mt30 mb30">
                            <input type="checkbox" id="agree" name="agree" value="Y" class="iptSave">
                            <label for="USER_ID_SAVE" class="labelSave tx-gray"><span class="tx-red">(필수)</span> 윌비스 통합회원 전환을 동의합니다.</label>
                        </div>
                    </div>
                    <div class="agree-Chk mt50 toggle">
                        <div class="agree-All-Tit tx-black p_re">
                            통합회원 약관동의
                        </div>
                        <ul>
                            <li class="top bg-light-gray">
                                <div class="AllchkBox agree-Tit tx-black">
                                    <strong>변경된 이용약관에 대한 내용은 모두 확인하고 전체 동의합니다.</strong>
                                    <div class="chkBox-Agree">
                                        <input type="checkbox" id="agree_all" name="agree_all" class="" maxlength="30">
                                    </div>
                                </div>
                            </li>
                            <li class="chk">
                                <div class="chkBox-Agree">
                                    <input type="checkbox" id="agree1" name="agree1" class="" maxlength="30">
                                </div>
                                <div class="agree-Tit">
                                    <a href="#none">
                                        <span class="tx-blue">(필수)</span> 만 14세 이상입니다. <span class="tx12">( 만 14세 미만은 회원가입이 제한됩니다.)</span>
                                    </a>
                                </div>
                            </li>
                            <li class="chk">
                                <div class="chkBox-Agree">
                                    <input type="checkbox" id="agree2" name="agree2" class="" maxlength="30">
                                </div>
                                <div class="agree-Tit">
                                    <a href="#none">
                                        <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의<span class="v_arrow">▼</span>
                                    </a>
                                </div>
                                <div class="agree-Txt">
                                    @include('willbes.pc.company.agreementContent')
                                </div>
                            </li>
                            <li class="chk">
                                <div class="chkBox-Agree">
                                    <input type="checkbox" id="agree3" name="agree3" class="" maxlength="30">
                                </div>
                                <div class="agree-Tit">
                                    <a href="#none">
                                        <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의<span class="v_arrow">▼</span>
                                    </a>
                                </div>
                                <div class="agree-Txt">
                                    @include('willbes.pc.company.protectContent')
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="convert-Btn mt40 pt30 tx-center btnAuto h66">
                        <button type="button" id="btn_submit" class="mem-Btn bg-blue bd-dark-blue">
                            <span>통합회원 신청하기</span>
                        </button>
                    </div>
                </div>
            </form>
            <script>
                $(document).ready(function() {
                    $('#btn_submit').click(function () {
                        if($('#agree').is(":checked") != true ||
                            $('#agree1').is(":checked") != true ||
                            $('#agree2').is(":checked") != true ||
                            $('#agree3').is(":checked") != true ){
                            alert('필수항목에 동의해야 회원가입이 가능합니다.');
                            return;
                        }

                        $('#agree_form').submit();
                    });
                });
            </script>
        @else
            <div class="mem-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">통합회원 전환</span>
            </div>
            <!-- 통합회원 전환 : 본인인증 -->
            <div class="Member mem-Convert widthAuto690">
                <ul class="tabs-Step mb40">
                    <li class="on">본인인증</li>
                    <li>통합회원정보/약관동의</li>
                    <li>전환완료</li>
                </ul>
                <div class="user-Txt tx-black">
                    기존 이용중인 윌비스 서비스를 확인하기 위해 본인 인증을 해 주세요.</br>
                    최초 인증된 ID는 '통합 ID'로 사용됩니다.
                </div>
                {{--
                <ul class="tabWrap tabs-Certi">
                    @if($jointype == '655002')
                        <li id="tab1"><a href="#convert1" class="on"><div>휴대폰 인증</div></a></li>
                    @elseif($jointype == '655003')
                        <li id="tab2"><a href="#convert2"><div>E-mail 인증</div></a></li>
                    @elseif($jointype == '655001')
                        <li id="tab3"><a href="#convert3"><div>아이핀 인증</div></a></li>
                    @endif
                </ul>
                --}}
                <div clsas="tabBox">
                    @if($jointype == '655002')
                        <form name="phone_form" id="phone_form" method="post" onsubmit=" return false;">
                            <input type="hidden" name="sms_stat" id="sms_stat" value="NEW" />
                            {!! csrf_field() !!}
                            <div id="convert1">
                                <div class="widthAuto460 mt30">
                                    <div class="inputBox p_re item">
                                        <input type="text" id="var_id" name="var_id" class="iptId bg-gray" value="{{sess_data('combine_id')}}" readonly required="required">
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
                    @elseif($jointype == '655003')
                        <form name="mail_form" id="mail_form" method="post" onsubmit=" return false;">
                            {!! csrf_field() !!}
                            <div id="convert2">
                                <div class="widthAuto460 mt30">
                                    <div class="inputBox p_re item">
                                        <input type="text" id="var_id" name="var_id" class="iptId bg-gray" value="{{sess_data('combine_id')}}" readonly>
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
                    @elseif($jointype == '655001')
                        <div id="convert3">
                            <form name="form_ipin" id="form_ipin" method="post">
                                <input type="hidden" name="m" value="pubmain">
                                <input type="hidden" name="enc_data" value="{{$encData}}">
                                <input type="hidden" name="param_r1" value="combine">
                                <input type="hidden" name="param_r3" value="">
                                <input type="text" style="display:none;" />
                                <div class="widthAuto460">
                                    <div class="inputBox mt30 p_re">
                                        <input type="text" id="ipin_id" name="param_r2" class="iptId bg-gray" value="{{sess_data('combine_id')}}" readonly>
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
                    @endif
                </div>
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
                                $("#find_form").prop("action", "/member/combine/form/").submit();

                            }, function(ret){
                                //alert(ret.ret_msg);
                                $('#sms_msg2').html(ret.ret_msg);
                            }, null, true, 'alert');
                        });


                        $("#btn_send_mail").click(function () {
                            var _url = "/member/combine/mail/";
                            $('#mail_msg').html('');

                            ajaxSubmit($m_form, _url, function(ret){
                                alert(ret.ret_msg);
                            }, function(ret){
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
                @endif

                <br/><br/><br/><br/><br/><br/>
            </div>
@stop