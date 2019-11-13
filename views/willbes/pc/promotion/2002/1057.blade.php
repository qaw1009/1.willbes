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
        .video			{width:100%; height:800px; margin:0 auto; overflow:hidden;position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg			{width:1210px; margin:0 auto; position:relative; top:-800px;}
        .pngimg-real	{width:1210px; height:800px; position:absolute;top:0;}

        .wb_mp4 {background:#000}

        .wb_top {background:#73675b url(http://file3.willbes.net/new_gosi/2018/06/0601_bg01.png) no-repeat center;}
        .wb_01 {background:#eee;}
        .wb_02 {background:#eee;}
        .wb_03 {background:#eee;}
        .wb_04 {background:#fff; padding-top:80px}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:850px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-30px; top:45%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-40px;top:45%; width:67px; height:67px;}

        #slidesImg3 li {display:inline; float:left;}
        #slidesImg3 li img {width:850px;}
        #slidesImg3:after {content::""; display:block; clear:both}

        .tabsEvt {width:900px; margin:0 auto; border-bottom:5px solid #e62525}
        .tabsEvt li {display:inline; float:left; width:300px}
        .tabsEvt button {margin:0; padding:0}
        .tabsEvt button,
        .tabsEvt a {display:block; height:62px; background:#474747; color:#fff; font-size:20px; line-height:62px; margin-right:1px}
        .tabsEvt button:hover,
        .tabsEvt a.active,
        .tabsEvt a:hover {background:#e62525;}
        
        .tabsEvt li:last-child a {margin:0}
        .tabsEvt:after {content:""; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="https://static.willbes.net/public/images/promotion/2019/11/1057_top.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="https://static.willbes.net/public/images/promotion/2019/11/1057_01.png"  alt="메인"  />
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1057_02.png"  alt="01" usemap="#zero" />
            <map name="zero" id="zero">
                <area shape="rect" coords="847,243,931,271" href="http://busan.willbes.net/event/movie/event.html?event_cd=On_171205_c&topMenuType=O#main" onfocus='this.blur()'  alt="0원입문특강" target="_blink">
            </map>
            <div class="slide_con mb80">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_roll_01.jpg" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_roll_02.jpg" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_roll_03.jpg" alt="3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_roll_04.jpg" alt="4" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_roll_05.jpg" alt="5" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_roll_06.jpg" alt="6" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_roll_07.jpg" alt="7" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_roll_08.jpg" alt="8" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/11/1057_p_next.png"></a></p>
            </div>
            <iframe width="854" height="480" src="https://www.youtube.com/embed/4O6euEN5YrQ?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>


        <div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1057_03.png" usemap="#bu">
            <map name="bu" id="bu">
                <area shape="rect" coords="160,1503,361,1551" href="https://blog.naver.com/ace5885" target="_blank"/>
                <area shape="rect" coords="454,1435,656,1483" href="{{ site_url('/pass/promotion/index/code/1059') }}" target="_blank" alt="독한회독 바로가기"/>
                <area shape="rect" coords="761,1504,963,1552" href="{{ site_url('/pass/promotion/index/code/1058') }}" target="_blank" alt="실전에 강한 최준면접"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_04">
            <ul class="tabsEvt">
                <li>
                    <a href="#tab1">
                        7/9급 공무원
                    </a>
                </li>
                <li>
                    <button type="button" onclick="window.open('{{ site_url('/pass/promotion/index/code/1051') }}')">
                        경찰/검찰/법원직
                    </button>
                </li>
                <li>
                    <a href="#tab2">
                        취업준비[자격증]
                    </a>
                </li>
            </ul>
            <div id="tab1">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1057_04_2-2.png" title="PSAT 완전정복 기본강의 동영상 종합반">
            </div>
            <div id="tab2">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1057_04_3-2.png" title="PSAT 완전정복 기본강의 동영상 종합반">
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function(){
            $('ul.tabsEvt').each(function(){
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

                    e.preventDefault()})})}
        );

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:850,
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

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });
    </script>
@stop