@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">
        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">통합회원가입</span>
        </div>
        <!-- 통합회원가입 : 회원가입완료 -->
        <div class="Member mem-CombineFin widthAuto690">
            <ul class="tabs-Step mb60">
                <li>본인인증</li>
                <li>약관동의/정보입력</li>
                <li class="on">회원가입완료</li>
            </ul>
            <div class="user-Txt tx-black">
                <span class="tx-blue">{{$MemName}}</span>님, <strong>윌비스 통합 회원 가입을 환영합니다.</strong></br>
                아이디<span class="tx-blue"> {{$MemId}}</span>로 모든 윌비스 서비스를 이용하실 수 있습니다.
            </div>
            <div class="tx-center"><img class="mt70" src="{{ img_url('login/willbes_welcome.jpg') }}"></div>

            <!--
            <div class="info-Txt info-Txt-Wrap tx-black mt60">
                현재 웰컴팩 이벤트 중입니다.<br>
                특별한 혜택을 받으시려면 아래 서비스를 선택해주세요.
                <div class="mt10">
                    <input name="cp1" type="radio" value="2001" id="cp1" /><label for="cp1"> 경찰</label>
                    &nbsp;&nbsp;&nbsp;
                    <input name="cp1" type="radio" value="2003" id="cp2" /><label for="cp2"> 공무원</label>
                </div>            
            </div>
            <button type="button" id="btn_start" class="mem-Btn h36 mt30 bg-blue bd-dark-blue">
                <span>이벤트 혜택 적용</span>
            </button>
            -->
            @if($ismobile == false)
                <div class="info-Txt info-Txt-Wrap tx-black mt60">
                    <strong class="tx-gray">시작할 서비스를 선택해 주세요</strong>
                    <select id="site" name="site" title="선택안함" class="seleSite">
                        <option value="/">메인화면</option>
                        @foreach($Site as $row)
                            <option value="//{{ app_to_env_url($row['SiteUrl']) }}">{{ $row['SiteName'] }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <select id="site" name="site" title="선택안함" class="seleSite" style="display:none;">
                    <option value="/m/">메인화면</option>
                </select>
            @endif
            <button type="button" id="btn_start" class="mem-Btn h36 mt30 bg-blue bd-dark-blue">
                <span>이동하기</span>
            </button>
        </div>
        <!-- End 통합회원가입 : 회원가입완료 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn_start').click(function () {
                location.replace($('#site').val());

                /*
                if($("input[name=cp1]:checked").length != 1){
                    alert("서비스를 선택해주십시요.");
                    return;
                }
                var sitecode = $("input[name=cp1]:checked").val();

                url = '{{front_url('/member/join/event/')}}';
                data = 'sitecode='+sitecode;

                sendAjax(url,
                    data,
                    function(ret){
                        alert(ret.ret_msg);
                        location.replace('{{front_url('/classroom/coupon/index')}}');
                    },
                    function(ret, status){
                        alert(ret.ret_msg);
                    }, false, 'GET', 'json');
               */
            });
        });
    </script>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('6331763949938786102').pageView();
        kakaoPixel('6331763949938786102').completeRegistration();
    </script>
@stop