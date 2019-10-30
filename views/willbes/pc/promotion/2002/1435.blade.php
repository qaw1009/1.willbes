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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        /************************************************************/        
        .evt01 {background:#ececec url("https://static.willbes.net/public/images/promotion/2019/07/1328_police_bg.jpg") center top  no-repeat}
     
        .evt02 {background:url("https://static.willbes.net/public/images/promotion/2019/10/1435_top_bg.jpg") center top  no-repeat}

        .evt03 {background:#ececec;}

        .evt04 {background:#fff;}

        .evt02s{background:#333;padding-bottom:75px;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto;padding-left:100px;}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0}
        .slide_con p.rightBtn {right:0}
    
        .evt01 {padding-bottom:100px}
        .evt01 .slide_con {position:relative; width:950px; margin:0 auto}
        .evt01 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt01 .slide_con p.leftBtn {left:-80px}
        .evt01 .slide_con p.rightBtn {right:-80px}         
    </style>
    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1328_police.jpg" title="윌비스 경찰팀">       
        </div>
        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1435_top.jpg" title="오태진 근현대사 이번에 끝내기">
        </div>    
        <div class="evtCtnsBox evt02s" id="evt02s">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1435_slide.jpg" title="후기">
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1435_slide1.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1435_slide2.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1435_slide3.png" /></li>   
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1435_slide4.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1435_slide5.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1435_slide6.png" /></li>        
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1435_slide7.png" /></li>                         
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2019/09/1009_01_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2019/09//1009_01_arrowR.png"></a></p>
            </div>
        </div>   
        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1435_01.jpg" title="100점에 도전">
        </div>      
        <div class="evtCtnsBox evt04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1435_02.jpg" usemap="#Map1435a" border="0" />
            <map name="Map1435a" id="Map1435a">
                <area shape="rect" coords="875,1018,984,1057" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157521" target="_blank" />
                <area shape="rect" coords="875,1068,986,1106" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/157519" target="_blank" />
                <area shape="rect" coords="873,1115,987,1156" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/156657" target="_blank"/>
            </map>        
        </div> 
    </div>
    <!-- End Container -->

    <script type="text/javascript">      

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });
       
    </script>
@stop