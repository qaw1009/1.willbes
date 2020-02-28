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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2020/02/1559_top_bg.jpg) no-repeat top;}
        .wb_cts03 {background:#fff; padding-bottom:100px}
        .wb_cts04 {background:url(https://static.willbes.net/public/images/promotion/2020/02/1401_04_bg.png) no-repeat top;padding-bottom:140px;}
        .wb_cts05 {background:#7dc677;}
        .wb_cts06 {background:#fff;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:916px; margin:0 auto}
        .slide_con p {position:absolute; top:40%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1559_top.jpg"  alt="한국사 전문가 오태진" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1559_img01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1559_img02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1559_img03.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/02/1559_img04.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/02/1401_left.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/02/1401_right.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1559_01.jpg"  alt="한국사 고득점 완성" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1559_01_02.jpg"  alt="강의신청" usemap="#Map1401" border="0" />
            <map name="Map1401" id="Map1401">
                <area shape="rect" coords="856,377,996,416" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156592" target="_blank" />
                <area shape="rect" coords="855,456,996,497" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162556" target="_blank" />
                <area shape="rect" coords="855,535,997,576" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161932" target="_blank" />
                <area shape="rect" coords="857,639,997,679" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157745" target="_blank" />
                <area shape="rect" coords="858,718,996,758" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162557" target="_blank" />
                <area shape="rect" coords="858,799,999,841" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157748" target="_blank" />
                <area shape="rect" coords="858,898,997,936" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162558" target="_blank" />
                <area shape="rect" coords="854,975,998,1017" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162559" target="_blank" />
                <area shape="rect" coords="853,1057,996,1097" href="#none" onClick="{alert('준비중입니다.')}" />
            </map>
        </div>
    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
            
        });
    </script>
@stop