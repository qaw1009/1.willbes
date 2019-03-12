@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_mp4 {width:100%; text-align:center; margin:0 auto; background:#000; min-width:1210px;}
        .layer {width:100%;height:1070px; -ms-overflow:hidden;}
        .video {width:100%; height:1070px; margin:0 auto; overflow:hidden;position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg {width:1000px; margin:0 auto; position:relative; top:-1070px;}
        .pngimg-real {width:1000px; height:1070px; position:absolute;top:0;}

        .wb_top {background:#73675b url(http://file3.willbes.net/new_gosi/2018/06/0601_bg01.png) no-repeat center; min-width:1210px;}
        .wb_01 {background:#eee}
        .wb_02 {background:#f7f7f7}
        .wb_03 {background:#f7f7f7}
        .wb_04 {background:#fff}
        .wb_05 {background:#ebebeb}
        .wb_06 {background:#ebebeb}
        .wb_07 {background:#fff}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="http://file3.willbes.net/new_gosi/2019/01/Fireworks - 13521.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="http://file3.willbes.net/new_gosi/2019/02/190201_01.png"  alt="메인" usemap="#welcomepack1"  />
                        <map name="welcomepack1" id="welcomepack1">
                            <area shape="rect" coords="590,502,981,571" href="{{ site_url('/member/join/?ismobile=0&sitecode=2000') }}" onfocus='this.blur()'  alt="웰컴팩받기" target="_blink">
                        </map>
                    </div>
                </div>
            </div>
        </div>
        <!-- wb_mp4 //-->

        <div class="evtCtnsBox wb_01">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180831_02.png"  alt="아주특별한혜택" />
        </div>
        <!-- wb_01//-->

        <div class="evtCtnsBox wb_02">
            <img src="http://file3.willbes.net/new_gosi/2018/11/181101_03.png"  alt="01" usemap="#zero" />
            <map name="zero" id="zero">
                <area shape="rect" coords="294,1447,686,1521" href="{{ site_url('/member/join/?ismobile=0&sitecode=2000') }}" />
            </map>
        </div>
        <!-- wb_02//-->

        <div class="evtCtnsBox wb_04" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/190101_02.png"  alt="여기서끝이아닙니다"   usemap="#190101">
            <map name="190101" id="190101">
                <area shape="rect" coords="73,649,271,700" href="{{ site_url('/promotion/index/cate/3019/code/1061') }}" alt="9급 pass"/>
                <area shape="rect" coords="424,649,583,699" href="{{ site_url('/promotion/index/cate/3020/code/1062') }}" alt="7급 pass"/>
                <area shape="rect" coords="743,649,911,703" href="{{ site_url('/promotion/index/cate/3020/code/1063') }}" alt="외무영사직 pass"/>
                <area shape="rect" coords="91,1089,251,1138" href="{{ site_url('/promotion/index/cate/3035/code/1064) }}" alt="김동진 법원팀"/>
                <area shape="rect" coords="421,1083,579,1143" href="{{ site_url('/promotion/index/cate/3023/code/1060') }}" alt="소방 pass"/>
                <area shape="rect" coords="726,1085,917,1140" href="#none" alt="윌비스 기술직"/>
            </map>
        </div>
        <!-- wb_04// -->

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