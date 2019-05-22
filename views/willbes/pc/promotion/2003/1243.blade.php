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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:#2a2a2d url(https://static.willbes.net/public/images/promotion/2019/05/1243_bg01.png) no-repeat center top; position:relative; height:1468px;}
        .ev_winner {width:980px; margin:0 auto; height:515px; padding:80px 0 20px; margin:0 auto; overflow:hidden}
        .ev_winner .bx-wrapper .bx-viewport {height:405px;}
        .wb_cts02 {background:#353439 url(http://file3.willbes.net/new_gosi/2018/05/EV180528_c2_bg.jpg) repeat-y}
        .wb_cts03 {background:#353439 url(http://file3.willbes.net/new_gosi/2018/05/EV180528_c2_bg.jpg) repeat-y}
        .wb_cts04 {background:#ffffff url(http://file3.willbes.net/new_gosi/2018/05/EV180528_c9_bg.jpg) no-repeat center top}

        /* 탭 */
        .BnRTab {width:100%; max-width:980px; text-align:center; margin:0 auto}
        .BnRTab li {display:inline; float:left}
        .BnRTab a img.off {display:block}
        .BnRTab a img.on {display:none}
        .BnRTab a.active img.off {display:none}
        .BnRTab a.active img.on {display:block}
        .BnRTab:after {content:""; display:block; clear:both}

        /* 슬라이드배너*/
        .slide_con {position:relative; width:980px; margin:0 auto; height:658px; background:#999; overflow:hidden}

        .slide_con .bx-wrapper .bx-controls {
            position: absolute;
            top:0;
            width:100%;
            z-index: 1;            
        }
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1243_01.png" alt="윌비스 신규입성 이동민 관리형 면접반 " usemap="#Map180501_c1" border="0"/>
            <div class="ev_winner">
                <ul id="slider1" class="bxslider">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1243_1-01.png"/></li>					
                </ul>
            </div>
        </div><!--WB_top//-->


        <div class="evtCtnsBox wb_cts02" >
			<img src="https://static.willbes.net/public/images/promotion/2019/05/1243_02.png"/>
            <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c3.jpg" />
            <ul class="BnRTab">
                <li>
                    <a href="#tab1">
                        <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_tap01.jpg" class="off" alt=""/>
                        <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_tap01on.jpg" class="on"  />
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_tap02.jpg" class="off"  />
                        <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_tap02on.jpg" class="on"  alt=""/>
                    </a>
                </li>
                <li>
                    <a href="#tab3">
                        <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_tap03.jpg" class="off" alt=""/>
                        <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_tap03on.jpg" class="on"  alt=""/>
                    </a>
                </li>
            </ul>
            <div id="tab1">
                <div class="slide_con" class="offWrap">
                    <ul class="offSlider">
                        <li><img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c4_1.jpg" /></li>
                        <li><img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c4_2.jpg" /></li>
                    </ul>
                </div>
            </div>

            <div id="tab2">
                <div class="slide_con" class="offWrap">
                    <ul class="offSlider">
                        <li><img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c5_1.jpg"/></li>
                        <li><img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c5_2.jpg"/></li>
                        <li><img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c5_3.jpg"/></li>
                    </ul>
                </div>
            </div>

            <div id="tab3">
                <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c6.jpg" />
            </div>
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c7.jpg" alt="면접, 혼자서는 실력을 완성할 수 없습니다. " /><Br>
            <img src="http://file3.willbes.net/new_gosi/2018/05/EV180528_c8.jpg" alt="면접, 혼자서는 실력을 완성할 수 없습니다. " />
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1243_03.png" alt="면접, 합격을 위한 마지막 관문. 윌비스 이동민 관리형 면접반" />
        </div><!--wb_cts04//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
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
                speed:10000*bx_num01
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