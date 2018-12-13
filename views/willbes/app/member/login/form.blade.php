@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <form method="post" id="login_frm" name="login_frm" onsubmit=" return false; " >
            <input type="hidden" name="chklogin" value="1" />
            {!! csrf_field() !!}
            <div class="mem-Tit">
                <img src="{{ img_url('login/logo.gif') }}">
                <span class="tx-blue">로그인</span>
            </div>
            <div class="Member mem-Login widthAuto460">
                <div class="inputBox p_re">
                    <input type="text" id="id" name="id" class="iptId" placeholder="아이디" maxlength="30" required="required" title="아이디" value="{{ $saved_member_id }}">
                </div>
                <div class="inputBox p_re">
                    <input type="password" id="pwd" name="pwd" class="iptPwd" placeholder="비밀번호" maxlength="30" required="required" title="비밀번호">
                </div>
                <div class="tx-red item" style="display: block;" id`="ret_msg"></div>
                <div class="chkBox mt30">
                    <ul>
                        <li class="chkBox-Save">
                            <input type="checkbox" id="save_id" name="save_id" class="iptSave" @if($saved_member_id != '') checked="checked" @endif value="Y">
                            <label for="save_id" class="labelSave tx-gray">아이디 저장</label>
                        </li>
                    </ul>
                </div>
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>로그인</span>
                </button>
                <br><br>
                <button type="button" onclick="getDeviceInfo()" class="mem-Btn bg-blue bd-dark-blue">
                    <span>디바이스정보</span>
                </button>
                <br><br>
                <button type="button" onclick="getToken()" class="mem-Btn bg-blue bd-dark-blue">
                    <span>겟토큰</span>
                </button>
            </div>
        </form>
    </div>

    <form method="get" id="real_login_frm" name="real_login_frm" action="{{ front_app_url('/member/login/proc/', 'www') }}">
        {!! csrf_field() !!}
        <input type="hidden" name="chklogin" value="0" />
        <input type="hidden" name="rtnUrl" value="{{$rtnUrl}}" />
        <input type="hidden" name="id" value="" id="real_id" />
        <input type="hidden" name="pwd" value="" id="real_pwd" />
        <input type="hidden" name="isSaveId" value="" id="isSaveId" />
    </form>
    <script type="text/javascript">
        var $login_frm = $('#login_frm');
        var app = null;

        $(document).ready(function() {
            app = new StarPlayerBridge();

            @if(empty($saved_member_id) === false)
            $("#pwd").focus();
            @else
            $("#id").focus();
            @endif

            $('#id,#pwd').focus(function(){
                $('#ret_msg').text('');
            });

            $login_frm.submit(function () {
                var _url = '{{ front_app_url('/member/login/proc/', 'www') }}';

                $('#ret_msg').text('');

                ajaxSubmit($login_frm, _url, function(ret){
                    $("#real_id").val($("#id").val());
                    $("#real_pwd").val($("#pwd").val());
                    if($("#save_id").is(':checked')){
                        $("#isSaveId").val('Y');
                    } else {
                        $("#isSaveId").val('N');
                    }
                    $("#real_login_frm").submit();

                }, function(ret){
                    $('#ret_msg').text(ret.ret_msg);
                }, null, true, 'alert');
            });
        });

        function getDeviceInfo() {
            app.getDeviceInfo(function(id, name, model){
                alert("id : "+id+" name : "+name+" model : "+model);
            });
        }

        function getToken() {
            app.getToken(function(token) {
                alert(token);
            });
        }
    </script>
@stop