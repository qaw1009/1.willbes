@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:absolute;
            top:20px;
            right:0;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .layer {width:100%;height:1070px; -ms-overflow:hidden;}
        .video {width:100%; height:1070px; margin:0 auto; overflow:hidden;position:relative; opacity:0.3; box-shadow:0px rgba(0,0,0,0.3); background:#000}
        .pngimg {width:1000px; margin:0 auto; position:relative; top:-1070px;}
        .pngimg-real {width:1000px; height:1070px; position:absolute;top:0;}

        .wb_mp4 {background:#000;}
        .wb_top {background:#2b5a01 url(http://file3.willbes.net/new_cop/2018/04/EV180430_p1_bg.jpg) no-repeat center;}
        .wb_01 {background:#2b3541}
        .wb_02 {background:#3c3e3f url(http://file3.willbes.net/new_cop/2018/01/EV180130_p3_bg.jpg) no-repeat center;}
        .wb_03 {background:#303132}
        .wb_04 {background:#2b2c2d url(http://file3.willbes.net/new_cop/2018/01/EV180130_p5_bg.jpg) no-repeat center;}
        .wb_05 {background:#ebebeb}
        .wb_06 {background:#f5f5f5}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="http://file3.willbes.net/new_cop/EV190225.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_p1_re.png"  alt="메인" usemap="#welcomepack1"  />
                        <map name="welcomepack1" id="welcomepack1">
                            <area shape="rect" coords="282,949,696,1005" href="{{ app_url('/member/join/?ismobile=0&sitecode=' . $__cfg['SiteCode'], 'www') }}" onfocus='this.blur()'  alt="웰컴팩받기" target="_blink">
                        </map>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_p2_re.png"  alt="아주특별한혜택" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_p4_re.png"  alt="02" usemap="#pass"><br>
            <map name="pass" id="pass">
                <area shape="rect" coords="466,644,689,670" href="{{ site_url('/promotion/index/cate/3001/code/1009') }}" onfocus='this.blur()'  alt="신광은경찰PASS" target="_blink">
            </map>
            <a href="{{ app_url('/member/join/?ismobile=0&sitecode=' . $__cfg['SiteCode'], 'www') }}"><img src="http://file3.willbes.net/new_cop/2019/03/EV190311_p5_re.png"  alt="03"  usemap="#welcomepack2"></a>
        </div>

        <div class="evtCtnsBox wb_05" >
            <img src="http://file3.willbes.net/new_cop/2018/03/EV180302_p6.png"  alt="여기서끝이아닙니다" >
        </div>

        <div class="evtCtnsBox wb_06" >
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_p7_re.png"  alt="링크들"  usemap="#link">
            <map name="link" id="link">
                <area shape="rect" coords="109,378,227,432" href="{{ site_url('/promotion/index/cate/3001/code/1009') }}" onfocus='this.blur()'  alt="신광은경찰PASS" target="_blink">
                <area shape="rect" coords="325,378,445,432" href="{{ site_url('/home/index/cate/3002') }}" onfocus='this.blur()'  alt="경행경채" target="_blink">
                <area shape="rect" coords="540,378,660,432" href="{{ site_url('/promotion/index/cate/3006/code/1008') }}" onfocus='this.blur()'  alt="경찰승진PASS" target="_blink">
                <area shape="rect" coords="755,378,874,432" href="{{ site_url('/home/index/cate/3007') }}" onfocus='this.blur()'  alt="해양경찰" target="_blink">
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop