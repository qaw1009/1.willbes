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

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }
        .skybanner li {margin-bottom:5px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/03/1586_top_bg.jpg) no-repeat center top}
        .wb_01 {background:#3e4552}
        .wb_02 {background:#ededed; padding-bottom:80px;}
        .wb_03 {background:#2d77be url(https://static.willbes.net/public/images/promotion/sparta/1051_05_bg.jpg) no-repeat center top}
        .wb_04 {background:#e5e5e6 url(https://static.willbes.net/public/images/promotion/sparta/1051_06_bg.jpg) repeat}
        .wb_06 {background:#f7f7f7}
        .wb_07 {background:#d7d7d7}   
        .tabs4 {background:url(https://static.willbes.net/public/images/promotion/2020/03/1586_04_content_bg.jpg) no-repeat center top}
        .tabs3 {background:#d7d7d7}
        .wb_schedule{background:#fff;}

        /* 슬라이드배너 */
        .slide_con1 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con1 img {width:100%;}
        .evtCtnsBox p a {cursor:pointer}
        .evtCtnsBox p.leftBtn1 {left:-31px; top:50%; width:62px; height:62px; margin-top:-31px;opacity:0.9; filter:alpha(opacity=90);}
        .evtCtnsBox p.rightBtn1 {right:-31px;top:50%; width:62px; height:62px;  margin-top:-31Dpx;opacity:0.9; filter:alpha(opacity=90);}

        .slide_con2 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con2 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con2 img {width:100%;}
        .slide_con2 p a {cursor:pointer}

        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#0e275f;}
        .tabContaier ul{width:1120px;margin:0 auto;height:70px;} 
        .tabContaier li{display:inline-block;width:280px;height:65px;line-height:65px;background:#0b2661;color:#9096aa;float:left;font-size:19px;font-weight:bold;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {border-bottom:5px solid #31d1ff;color:#fff;font-size:26px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <ul class="skybanner" >
            <li><a href="#sparta"><img src="https://static.willbes.net/public/images/promotion/2020/03/1586_sky.png" alt="입실문의"></a></li>            
        </ul>

        <div class="evtCtnsBox wb_top" id="sparta">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1586_top.jpg" alt="스파르타" />
        </div>  
       
        <div class="evtCtnsBox wb_tab">
            <div class="tabContaier">    
                <ul>    
                    <li><a href="#tab1" class="active">개강정보</a></li>
                        
                    <li><a href="#tab2">스파르타 안내</a></li>
                    
                    <li><a href="#tab3">합격수기</a></li>
                    
                    <li><a href="#tab4">채용현황</a></li>              
                </ul>
            </div> 
            <div id="tab1" class="tabContents">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1586_01_content.jpg" usemap="#Map" title="" border="0" />
                <map name="Map" id="Map">
                    <area shape="rect" coords="361,545,757,644" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&subject_idx=1074&course_idx=&campus_ccd=605001" target="_blank" />
                </map>      
            </div>
            <div id="tab2" class="tabContents">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1586_02_content.jpg"  title="" />      
            </div>
            <div id="tab3" class="tabContents tabs3">       
                <img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_t1.png" alt="2018 합격수기" />
                <div class="slide_con1">
                    <ul id="slidesImg1">
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s01.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s02.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s03.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s04.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s05.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s06.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s07.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s08.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s09.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s10.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s11.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s12.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s13.jpg" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s01.jpg" alt="1"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s02.jpg" alt="2"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s03.jpg" alt="3"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s05.jpg" alt="5"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s06.jpg" alt="6"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s07.jpg" alt="7"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s08.jpg" alt="8"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s09.jpg" alt="9"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s10.jpg" alt="10"/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s11.jpg" alt="11"/></li>
                    </ul>
                    <p class="leftBtn1"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/sparta/1501_roll_arr_l.png"></a></p>
                    <p class="rightBtn1"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/sparta/1051_roll_arr_r.png"></a></p>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_t2.png" alt="양해" />
            </div>
            <div id="tab4" class="tabContents tabs4">       
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1586_04_content.jpg"  title="" />      
            </div>             
        </div>         

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:8000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:900,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft1").click(function (){
                slidesImg2.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg2.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:8000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:900,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });

        /*탭(텍스터버전)*/
    $(document).ready(function(){
        $(".tabContents").hide();
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){
        var activeTab = $(this).attr("href");
        $(".tabContaier ul li a").removeClass("active");
        $(this).addClass("active");
        $(".tabContents").hide();
        $(activeTab).fadeIn();
        return false;
        });
    });

    </script>
@stop