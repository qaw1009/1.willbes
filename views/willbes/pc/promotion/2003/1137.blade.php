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


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="http://file3.willbes.net/new_cop/EV180826.mp4" type="video/mp4"></source>
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

    </div>
    <!-- End Container -->
@stop