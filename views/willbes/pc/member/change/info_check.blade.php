@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Mypage-USERINFOZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG tx-center">비밀번호확인</div>
            </div>
            <form method="post" action="/member/change/index/info/" onsubmit="return chkSubmit();">
                {!! csrf_field() !!}
                <div class="Member mem-renew-Password widthAuto530 pt15">
                    <div class="user-Txt tx-black pb40">
                        <div class="user-sub-Txt tx-gray" style="letter-spacing: 0;">
                            회원님의 정보를 더 안전하게 보호하기 위해 비밀번호를 다시 한 번 확인합니다.<br/>
                            비밀번호가 유출되지 않도록 주의해 주세요.
                        </div>
                    </div>
                    <div class="widthAuto400">
                        <div class="inputBox p_re" style="height: auto">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptID bg-gray mb10" disabled="disabled" value="{{sess_data('mem_id')}}">
                            <input type="password" id="password" name="password" class="iptPwdNew" placeholder="비밀번호를 입력해 주세요." maxlength="30">
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
                    if($.trim($('#password').val()) == ''){
                        alert('비밀번호를 입력해주십시요.');
                        return false;
                    }
                    return true;
                }
            </script>
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
@stop