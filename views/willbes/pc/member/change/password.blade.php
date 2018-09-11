@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            @if($method == 'check')
                <form method="post" action="/member/change/password/" onsubmit="return chkSubmit();">
                    {!! csrf_field() !!}
                    <div class="willbes-Mypage-ONLINEZONE c_both">
                        <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                            · 비밀번호확인
                        </div>
                    </div>
                    <div class="Member mem-renew-Password widthAuto530 pt50">
                        <div class="user-Txt tx-black pb40">
                            <div class="user-sub-Txt tx-gray" style="letter-spacing: 0;">
                                회원님의 정보를 더 안전하게 보호하기 위해 비밀번호를 다시 한 번 확인합니다.<br/>
                                비밀번호가 유출되지 않도록 주의해 주세요.
                            </div>
                        </div>
                        <div class="widthAuto400">
                            <div class="inputBox p_re" style="height: auto">
                                <input type="text" id="USER_ID" name="USER_ID" class="iptID bg-gray mb10" disabled="disabled" value="{{sess_data('mem_id')}}">
                                <input type="password" id="oldPass" name="oldPass" class="iptPwdNew" placeholder="비밀번호를 입력해 주세요." maxlength="30">
                            </div>
                        </div>
                        <div class="renew-password-Btn btnAuto180 h36 mt60">
                            <button type="submit" class="mem-Btn bg-blue bd-dark-blue">
                                <span>확인</span>
                            </button>
                        </div>
                    </div>
                </form>
                <script>
                    function chkSubmit()
                    {
                        if($.trim($('#oldPass').val()) == ''){
                            alert('비밀번호를 입력해주십시요.');
                            return false;
                        }
                        return true;
                    }
                </script>
            @elseif($method == 'change')
                <form method="post" id="pwd_form" name="pwd_form" novalidate="novalidate">
                    <input type="hidden" name="oldPass" value="{{$password}}" >
                    {!! csrf_field() !!}
                    <div class="willbes-Mypage-ONLINEZONE c_both">
                        <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                            · 비밀번호변경
                        </div>
                    </div>
                    <div class="Member mem-renew-Password widthAuto530 pt50">
                        <div class="user-Txt tx-black pb40">
                            <div class="user-sub-Txt tx-gray" style="letter-spacing: 0;">
                                비밀번호를 재설정 해주세요.<br/>
                                비밀번호는 8~20자리 이하 영문 대소문자, 숫자, 특수문자 중 2종류를 조합해 주세요.
                            </div>
                        </div>
                        <div class="widthAuto400">
                            <div class="inputBox mt30 p_re">
                                <input type="password" id="newPass" name="newPass" class="iptPwdNew sm" placeholder="새비밀번호" maxlength="30">
                            </div>
                            <div class="tx-red err_msg" style="display: block;" ></div>
                        </div>
                        <div class="widthAuto400">
                            <div class="inputBox mt30 p_re">
                                <input type="password" id="newPasschk" name="newPasschk" class="iptPwdNew sm" placeholder="새비밀번호 확인" maxlength="30">
                            </div>
                            <div class="tx-red err_msg" style="display: block;" ></div>
                        </div>
                        <div class="renew-password-Btn btnAuto180 h36 mt60">
                            <button type="button" name="btn_submit" id="btn_submit" class="mem-Btn bg-blue bd-dark-blue">
                                <span>비밀번호 변경하기</span>
                            </button>
                        </div>
                    </div>
                </form>
                <script src="/public/vendor/jquery/validator/jquery.validate.js"></script>
                <script>
                    var $pwd_form = $('#pwd_form');

                    $(document).ready(function() {
                        $pwd_form.validate({
                            onkeyup:false,
                            rules:{
                                newPass:{
                                    required:true,
                                    minlength:8,
                                    maxlength:20,
                                    pwd_mix:true
                                },
                                newPasschk:{
                                    required:true,
                                    pwd_chk:true
                                }
                            },
                            messages: {
                                newPass:{
                                    required:"비밀번호를 입력해주십시요.",
                                    minlength:"비밀번호는 8~20자리로 입력해주십시요.1",
                                    maxlength:"비밀번호는 8~20자리로 입력해주십시요.2",
                                    pwd_mix:"영문대소문자, 숫자, 특수문자중 2종류이상 조합해야 합니다."
                                },
                                newPasschk:{
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
                            var pwd = $("input[name='newPass']").val();
                            var pwdchk = $("input[name='newPasschk']").val();

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
                                $pwd_form.attr("action", "/member/change/password/");
                                $pwd_form.submit();
                            }
                        });
                    });
                </script>
            @endif
        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop