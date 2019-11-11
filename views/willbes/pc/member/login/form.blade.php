@extends('willbes.pc.layouts.master')

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
            <!-- 로그인 -->
            <div class="Member mem-Login widthAuto460">
                <div class="inputBox p_re">
                    <input type="text" id="id" name="id" class="iptId" placeholder="아이디" maxlength="30" required="required" title="아이디" value="{{ $saved_member_id }}">
                </div>
                <div class="inputBox p_re">
                    <input type="password" id="pwd" name="pwd" class="iptPwd" placeholder="비밀번호" maxlength="30" required="required" title="비밀번호">
                </div>
                <div class="tx-red item" style="display: block;" id="ret_msg"></div>
                <div class="chkBox mt30">
                    <ul>
                        <li class="chkBox-Save">
                            <input type="checkbox" id="save_id" name="save_id" class="iptSave" @if($saved_member_id != '') checked="checked" @endif value="Y">
                            <label for="save_id" class="labelSave tx-gray">아이디 저장</label>
                        </li>
                        <li class="chkBox-Search tx-gray">
                            <span><a class="tx-gray mr5" href="{{ front_app_url('/member/find/id/', 'www') }}">아이디찾기</a> | <a class="tx-gray ml5" href="{{ front_app_url('/member/find/pwd/', 'www') }}">비밀번호찾기</a></span>
                        </li>
                    </ul>
                </div>
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>로그인</span>
                </button>
                <table cellspacing="0" cellpadding="0" class="joinTable tx-gray mt40">
                <colgroup>
                <col/>
                <col width="20%"/>
            </colgroup>
                    <tbody>
                    <tr>
                        <td>
                            <span class="tx-blue">아직 윌비스 통합회원이 아니신가요?</span><br/>
                            가입 즉시 패밀리 포인트 3,000P를 받으실 수 있습니다.
                        </td>
                        <td>
                            <a class="bg-dark-blue" href="{{ front_app_url('/member/join/', 'www') }}">통합회원가입</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><span class="tx-blue">윌비스 통합회원이란?</span><br/>
                            한번의 회원가입으로 윌비스 전체 서비스를 이용하실 수 있는 멤버십입니다.
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- End 로그인 -->

            <br/><br/><br/><br/><br/><br/>
        </form>
    </div>
    <!-- End Container -->
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

        $(document).ready(function() {
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
    </script>
@stop