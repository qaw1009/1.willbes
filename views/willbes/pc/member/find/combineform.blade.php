@extends('willbes.pc.layouts.master')

@section('content')
    <form name="combine_form" id="combine_form" method="post" novalidate="novalidate">
        {!! csrf_field() !!}
        <input type="hidden" name="jointype" id="jointype" value="{{$jointype}}" />
        <input type="hidden" name="enc_data" id="enc_data" value="{{$enc_data}}" />
        <div id="Container" class="memContainer widthAuto c_both">
            <div class="mem-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">통합회원 전환</span>
            </div>
            <div class="Member mem-Convert widthAuto690">
                <ul class="tabs-Step mb60">
                    <li>본인인증</li>
                    <li class="on">통합회원정보/약관동의</li>
                    <li>전환완료</li>
                </ul>
                <div class="user-Txt tx-black">
                    <span class="tx-blue">{{$Member['MemName']}}</span> 회원님의 아이디 {{$Member['MemId']}}, 확인이 완료되었습니다.<br/><br/>
                    통합ID 사용 여부와 회원정보를 확인 후 변경된 약관에 동의해 주세요.<br/>
                    (단, 다른 회원이 동일 ID를 먼저 사용할 경우, 신규 ID 생성이 필요합니다.)
                </div>
                <div class="agree-user-Chk">
                    <ul>
                        <li class="agree-Confirm tx-black ok">
                            {{$Member['MemId']}}
                        </li>
                        @if($IsDup == 'Y')
                            <li class="agree-Confirm tx-red bd-none">
                                이미 사용중인 통합 아이디입니다. 신규 통합 아이디를 생성해 주세요.
                            </li>

                        @else
                            <li class="agree-Confirm tx-blue bd-none">
                                통합 ID로 사용 가능한 계정 입니다.
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="agree-user-Chk mt40">
                    <div class="agree-All-Tit tx-black p_re">
                        통합회원정보
                    </div>
                    <ul>
                        @if($IsDup == 'Y')
                            <table cellspacing="0" cellpadding="0" class="combineTable mb60">
                                <colgroup>
                                    <col style="width: 100px;"/>
                                    <col style="width: 590px;"/>
                                </colgroup>
                                <tr>
                                    <td class="combine-Tit">아이디</td>
                                    <td>
                                        <div class="inputBox p_re">
                                            <input type="text" id="ChangeId" name="ChangeId" class="iptId" placeholder="4~20자리 영문 소문자, 숫자만 입력 가능" maxlength="20" title="아이디" />
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
                                            <input type="password" id="ChangePassword" name="ChangePassword" class="iptPwd" placeholder="8~20자리이하 영문대소문자, 숫자, 특수문자중2종류조합" maxlength="20" title="비밀번호" />
                                        </div>
                                        <div class="tx-red mt10 err_msg" style="display: block;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="combine-Tit">비밀번호</td>
                                    <td>
                                        <div class="inputBox p_re">
                                            <input type="password" id="ChangePassword_chk" name="ChangePassword_chk" class="iptPwd" placeholder="비밀번호 확인" maxlength="20" title="비밀번호 확인" />
                                        </div>
                                        <div class="tx-red mt10 err_msg" style="display: block;"></div>
                                    </td>
                                </tr>
                            </table>
                        @endif
                        <li class="agree-Confirm bg-light-gray">
                            {{$Member['MemName']}}
                        </li>
                        <li class="agree-Confirm bg-light-gray">
                            {{$Member['BirthDay']}}
                        </li>
                        <li class="agree-Confirm bg-light-gray">
                            {{$Member['Phone']}}
                        </li>
                    </ul>
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
                                    <span class="tx-blue">(필수)</span> Willbes 통합회원 이용약관 동의<span class="arrow">▼</span>
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
                                    <span class="tx-blue">(필수)</span> 개인정보 수입 및 이용 동의<span class="arrow">▼</span>
                                </a>
                            </div>
                            <div class="agree-Txt">
                                @include('willbes.pc.company.protectContent')
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="convert-Btn mt40 pt30 tx-center btnAuto h66">
                    <button type="button" id="btn_submit" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                        <span>통합회원 전환하기</span>
                    </button>
                </div>
            </div>
            <br/><br/><br/><br/><br/><br/>
        </div>
    </form>
    <script>
        var $combine_form = $('#combine_form');
        var confirm_id = false;

        $(document).ready(function() {
            $combine_form.validate({
                onkeyup : false,
                rules : {
                    ChangeId : {
                        required : true,
                        minlength : 4,
                        maxlength : 20,
                        id_char : true,
                        id_chk : true
                    },
                    ChangePassword :{
                        required : true,
                        minlength : 8,
                        maxlength : 20,
                        pwd_mix : true
                    },
                    ChangePassword_chk : {
                        required : true,
                        pwd_chk : true
                    }
                },
                messages : {
                    ChangeId : {
                        required : "아이디를 입력해주십시요.",
                        minlength : "아이디는 4~20자의 영어소문자, 숫자, -,_만 사용 가능합니다.",
                        maxlength : "아이디는 4~20자의 영어소문자, 숫자, -,_만 사용 가능합니다.",
                        id_char : "아이디는 4~20자의 영어소문자, 숫자, -,_만 사용 가능합니다.",
                        id_chk : "사용 불가능한 아이디입니다."
                    },
                    ChangePassword : {
                        required : "비밀번호를 입력해주십시요.",
                        minlength : "비밀번호는 8~20자리로 입력해주십시요.",
                        maxlength : "비밀번호는 8~20자리로 입력해주십시요.",
                        pwd_mix : "영문대소문자, 숫자, 특수문자중 2종류이상 조합해야 합니다."
                    },
                    ChangePassword_chk : {
                        required : "비밀번호를 다시한번 입력해주십시요.",
                        pwd_chk : "비밀번호가 일치하지 않습니다."
                    }

                },
                invalidHandler : function(form, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        validator.errorList[0].element.focus();
                    }
                },
                onfocusout : function(element, event){
                    var res = $(element).valid();
                },
                errorPlacement : function(error, $element) {
                    var id = $element.attr("id");
                    var obj = $("input[id=" + id + "]");
                    var msg = obj.parent().parent().children('.err_msg');
                    msg.html(error);
                }
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

            $.validator.addMethod("pwd_chk", function(value, element) {
                var pwd = $("input[name='ChangePassword']").val();
                var pwdchk = $("input[name='ChangePassword_chk']").val();

                if (pwd == pwdchk) { return true; }
                else { return false;}
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
                if($('#agree1').is(":checked") != true ||
                    $('#agree2').is(":checked") != true ||
                    $('#agree3').is(":checked") != true ){
                    alert('필수항목에 동의해야 회원가입이 가능합니다.');
                    return;
                }

                @if($IsDup == 'Y')
                if($combine_form.valid() == true)
                    @endif
                {
                    $combine_form.attr("action", "/member/combine/proc/");
                    $combine_form.submit();
                }
            });

            function check_id(value)
            {
                var obj = $('input[name="ChangeId"]');
                var msg = obj.parent().parent().children('.error_msg');
                var _url = '{{front_app_url("/member/combine/checkID/", "www")}}';
                var data = $('#combine_form').formSerialize();

                $.ajax({
                    type : "POST",
                    url : _url,
                    cache : false,
                    dataType : 'text',
                    data : data,
                    async :false,
                    success : function (res) {
                        if(res == '0000'){
                            confirm_id = true;
                        } else {
                            confirm_id = false;
                        }
                    }
                });

                return confirm_id;
            }

        });
    </script>
    <script src="/public/vendor/jquery/validator/jquery.validate.js"></script>
@stop