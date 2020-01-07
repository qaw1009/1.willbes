@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <form name="combine_form" id="combine_form" method="post" novalidate="novalidate">
            {!! csrf_field() !!}
            <input type="hidden" name="enc_data" id="enc_data" value="{{$enc_data}}" />
            <input type="hidden" name="chgid" value="N" />
            <div class="mem-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">통합 서비스 안내</span>
            </div>
            <!-- 통합 서비스 안내 : 비밀번호 변경 -->
            <div class="Member mem-Combine widthAuto690 mb100">
                <div class="user-Txt tx-black">
                    윌비스 한림법학원 회원 통합으로 인하여 <span class="tx-red">회원 개인정보 보안을 위해</span><br/>
                    번거러우시더라도 <span class="tx-red">비밀번호를 변경</span>해 주시기 바랍니다.
                </div>
                <table cellspacing="0" cellpadding="0" class="combineTable mb60 mt40">
                    <colgroup>
                        <col style="width: 20%;"/>
                        <col style="width: auto;"/>
                    </colgroup>
                    <thead>
                    <tr>
                        <th class="tx-blue tx-left" colspan="2">* 비밀번호 변경</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="combine-Tit">이름</td>
                        <td>
                            {{$Member['MemName']}}
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">생년월일</td>
                        <td>
                            {{$Member['BirthDay']}}
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">휴대폰번호</td>
                        <td>
                            {{$Member['Phone']}}
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">아이디</td>
                        <td>
                            {{$Member['MemId']}}
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">비밀번호</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="password" id="ChangePassword" name="ChangePassword" class="iptPwd" placeholder="8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합" maxlength="30">
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="combine-Tit">비밀번호 확인</td>
                        <td>
                            <div class="inputBox p_re">
                                <input type="password" id="ChangePassword_chk" name="ChangePassword_chk" class="iptPwd" placeholder="8~20자리이하영문대소문자, 숫자, 특수문자중2종류조합" maxlength="30">
                            </div>
                            <div class="tx-red mt10 err_msg" style="display: block;"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="convert-Btn mt40 pt30 tx-center btnAuto h66">
                    <button type="button" id="btn_submit" class="mem-Btn btnAuto180 bg-blue bd-dark-blue">
                        <span>비밀번호 변경하기</span>
                    </button>
                </div>

            </div>
            <!-- End 통합회원가입 : 비밀번호 변경 -->
        </form>
        <script>
            var $combine_form = $('#combine_form');
            var confirm_id = false;

            $(document).ready(function() {
                $combine_form.validate({
                    onkeyup : false,
                    rules : {
                        ChangePassword :{
                            required : true,
                            check_pwd : true,
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
                        ChangePassword : {
                            check_pwd : "이전 비밀번호는 사용이 불가능합니다.",
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

                $.validator.addMethod("check_pwd", function(value, element) {
                    var ret  = check_duppwd(value);
                    return ret;
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

                function check_duppwd(value)
                {
//                    var obj = $('input[name="ChangePassword"]');
  //                  var msg = obj.parent().parent().children('.error_msg');
                    var _url = '{{front_app_url("/member/combine/checkPWD/", "www")}}';
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
                                ret = true;
                            } else {
                                ret = false;
                            }
                        }
                    });

                    return ret;
                }

                $('#btn_submit').click(function(){

                    if($combine_form.valid() == true) {
                        $combine_form.attr("action", "/member/combine/dupproc/");
                        $combine_form.submit();
                    }
                });
            });
        </script>
        <script src="/public/vendor/jquery/validator/jquery.validate.js"></script>
    </div>
    <!-- End Container -->
@stop