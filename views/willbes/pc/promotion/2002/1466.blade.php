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

        .layer			{width:100%;height:800px; -ms-overflow:hidden;}
        .video			{width:100%; height:800px; margin:0 auto; overflow:hidden;position:relative; opacity:0.3; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg			{width:1210px; margin:0 auto; position:relative; top:-700px;}
        .pngimg-real	{width:1210px; height:800px; position:absolute;top:0;}

        .wb_mp4 {background:#000}

        .wb_top {background:#73675b url(http://file3.willbes.net/new_gosi/2018/06/0601_bg01.png) no-repeat center;}
        .wb_01 {background:#eee;}
        .wb_02 {background:#fff;position:relative;}      
        .wb_02 ul {width:1120px; margin:0 auto;position:absolute;left:23%;bottom:6.5%;}
        .wb_02 li {display:inline;margin-right:30px;}
        .wb_02 li iframe {width:460px; height:260px; margin:0 auto}   
        .wb_02 ul:after {content:""; display:block; clear:both}
        .wb_03 {background:#efefef;}
        .wb_04 {background:#3254a0;}
       
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="https://static.willbes.net/public/images/promotion/2019/12/1466_top.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1466_01.png"  alt="메인"  />
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1466_02.jpg"  alt="충원확장 및 유튜브"  />
            <ul>
                <li>                   
                    <iframe src="https://www.youtube.com/embed/auLHT8SySuM" frameborder="0" allowfullscreen></iframe>                     
                </li>
                <li>                       
                    <iframe src="https://www.youtube.com/embed/uBzQw1vOLmM" frameborder="0" allowfullscreen></iframe>                        
                </li>                 
            </ul>
        </div>

        <div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1466_03.jpg"  alt="커리큘럼"  />
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1466_04.jpg"  alt="부산윌비스 해양경찰">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1466_04s.gif"  alt="스파르타 바로가기" usemap="#Map1466q" border="0">
            <map name="Map1466q" id="Map1466q">
                <area shape="rect" coords="479,335,948,434" href="https://police.willbes.net/pass/promotion/index/code/1057" target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
      
    </script>

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });
    </script>
@stop