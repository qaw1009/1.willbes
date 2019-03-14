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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        
        .skybanner {position:fixed; bottom:20px; right:10px; z-index:1;}

        .iron_top {background:#07131e url(http://file3.willbes.net/new_cop/2017/10/EV171031_p1_bg.jpg) no-repeat center;}
        .iron1 {background:#ebebeb;}        
        .iron2 {background:#295e79;}
        .iron3 {background:#2c2c2c url(http://file3.willbes.net/new_cop/2017/10/EV171031_p4_bg.jpg) no-repeat center;}
        .iron4 {background:#fff; padding-bottom:10px;}	
        .iron5 {background:#cdcdcd; padding-bottom:100px;}
        .iron6 {background:#0c161a url(http://file3.willbes.net/new_cop/2017/10/EV171031_p7_bg.jpg) no-repeat center;}	

        /* 슬라이드배너 */
        .slide_con1 {position:relative; width:980px; margin:0 auto}	
        .slide_con1 p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con1 p a {cursor:pointer}
        .slide_con1 p.leftBtn1 {left:-24px}
        .slide_con1 p.rightBtn1 {right:-24px}	
            #slidesImg1 li {display:inline; float:left}	
            #slidesImg1 li img {width:100%}
            #slidesImg1:after {content::""; display:block; clear:both}

        .slide_con2 {position:relative; width:980px; margin:0 auto}	
        .slide_con2 p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con2 p a {cursor:pointer}
        .slide_con2 p.leftBtn2 {left:-24px}
        .slide_con2 p.rightBtn2 {right:-24px}	
            #slidesImg2 li {display:inline; float:left}	
            #slidesImg2 li img {width:100%}
            #slidesImg2:after {content::""; display:block; clear:both}
        	
    </style>


    <div class="evtContent" id="evtContainer">

        <div class="skybanner">
            <img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p_sky.png" alt="스카이스크래퍼" usemap="#sky2019">
            <map name="sky2019" id="sky2019">
				<area shape="rect" coords="9,9,137,79" onclick="fnMove('1')" onfocus='this.blur()' alt="혜택">
				<area shape="rect" coords="9,89,137,159" onclick="fnMove('2')" onfocus='this.blur()' alt="관리">
				<area shape="rect" coords="9,169,137,239" onclick="fnMove('3')" onfocus='this.blur()' alt="트레이닝">
				<area shape="rect" coords="9,249,137,319" onclick="fnMove('4')" onfocus='this.blur()' alt="한줄톡">
				<area shape="rect" coords="9,329,137,399" onclick="fnMove('5')" onfocus='this.blur()' alt="현장스케치">
				<area shape="rect" coords="9,409,137,499" onclick="fnMove('6')" onfocus='this.blur()' alt="수강신청">
			</map>
        </div>

		<div class="evtCtnsBox iron_top"  id="main">
			<img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p1.png"  alt="아이언폴리스" />
		</div>

		<div class="evtCtnsBox iron1" id="iron1">
			<img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p2.png"  alt="혜택" />
		</div>
	
		<div class="evtCtnsBox iron2" id="iron2">
			<img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p3.png"  alt="관리" />
		</div>
        
   		<div class="evtCtnsBox iron3" id="iron3">
			<img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p4.png"  alt="트레이닝" />
		</div>

   		<div class="evtCtnsBox iron4" id="iron4">
			<img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p5_1.png"  alt="한줄톡" />
            <div class="slide_con1">
                <ul id="slidesImg1">
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll1.jpg" alt="1" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll2.jpg" alt="2" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll3.jpg" alt="3" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll4.jpg" alt="4" /></li>
                </ul>
                <p class="leftBtn1"><a id="imgBannerLeft1"><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p_prev.png"></a></p>
                <p class="rightBtn1"><a id="imgBannerRight1"><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p_next.png"></a></p>
            </div>
            <img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p5_2.png"  alt="합격률" />
		</div>

   		<div class="evtCtnsBox iron5" id="iron5">
			<img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p6.png"  alt="현장스케치" />
			<div class="slide_con2">
                <ul id="slidesImg2">
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll5.jpg" alt="5" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll6.jpg" alt="6" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll7.jpg" alt="7" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll8.jpg" alt="8" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_roll9.jpg" alt="9" /></li>
                </ul>
                <p class="leftBtn2"><a id="imgBannerLeft2"><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p_prev.png"></a></p>
                <p class="rightBtn2"><a id="imgBannerRight2"><img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p_next.png"></a></p>
            </div>
		</div>

   		<div class="evtCtnsBox iron6" id="iron6">
			<img src="http://file3.willbes.net/new_cop/2017/10/EV171031_p7.png"  alt="수강신청" usemap="#wsip"/>
            <map name="wsip" id="wsip">
                <area shape="rect" coords="368,1360,609,1420" href="{{ site_url('/pass/offPackage/index') }}" onfocus='this.blur()'  alt="강의신청">
            </map>
		</div>
    </div>
    <!-- End Container --> 

    <script>
        function fnMove(seq){
            var offset = $("#iron" + seq).offset();
            $('html, body').animate({scrollTop : offset.top}, 400);
        };

        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
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
                
            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });
            
            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
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
        
            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });
        
            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });

        
    </script>

@stop