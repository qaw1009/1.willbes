@extends('willbes.pc.layouts.master')

@section('content')
    <form name="join_form" id="join_form" method="post" novalidate="novalidate">
        {!! csrf_field() !!}
        <input type="hidden" name="CertifiedInfoTypeCcd" id="CertifiedInfoTypeCcd" value="{{$jointype}}" />
        <input type="hidden" name="enc_data" id="enc_data" value="{{$enc_data}}" />
        <!-- Container -->
        <div id="Container" class="memContainer widthAuto c_both">
            <div class="mem-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">통합회원가입</span>
            </div>
            <!-- 통합회원가입 : 약관동의/정보입력 -->
            <div class="Member mem-Combine widthAuto690">
                <ul class="tabs-Step mb60">
                    <li>본인인증</li>
                    <li class="on">약관동의/정보입력</li>
                    <li>회원가입완료</li>
                </ul>

                <table cellspacing="0" cellpadding="0" class="combineTable mb60">
                    <colgroup>
                        <col style="width: 100px;"/>
                        <col style="width: 590px;"/>
                    </colgroup>
                    <thead>
                    <tr>
                        <th class="tx-blue tx-left" colspan="2">* 필수정보</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="combine-Tit">이름</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="txtMemName" name="txtMemName" class="iptName" disabled value="{{$memName}}">
                                <input type="hidden" id="MemName" name="MemName" value="{{$memName}}">
                                <ul class="chkBox-Sex">
                                    <li class="radio-Btn sexchk p_re checked">
                                        <label for="Sex" class="labelName" style="display: block;">남성</label>
                                        <input type="radio" id="SexM" name="Sex" class="chkSex" value="M" title="성별" checked="checked">
                                    </li>
                                    <li class="radio-Btn sexchk p_re">
                                        <label for="Sex" class="labelName" style="display: block;">여성</label>
                                        <input type="radio" id="SexF" name="Sex" class="chkSex" value="F" title="성별">
                                    </li>
                                </ul>
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">생년월일</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="BirthDay" name="BirthDay" class="iptBirth" placeholder="ex.19800101" maxlength="8" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">휴대폰번호</td>
                        <td>
                            <div class="inputBox p_re">
                                @if ( $jointype == '655002' )
                                    <input type="text" id="txtPhone" name="txtPhone" class="iptPhone" placeholder='"-" 제외하고 숫자만 입력' maxlength="13" value="{{$phone}}" disabled title="핸드폰번호" />
                                    <input type="hidden" id="Phone" name="Phone" value="{{$phone}}" />
                                @else
                                    <input type="text" id="Phone" name="Phone" class="iptPhone" placeholder='"-" 제외하고 숫자만 입력' maxlength="13" title="핸드폰번호" />
                                @endif
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">수신동의</td>
                        <td>
                            <div class="mt10" style="display: block;">
                                <input name="SmsRcvStatus" type="checkbox" value="Y" id="SmsRcvStatus" />
                                <label for="SmsRcvStatus">
                                    윌비스의 신규상품 안내 및 광고성 정보 SMS 수신에 동의합니다.
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">아이디</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="MemId" name="MemId" class="iptId" placeholder="4~20자리 영문 소문자, 숫자만 입력 가능" maxlength="20" title="아이디" />
                                <!-- <button type="submit" onclick="" class="mem-Btn combine-Btn ml5 bg-dark-blue bd-dark-blue">
                                    <span>중복확인</span>
                                </button> -->
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">비밀번호</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="password" id="MemPassword" name="MemPassword" class="iptPwd" placeholder="8~20자리이하 영문대소문자, 숫자, 특수문자중2종류조합" maxlength="20" title="비밀번호" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">비밀번호확인</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="password" id="MemPassword_chk" name="MemPassword_chk" class="iptPwd" placeholder="비밀번호 확인" maxlength="20" title="비밀번호 확인" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">준비과정</td>
                        <td>
                            <div class="p_re">
                                @foreach($interestCode as $key => $value)
                                    <label><input name="InterestCode" type="radio" value="{{ $key }}" class="ml10" /> {{$value}}</label>
                                @endforeach
                                <input type="hidden" name="int_temp" />
                            </div>
                        <!-- <input name="INterestCode" type="checkbox" value="" id="a03" class="ml10"/> <label for="a03">경찰</label> -->
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table cellspacing="0" cellpadding="0" class="combineTable">
                    <colgroup>
                        <col style="width: 100px;"/>
                        <col style="width: 590px;"/>
                    </colgroup>
                    <thead>
                    <tr>
                        <th class="tx-blue tx-left" colspan="2">* 선택정보</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="combine-Tit">이메일</td>
                        <td>
                            <div class="inputBox p_re">
                                <dl>
                                    <dt class="mbox1 p_re">
                                        <input type="text" id="MailId" name="MailId" class="iptEmail01" placeholder="이메일" maxlength="30" @if ( $jointype == '655003' ) value="{{$MailId}}" readonly @endif>
                                    </dt>
                                    <dt class="mbox-dot">@</dt>
                                    <dt class="mbox2">
                                        <input type="text" id="MailDomain" name="MailDomain" class="iptEmail02" maxlength="30" @if ( $jointype == '655003' ) value="{{$MailDomain}}" readonly @endif>
                                    </dt>
                                    <dt class="mbox-sele">
                                        <select id="domain" name="domain" title="직접입력" class="seleEmail" @if ( $jointype == '655003' ) disabled @endif>
                                            @foreach($mail_domain_ccd as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </dt>
                                </dl>
                                <input type="hidden" name="mail_tmp" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">수신동의</td>
                        <td>
                            <div class="mbox-txt mt10" style="display: block;">
                                <input name="MailRcvStatus" type="checkbox" value="Y" id="MailRcvStatus" />
                                <label for="MailRcvStatus">
                                    윌비스의 신규상품 안내 및 광고성 정보 이메일 수신에 동의합니다.
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">우편번호</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="ZipCode" name="ZipCode" class="iptEmail01" xstyle="width: 100%" placeholder="우편번호" maxlength="5" readonly>
                                <button type="button" id="btn_zipcode" class="mem-Btn combine-Btn mb10 bg-dark-blue bd-dark-blue">
                                    <span>우편번호 찾기</span>
                                </button>
                                <div class="addbox1 p_re">
                                    <input type="text" id="Addr1" name="Addr1" class="iptAdd1" placeholder="기본주소" maxlength="50" readonly>
                                </div>
                                <div class="addbox2 p_re">
                                    <input type="text" id="Addr2" name="Addr2" class="iptAdd2" placeholder="상세주소" maxlength="50">
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="agree-Chk mt40 toggle">
                    <div class="AllchkBox agree-All-Tit p_re">
                        전체동의
                        <div class="chkBox-Agree">
                            <input type="checkbox" id="agree_all" name="agree_all" class="" >
                        </div>
                    </div>
                    <ul>
                        <li class="chk">
                            <div class="chkBox-Agree">
                                <input type="checkbox" id="agree1" name="agree1" class="" >
                            </div>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> 만 14세 이상입니다. <span class="tx12">( 만 14세 미만은 회원가입이 제한됩니다.)</span>
                                </a>
                            </div>
                        </li>
                        <li class="chk">
                            <div class="chkBox-Agree">
                                <input type="checkbox" id="agree2" name="agree2" class="" >
                            </div>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의<span class="arrow">▼</span>
                                </a>
                            </div>
                            <div class="agree-Txt">
                                @include('willbes.pc.company.agreementContent')
                            </div>
                        </li>
                        <li class="chk">
                            <div class="chkBox-Agree">
                                <input type="checkbox" id="agree3" name="agree3" class="" >
                            </div>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> 개인정보 취급방침 및 이용 동의<span class="arrow">▼</span>
                                </a>
                            </div>
                            <div class="agree-Txt">
                                @include('willbes.pc.company.protectContent')
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="combine-Btn mt40 pt30 bdt-light-gray btnAuto h66">
                    <button type="button" id="btn_submit" class="mem-Btn bg-blue bd-dark-blue">
                        <span>동의하고 회원가입</span>
                    </button>
                </div>
            </div>
            <!-- End 통합회원가입 : 약관동의/정보입력 -->
            <br/><br/><br/><br/><br/><br/>
        </div>
        <!-- End Container -->
    </form>
    <script>
        var $join_form = $('#join_form');
        var confirm_id = false;

        $(document).ready(function() {
            $("#MemId").val('');
            $("#MemPassword").val('');
            $("#MemPassword_chk").val('');

            $join_form.validate({
                onkeyup : false,
                rules : {
                    Sex : {
                        required : true
                    },
                    BirthDay : {
                        required : true,
                        minlength : 8,
                        maxlength : 8,
                        number : true,
                        birthday_chk : true,
                        under_age : true
                    },
                    Phone : {
                        required : true,
                        minlength : 10,
                        maxlength : 11,
                        number : true,
                        phone_chk : true
                    },
                    MemId : {
                        required : true,
                        minlength : 4,
                        maxlength : 20,
                        id_char : true,
                        id_chk : true
                    },
                    MemPassword : {
                        required : true,
                        minlength : 8,
                        maxlength : 20,
                        pwd_mix : true
                    },
                    MemPassword_chk : {
                        required : true,
                        pwd_chk : true
                    },
                    InterestCode : {
                        required : true
                    },
                    MailId : {
                        mail_chk : true
                    },
                    MailDomain : {
                        mail_chk : true
                    }
                },
                messages : {
                    Sex : {
                        required : "성별을 선택해주십시요."
                    },
                    BirthDay : {
                        required : "생년월일을 입력해주십시요.",
                        minlength : "생년월일은 8자리 숫자만 가능합니다.",
                        maxlength : "생년월일은 8자리 숫자만 가능합니다.",
                        birthday_chk : "정상적인 날짜형식이 아닙니다.",
                        under_age : "14세 미만은 가입이 불가능합니다."
                    },
                    Phone : {
                        required : "핸드폰번호를 입력해주십시요.",
                        minlength : "핸드폰번호는 10~11자리 숫자만 가능합니다.",
                        maxlength : "핸드폰번호는 10~11자리 숫자만 가능합니다.",
                        phone_chk : "정상적인 핸드폰번호가 아닙니다."
                    },
                    MemId : {
                        required : "아이디를 입력해주십시요.",
                        minlength : "아이디는 4~20자의 영어소문자, 숫자 만 사용 가능합니다.",
                        maxlength : "아이디는 4~20자의 영어소문자, 숫자 만 사용 가능합니다.",
                        id_char : "아이디는 4~20자의 영어소문자, 숫자 만 사용 가능합니다.",
                        id_chk : "이미 가입된 아이디입니다. (아이디는 4~20자의 영어소문자, 숫자 만 사용 가능합니다.)"
                    },
                    MemPassword : {
                        required : "비밀번호를 입력해주십시요.",
                        minlength : "비밀번호는 8~20자리로 입력해주십시요.",
                        maxlength : "비밀번호는 8~20자리로 입력해주십시요.",
                        pwd_mix : "영문대소문자, 숫자, 특수문자중 2종류이상 조합해야 합니다."
                    },
                    MemPassword_chk : {
                        required : "비밀번호를 다시한번 입력해주십시요.",
                        pwd_chk : "비밀번호가 일치하지 않습니다."
                    },
                    InterestCode : {
                        required : "준비과정을 선택해주십시요."
                    },
                    MailDomain : {
                        mail_chk : "메일형식이 올바르지 않습니다."
                    },
                    MailId : {
                        mail_chk : "메일형식이 올바르지 않습니다."
                    }
                },
                invalidHandler: function(form, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        validator.errorList[0].element.focus();
                    }
                },
                onfocusout:function(element, event){
                    var res = $(element).valid();
                },
                errorPlacement: function(error, $element) {
                    var name = $element.attr("name");
                    if(name == 'Sex'){
                        var obj = $('input[name=MemName]');
                    } else if(name == 'InterestCode') {
                        var obj = $("input[name=int_temp]");
                    } else if(name == 'MailId' || name == 'MailDomain') {
                        var obj = $("input[name=mail_tmp]");
                    } else {
                        var obj = $("input[name=" + name + "]");
                    }

                    var msg = obj.parent().parent().children('.err_msg');
                    msg.html(error);
                }
            });

            $.validator.addMethod("id_chk", function(value, element) {
                var ret  = check_id(value);
                return ret;
            });

            $.validator.addMethod("id_char", function(value, element) {
                var p = /^[0-9a-z]{4,20}$/;
                if(p.test(value)) {return true;}
                else {return false;}
            });


            $.validator.addMethod("birthday_chk", function(value, element) {
                var BirthDay = $("input[name='BirthDay']").val();
                var p = /^(19|20)\d{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[0-1])$/;
                if( p.test(BirthDay) ){ return true;}
                else {return false; }
            });

            $.validator.addMethod("under_age", function(value, element) {
                var BirthDay = $("input[name='BirthDay']").val();
                var age = calcAge(BirthDay);
                if(age < 14){
                    return false;
                } else {
                    return true;
                }
            });

            $.validator.addMethod("pwd_chk", function(value, element) {
                var pwd = $("input[name='MemPassword']").val();
                var pwdchk = $("input[name='MemPassword_chk']").val();

                if (pwd == pwdchk) { return true; }
                else { return false;}
            });

            $.validator.addMethod("phone_chk", function(value, element) {
                var Phone = $("input[name='Phone']").val();
                var p = /^((01[1|6|7|8|9])[1-9]+[0-9]{6,7})|(010[1-9][0-9]{7})$/;
                if( p.test(Phone) ){ return true;}
                else {return false; }
            });

            $.validator.addMethod("pwd_mix",function(value, element){
                var n = value.search(/[0-9]/g);
                var e = value.search(/[a-zA-Z]/ig);
                var s = value.search(/[`~!@#$%^&*|\\\'\";:\/?\<\>\,\.\[\]\{\}\+\-\=\_\(\)]/gi);
                var rtn = true;
                if( (n < 0 && e < 0) || (e < 0 && s < 0) || (s < 0 && n < 0) ){
                    rtn = false;
                }
                return this.optional(element) || rtn;
            });

            $.validator.addMethod("mail_chk",function(value, element){
                var mail_id = $("input[name='MailId']").val();
                var mail_domain = $("input[name='MailDomain']").val();

                if(mail_id == '' && mail_domain == ''){
                    return true;
                }

                var email = mail_id + '@' + mail_domain;
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            });

            $('#btn_submit').click(function(){
                if($join_form.valid() == true){
                    if($('#agree1').is(":checked") != true ||
                        $('#agree2').is(":checked") != true ||
                        $('#agree3').is(":checked") != true ){
                        alert('필수항목에 동의해야 회원가입이 가능합니다.');
                        return;
                    }

                    $join_form.attr("action", "/member/join/proc");
                    $join_form.submit();
                }
            });

            function check_id(value)
            {
                var obj = $('input[name="MemId"]');
                var msg = obj.parent().parent().children('.error_msg');
                var _url = '{{front_app_url("/member/join/checkID/", "www")}}';
                var data = $('#join_form').formSerialize();

                $.ajax({
                    type: "POST",
                    url: _url,
                    cache : false,
                    dataType: 'text',
                    data: data,
                    async:false,
                    success: function (res) {
                        if(res == '0000'){
                            confirm_id = true;
                        } else {
                            confirm_id = false;
                        }
                    }
                });

                return confirm_id;
            }

            $("#domain").change(function (){
                setMailDomain('domain', 'MailDomain');
                if($(this).val() == ""){
                    $("#MailDomain").focus();
                } else {
                    $("#MailId").focus();
                }
            });

            $('input[name=Sex]').click(function(){
                $('.sexchk').removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $("#btn_zipcode,#ZipCode").click(function (){
                var width = 500;
                var height = 600;

                new daum.Postcode({
                    oncomplete: function(data) {
                        var extraAddr = '';

                        // if(data.bname !== ''){ extraAddr += data.bname; }
                        if(data.buildingName !== ''){ extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName); }

                        $("#ZipCode").val(data.zonecode);
                        $("#Addr1").val(data.roadAddress);
                        $("#Addr2").val(extraAddr);

                        $("#Addr2").focus();
                    }
                }).open({
                    left: (window.screen.width / 2) - (width / 2),
                    top: (window.screen.height / 2) - (height / 2)
                });
            });
        });
    </script>
    <script src="/public/vendor/jquery/validator/jquery.validate.js"></script>
    <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('6331763949938786102').pageView();
    </script>
@stop