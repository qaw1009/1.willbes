@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <form name="pwd_form" id="pwd_form" method="post" novalidate="novalidate">
        {!! csrf_field() !!}
        <input type="hidden" name="jointype" id="jointype" value="{{$jointype}}" />
        <input type="hidden" name="enc_data" id="enc_data" value="{{$enc_data}}" />
        <input type="hidden" name="MemId" id="MemId" value="{{$MemId}}" />
        <div id="Container" class="memContainer widthAuto c_both">
            <div class="mem-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">비밀번호 재설정</span>
            </div>
            <!-- 비밀번호 재설정 -->
            <div class="Member mem-renew-Password widthAuto690">
                <div class="user-Txt tx-black">
                    {{$MemName}} 회원님 비밀번호 재설정 인증에 성공하셨습니다.
                    <div class="user-sub-Txt tx-gray">
                        비밀번호를 재설정 해주세요.
                    </div>
                </div>
                <div class="widthAuto460">
                    <div class="inputBox mt30 p_re">
                        <input type="password" id="MemPassword" name="MemPassword" class="iptPwdNew" placeholder="새비밀번호" maxlength="30">
                    </div>
                    <div class="tx-red err_msg" style="display: block;" ></div>
                </div>
                <div class="widthAuto460">
                    <div class="inputBox mt30 p_re">
                        <input type="password" id="MemPassword_chk" name="MemPassword_chk" class="iptPwdNew" placeholder="비밀번호확인" maxlength="30">
                    </div>
                    <div class="tx-red err_msg" style="display: block;" ></div>
                </div>
                <div class="renew-password-Btn btnAuto180 h36">
                    <button type="button" id="btn_submit" class="mem-Btn bg-blue bd-dark-blue">
                        <span>비밀번호 변경하기</span>
                    </button>
                </div>
            </div>
            <!-- End 비밀번호 재설정 -->
            <br/><br/><br/><br/><br/><br/>
        </div>
        <!-- End Container -->
    </form>
    <script src="/public/vendor/jquery/validator/jquery.validate.js"></script>
    <script>
        var $pwd_form = $('#pwd_form');

        $(document).ready(function() {
            $pwd_form.validate({
                onkeyup:false,
                rules:{
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

            $.validator.addMethod("pwd_chk", function(value, element) {
                var pwd = $("input[name='MemPassword']").val();
                var pwdchk = $("input[name='MemPassword_chk']").val();

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
                if($pwd_form.valid() == true){
                    $pwd_form.attr("action", "/Member/FindPWDProc/");
                    $pwd_form.submit();
                }
            });
        });
    </script>
@stop