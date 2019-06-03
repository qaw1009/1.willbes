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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

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
        
        .wb_mp4 {background:#000}
        .wb_01 {background:#303132}
		.wb_02 {background:#f5f5f5}

        .layer {width:100%; height:1070px; -ms-overflow:hidden; overflow:hidden}
        .video {width:100%; height:1200px; margin:0 auto; position:relative; opacity:0.3; box-shadow:0px rgba(0,0,0,0.3); }
        .video video {height:1070px}
        .pngimg {position:absolute; top:0; left:50%; margin-left:-500px; width:1000px; height:1070px; z-index:1}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video autoplay="" loop="" muted="">
                        <source src="https://static.willbes.net/public/images/promotion/2019/05/Clouds1137.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1137_top_L.png"  alt="메인" usemap="#welcomepack1"  />
                    <map name="welcomepack1" id="welcomepack1">
                        <area shape="rect" coords="282,949,696,1005" href="{{ app_url('/member/join/?ismobile=0&sitecode=' . $__cfg['SiteCode'], 'www') }}" onfocus='this.blur()'  alt="웰컴팩받기" target="_blink">
                    </map>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1137_01_L.png"  alt="아주특별한혜택"  usemap="#1137_01_L" border="0" />
<map name="1137_01_L" id="1137_01_L">
  <!--<area shape="rect" coords="396,554,509,594" href="#" onClick='alert("준비중입니다")'/>
  <area shape="rect" coords="624,555,735,594" href="#" onClick='alert("준비중입니다")'/>-->
  <area shape="rect" coords="163,2034,979,2156" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank"/>
</map>
        </div>
		<div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1137_02_L.png"  alt="아주특별한혜택"  usemap="#1137_02_L" border="0" />
<map name="1137_02_L" id="1137_02_L">
  <area shape="rect" coords="120,365,242,410" href="https://police.willbes.net/home/index/cate/3001" target="_blank"/>
  <area shape="rect" coords="376,365,492,408" href="https://police.willbes.net/home/index/cate/3002" target="_blank"/>
  <area shape="rect" coords="630,364,749,411" href="https://police.willbes.net/home/index/cate/3006" target="_blank"/>
  <area shape="rect" coords="881,362,1000,410" href="https://police.willbes.net/home/index/cate/3007" target="_blank"/>
  <area shape="rect" coords="123,796,239,841" href="https://pass.willbes.net/home/index/cate/3019" target="_blank"/>
  <area shape="rect" coords="377,795,493,840" href="https://pass.willbes.net/home/index/cate/3035" target="_blank"/>
  <area shape="rect" coords="628,795,746,841" href="https://pass.willbes.net/home/index/cate/3023" target="_blank"/>
  <area shape="rect" coords="882,794,998,841" href="https://pass.willbes.net/home/index/cate/3028" target="_blank"/>
</map>
        </div>

    </div>
    <!-- End Container -->
@stop