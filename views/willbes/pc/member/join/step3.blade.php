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
    {{-- 김상구본뿌장님(김성미실장) 요청 20202028 --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-69505110-4');
    </script>
    {{-- 김상구본뿌장님(김성미실장) 요청 2020319 --}}
    <script type="text/javascript" src="https://wcs.naver.net/wcslog.js"></script>
    <script type="text/javascript">
        var _nasa={};
        _nasa["cnv"] = wcs.cnv("2","10");
    </script>

    @if(sess_data('mem_interest') == '718002')
        <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/kas/static/kp.js"></script>
        <script type="text/javascript">
            kakaoPixel('8760977232968567433').pageView();
            kakaoPixel('8760977232968567433').completeRegistration('회원가입');
        </script>

        <!-- Meta Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '757464248917693');
            fbq('track', 'Complete Registration');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=757464248917693&ev=PageView&noscript=1"/></noscript>
        <!-- End Meta Pixel Code -->
    @endif

    @if(sess_data('mem_interest') == '718001')
        {{-- 회원가입 경찰일때만   W.A 실장 윤지훈 요청 20210309 --}}
        <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
        <script type="text/javascript">
            kakaoPixel('2420477028898879027').pageView();
            kakaoPixel('2420477028898879027').completeRegistration();
        </script>
        <!-- Event snippet for 가입 conversion page -->
        <script>
            gtag('event', 'conversion', {'send_to': 'AW-710035840/jdiVCNT1l9cBEICTydIC'});
        </script>
        <!-- ADN Tracker[회원가입] start -->
        <script type="text/javascript" async src="//fin.rainbownine.net/js/adn_tags_1.0.0.js"></script>
        <script type="text/javascript">
            var adn_param = adn_param || [];
            adn_param.push([{
                ui:'102299',
                ut:'Complete',
                uo:'types1'
            }]);
        </script>
        <!-- Enliple Tracker v3.6 [회원가입] start -->
        <script type="text/javascript">
            function mobConv() {
                var cn = new EN();
                cn.setData("uid", "willpolice");
                cn.setData("ordcode", "");
                cn.setData("qty", "1");
                cn.setData("price", "1");
                cn.setData("pnm", encodeURIComponent(encodeURIComponent("회원가입")));
                cn.setSSL(true);
                cn.sendConv();
            }
        </script>
        <script src="https://cdn.megadata.co.kr/js/en_script/3.6/enliple_min3.6.js" defer="defer" onload="mobConv()"></script>
        <!-- Enliple Tracker v3.6 [회원가입] end -->
        {{-- 회원가입 경찰일때만 경찰 김문정 요청 -> 공통코드로 변경
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TMFT3J3');</script>
        <!-- End Google Tag Manager -->
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TMFT3J3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        --}}
    @endif
@stop