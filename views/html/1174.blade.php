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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .wbCommon {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/  

        .wb_00 {background:#0a1d4f url(https://static.willbes.net/public/images/promotion/2019/03/1174_top_bg.jpg) no-repeat center top;}        
        .wb_01 {background:#202020 url(https://static.willbes.net/public/images/promotion/2019/03/1174_01_bg.jpg) no-repeat center top;}
        .wb_01 .youtube {height:1418px}	
        .wb_01 .youtube iframe {margin-top:439px; width:854px; height:480px}
        /* 슬라이드배너 */
        .wb_01_photo {position:relative; width:854px; margin:0 auto}
        .wb_01_photo span {position:absolute; top:50%; margin-top:-36px; width:72px; z-index:100; display:block; background:#fff}
        .wb_01_photo img {width:100%}
        .wb_01_photo span a {cursor:pointer}
        .wb_01_photo span.leftBtn {left:-36px;}
        .wb_01_photo span.rightBtn {right:-36px;} 

        .wb_02 {background:#f297b8 url(https://static.willbes.net/public/images/promotion/2019/03/1174_02_bg.jpg) no-repeat center top;}       
               	
    </style>


    <div class="evtContent" id="evtContainer">

        <div class="wbCommon wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1174_top.jpg" title="합격자의밤" />
        </div>
		
		<div class="wbCommon wb_01">
            <div class="youtube"><iframe src="https://www.youtube.com/embed/-Q676VZ03FM?rel=0" frameborder="0" allowfullscreen></iframe></div>
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_01.jpg" title=" " /></div>
            <div class="wb_01_photo">
                <ul>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img01.jpg" title="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img02.jpg" title="8" /></li>	
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img03.jpg" title="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img04.jpg" title="4" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img05.jpg" title="5" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img06.jpg" title="6" /></li>
                <ul>
                <span class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_pre.png" title="back"></a></span>
                <span class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_next.png" title="next"></a></span>
		    </div>
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_02.jpg" title=" " /></div>
		</div>

   		<div class="wbCommon wb_02">
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_02_01.jpg" title=" " /></div>
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_02_02.jpg" title=" " /></div>
        </div>
        
        <div>

        </div>
        
    </div>
    <!-- End Container -->   

    <script>
        $(document).ready(function() {
            var slidesImg1 = $(".wb_01_photo ul").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:854,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg1.goToNextSlide();
            });
        });
    </script>
    
@stop