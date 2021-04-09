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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:#2a2a2d url(https://static.willbes.net/public/images/promotion/2020/05/1243_bg01.jpg) no-repeat center top; position:relative; height:1468px;}
        .ev_winner {width:980px; margin:0 auto; height:515px; padding:100px 0 20px; margin:0 auto; overflow:hidden}
        .ev_winner .bx-wrapper .bx-viewport {height:405px;}
        .wb_cts02 {background:#353439 url(https://static.willbes.net/public/images/promotion/2021/04/1243_01_bg.jpg) repeat-y}
        .wb_cts03 {background:#353439 url(https://static.willbes.net/public/images/promotion/2021/04/1243_01_bg.jpg) repeat-y}
        .wb_cts04 {background:#ffffff url(https://static.willbes.net/public/images/promotion/2021/04/1243_c9_bg.jpg) no-repeat center top}

        /* 탭 */
        .BnRTab {width:100%; max-width:980px; text-align:center; margin:0 auto}
        .BnRTab li {display:inline; float:left}
        .BnRTab a img.off {display:block}
        .BnRTab a img.on {display:none}
        .BnRTab a.active img.off {display:none}
        .BnRTab a.active img.on {display:block}
        .BnRTab:after {content:""; display:block; clear:both}

        /* 슬라이드배너*/
        .slide_con {position:relative; width:980px; margin:0 auto;  overflow:hidden}

        .slide_con .bx-wrapper .bx-controls {
            position: absolute;
            top:0;
            width:100%;
            z-index: 1;            
        }
       
        .slide_cons {position:relative;width:1210px; margin:0 auto}	
        .slide_cons p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_cons p a {cursor:pointer}
        .slide_cons p.leftBtn {left:-40px; top:37%; width:80px; height:80px;}
        .slide_cons p.rightBtn {right:-40px;top:37%; width:80px; height:80px;}        

    </style>
    
    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1243_01.png" alt="윌비스 신규입성 이동민 관리형 면접반 " usemap="#Map180501_c1" border="0"/>
            <div class="ev_winner">
                <ul id="slider1" class="bxslider">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/05/1243_1-01.png"/></li>					
                </ul>
            </div>
        </div><!--WB_top//-->


        <div class="evtCtnsBox wb_cts02" >
			<img src="https://static.willbes.net/public/images/promotion/2019/05/1243_02.png"/>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1243_c3.jpg" />
            <ul class="BnRTab">
                <li>
                    <a href="#tab1">
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/1243_tap01.jpg" class="off" alt=""/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/1243_tap01on.jpg" class="on"  />
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/1243_tap02.jpg" class="off"  />
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/1243_tap02on.jpg" class="on"  alt=""/>
                    </a>
                </li>
                <li>
                    <a href="#tab3">
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/1243_tap03.jpg" class="off" alt=""/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/1243_tap03on.jpg" class="on"  alt=""/>
                    </a>
                </li>
            </ul>
            <div id="tab1">
                <div class="slide_con" class="offWrap">
                    <ul class="offSlider">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/1243_c4_1.jpg" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/1243_c4_2.jpg" /></li>
                    </ul>
                </div>
            </div>

            <div id="tab2">
                <div class="slide_con" class="offWrap">
                    <ul class="offSlider">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/1243_c5_1.jpg"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/1243_c5_2.jpg"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/1243_c5_3.jpg"/></li>
                    </ul>
                </div>
            </div>

            <div id="tab3">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/1243_c6.jpg" />
            </div>
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1243_txt.jpg" alt="#">
            <div class="slide_cons">
                <ul id="slidesImg7">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1243_s1.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1243_s2.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1243_s3.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1243_s4.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1243_s5.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1243_s6.jpg" alt="#" /></li>
                </ul>            
                <p class="leftBtn"><a id="imgBannerLeft7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_pre.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_next.png" alt="다음" /></a></p>
            </div>                          
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1243_03.png" alt="면접, 합격을 위한 마지막 관문. 윌비스 이동민 관리형 면접반" />
        </div><!--wb_cts04//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg7 = $("#slidesImg7").bxSlider({
            //mode:'fade', option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            controls:false,
            slideWidth:1210,
            autoHover: true,
            pager:false,
            });

            $("#imgBannerLeft7").click(function (){
            slidesImg7.goToPrevSlide();
            });
            $("#imgBannerRight7").click(function (){
            slidesImg7.goToNextSlide();
            });
	    });        

        $(function() {
            //Count the number of li elements
            var bx_num01 = $("#slider1 li").length;
            var ticker01 = $('#slider1').bxSlider({
                minSlides: 0,
                maxSlides: 100,
                slideWidth: 980,
                slideMargin: 0,
                ticker: true,
                mode: 'vertical',
                tickerHover: true,
                speed:50000*bx_num01
            });
        });

        /**/
        $(document).ready(function(){
            $('.BnRTab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})});
            tabMenuSlider();
        });

        function tabMenuSlider() {
            var $tabmenu = $('.BnRTab'),
                $sliderClass = '.offSlider',
                config = {
                    controls:false,
                    speed:800,
                    auto:true,
                    randomStart:true,
                    onSliderLoad: function(){
                        $(".offSlider").css("visibility", "visible").animate({opacity:1});
                    }
                };


            var sliders = new Array();
            $($sliderClass).each(function(i, slider) {
                var len = $(slider).find('> li').length;
                if(len < 2) {
                    sliders[i] = $(slider).addClass('nonslider');
                } else {
                    sliders[i] = $(slider).bxSlider(config);
                }
            });

            if(!$tabmenu.length ) { return }
            if($('div.offWrap').is(':first')) {
                slider.reloadSlider(config);
            }
            $tabmenu.on('click', ' a', function(e){
                var _target = $(this).attr('href');

                if($(_target).css('display') === 'block') {
                    $.each(sliders, function(i, slider){
                        if(!slider.hasClass('nonslider')) {
                            slider.reloadSlider(config);
                        }
                    });
                }
                e.preventDefault();
            });
        }
    </script>
@stop