@extends('willbes.pc.layouts.master')

@section('content')
    <form name="join_form" id="join_form" method="post" novalidate="novalidate">
        {!! csrf_field() !!}
        <input type="hidden" name="jointype" id="jointype" value="{{$jointype}}" />
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
                    <tr><td colspan="2">
                            가입방법 : {{$jointype}}<br/><br/>
                            암호문 : {{$enc_data}}<br/><br/>
                            전화번호 : {{$phone}}<br/><br/>
                            이름 : {{$memName}}<br/><br/>
                            메일아이디 : {{$MailId}}<br/><br/>
                            메일도메인 : {{$MailDomain}}<br/><br/>
                        </td></tr>
                    <tr>
                        <td class="combine-Tit">이름</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="MemName" name="MemName" class="iptName" readonly value="{{$memName}}">
                                <ul class="chkBox-Sex">
                                    <li class="radio-Btn sexchk p_re">
                                        <label for="Sex" class="labelName" style="display: block;">남성</label>
                                        <input type="radio" id="SexM" name="Sex" class="chkSex" value="M" title="성별">
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
                                <input type="text" id="BirthDay" name="BirthDay" class="iptBirth" placeholder="생년월일 ex.19800101" maxlength="8" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">휴대폰번호</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="Phone" name="Phone" class="iptPhone" placeholder='"-"를 포함해서 입력' maxlength="13" @if ( $jointype == '655002' ) value="{{$phone}}" readonly @endif title="핸드폰번호" />
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
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
                        <td class="combine-Tit">비밀번호</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="password" id="MemPassword_chk" name="MemPassword_chk" class="iptPwd" placeholder="비밀번호 확인" maxlength="20" title="비밀번호 확인" />
                            </div>
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
                            <div class="inputBox">
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
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">우편번호</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="text" id="ZipCode" name="ZipCode" class="iptEmail01" placeholder="우편번호" maxlength="5" readonly>
                                <button type="submit" onclick="" class="mem-Btn combine-Btn mb10 bg-dark-blue bd-dark-blue">
                                    <span>우편번호 찾기</span>
                                </button>
                                <div class="addbox1 p_re">
                                    <input type="text" id="Addr1" name="Addr1" class="iptAdd1" placeholder="기본주소" maxlength="30" readonly>
                                </div>
                                <div class="addbox2 p_re">
                                    <input type="text" id="Addr2" name="Addr2" class="iptAdd2" placeholder="상세주소" maxlength="30">
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="agree-Chk mt40 toggle">
                    <div class="agree-All-Tit p_re">
                        전체동의
                        <div class="chkBox-Agree">
                            <input type="checkbox" id="" name="" class="" maxlength="30">
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> 만 14세 이상입니다. <span class="tx11">( 만 14세 미만은 회원가입이 제한됩니다.)</span>
                                    <div class="chkBox-Agree">
                                        <input type="checkbox" id="agree1" name="agree1" class="" maxlength="30" />
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의
                                    <div class="chkBox-Agree">
                                        <input type="checkbox" id="agree2" name="agree2" class="" maxlength="30" />
                                    </div>
                                </a>
                            </div>
                            <div class="agree-Txt">
                                Willbes 통합회원 이용약관 동의<br>
                                Willbes 통합회원 이용약관 동의<br>
                                Willbes 통합회원 이용약관 동의<br>
                                Willbes 통합회원 이용약관 동의<br>
                                Willbes 통합회원 이용약관 동의<br>
                                Willbes 통합회원 이용약관 동의<br>
                                Willbes 통합회원 이용약관 동의<br>
                                Willbes 통합회원 이용약관 동의<br>
                            </div>
                        </li>
                        <li>
                            <div class="agree-Tit">
                                <a href="#none">
                                    <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의
                                    <div class="chkBox-Agree">
                                        <input type="checkbox" id="agree3" name="agree3" class="" maxlength="30" />
                                    </div>
                                </a>
                            </div>
                            <div class="agree-Txt">
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                                개인정보 수입 및 이용 동의<br/>
                            </div>
                        </li>
                        <li>
                            <div class="agree-Tit">
                                <a href="#none">
                                    (선택) 개인정보 위탁 동의
                                    <div class="chkBox-Agree">
                                        <input type="checkbox" id="agree4" name="agree4" class="" maxlength="30">
                                    </div>
                                </a>
                            </div>
                            <div class="agree-Txt">
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
                                약관이 노출 됩니다.<br/>
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
    <script src="/public/vendor/jquery/validator/jquery.validate.js"></script>
    <script>
        var $join_form = $('#join_form');
        var confirm_id = false;

        $(document).ready(function() {
            $join_form.validate({
                onkeyup:false,
                rules:{
                    Sex:{
                        required:true
                    },
                    BirthDay:{
                        required:true,
                        minlength:8,
                        maxlength:8,
                        number:true,
                        birthday_chk:true
                    },
                    Phone:{
                        required:true,
                        minlength:10,
                        maxlength:11,
                        number:true,
                        phone_chk:true
                    },
                    MemId:{
                        required:true,
                        minlength:4,
                        maxlength:20,
                        id_char:true,
                        id_chk:true
                    },
                    MemPassword:{
                        required:true,
                        minlength:8,
                        maxlength:20,
                        pwd_mix:true
                    },
                    MemPassword_chk:{
                        required:true,
                        pwd_chk:true
                    }
                },
                messages: {
                    Sex:{
                        required:"성별을 선택해주십시요."
                    },
                    BirthDay:{
                        required:"생년월일을 입력해주십시요.",
                        minlength:"생년월일은 8자리 숫자만 가능합니다.1",
                        maxlength:"생년월일은 8자리 숫자만 가능합니다.2",
                        birthday_chk:"정상적인 날짜형식이 아닙니다."
                    },
                    Phone:{
                        required:"핸드폰번호를 입력해주십시요.",
                        minlength:"핸드폰번호는 10~11자리 숫자만 가능합니다.1",
                        maxlength:"핸드폰번호는 10~11자리 숫자만 가능합니다.2",
                        phone_chk:"정상적인 핸드폰번호가 아닙니다."
                    },
                    MemId: {
                        required:"아이디를 입력해주십시요.",
                        minlength:"아이디는 4~20자의 영어소문자, 숫자, -,_만 사용 가능합니다.1",
                        maxlength:"아이디는 4~20자의 영어소문자, 숫자, -,_만 사용 가능합니다.2",
                        id_char:"아이디는 4~20자의 영어소문자, 숫자, -,_만 사용 가능합니다.3",
                        id_chk:"사용 불가능한 아이디입니다."
                    },
                    MemPassword:{
                        required:"비밀번호를 입력해주십시요.",
                        minlength:"비밀번호는 8~20자리로 입력해주십시요.1",
                        maxlength:"비밀번호는 8~20자리로 입력해주십시요.2",
                        pwd_mix:"영문대소문자, 숫자, 특수문자중 2종류이상 조합해야 합니다."
                    },
                    MemPassword_chk:{
                        required:"비밀번호를 다시한번 입력해주십시요.",
                        pwd_chk:"비밀번호가 일치하지 않습니다."
                    },

                },
                success: function(label, el) {
                    if($(el).attr("name") == "id"){
                        $("div[name=move_login]").css("display","none");
                    }
                },
                invalidHandler: function(form, validator) {
                    var errors = validator.numberOfInvalids();
                    for(var i =0; i< validator.errorList.length;i++){
                        var attr = validator.errorList[i].element;

                    }
                    if (errors) {
                        validator.errorList[0].element.focus();
                    }
                },
                onfocusout:function(element, event){
                    var res = $(element).valid();
                    if(!res){

                    }else{
                        $(element).parent().removeClass("invalid-value");
                        $(element).parent().addClass("pass-value");
                    }
                },
                errorPlacement: function(error, $element) {
                    var name = $element.attr("name");
                    if(name == "Sex"){
                        var obj = $('input[name="MemName"]');
                    }else {
                        var obj = $('input[name="'+name+'"]');
                    }

                    var msg = obj.parent().parent().children('.err_msg');
                    msg.html(error);
                },
            });

            $.validator.addMethod("id_chk", function(value, element) {
                var ret  = check_id(value);
                return ret;
            });

            $.validator.addMethod("id_char", function(value, element) {
                var p = /^[0-9a-z\-\_]{4,20}$/;
                if(p.test(value)) {return true;}
                else {return false;}
            });


            $.validator.addMethod("birthday_chk", function(value, element) {
                var BirthDay = $("input[name='BirthDay']").val();
                var p = /^(19|20)\d{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[0-1])$/;
                if( p.test(BirthDay) ){ return true;}
                else {return false; }
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

            $('#btn_submit').click(function(){
                if($join_form.valid() == true){
                    $join_form.attr("action", "/member/joinProc");
                    $join_form.submit();
                }
            });

            function check_id(value)
            {
                var obj = $('input[name="MemId"]');
                var msg = obj.parent().parent().children('.error_msg');
                var _url = '{{app_url("/Member/checkID/", "www")}}';
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
        });
    </script>
@stop