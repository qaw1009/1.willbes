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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/03/1177_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fff}
        .evt02 {background:#ececec; padding-bottom:100px}
        .evt03 {background:#9f0f32}

        /* 슬라이드배너 */
        .bannerimg {position:relative; width:980px; margin:0 auto}
        .bannerimg p {position:absolute; top:50%; width:50px; z-index:100}
        .bannerimg img {width:100%}
        .bannerimg p a {cursor:pointer}
        .bannerimg p.leftBtn {left:-30px; top:50%; margin-top:-25px; width:50px; height:50px}
        .bannerimg p.rightBtn {right:-30px; top:50%; margin-top:-25px; width:50px; height:50px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1177_top.jpg" usemap="#Map1177A" title="김원욱 형법 2019년 최신기출 및 최신판례" border="0">
            <map name="Map1177A">
              <area shape="rect" coords="84,806,555,883" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&subject_idx=1056&prof_idx=50298" target="_blank" alt="학원수강신청">
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1177_01.jpg" title="시험전,수강생공부방법">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1177_02.jpg" title="교수님 수기확인하기">
            <div class="bannerimg">
              <ul id="slidesImg2">
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1177_02_r1.jpg" title="수강평1"></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1177_02_r2.jpg" title="수강평2"></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1177_02_r3.jpg" title="수강평3"></li>
              </ul>
              <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/03/1177_02_pre.png" title="back"></a></p>
              <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/03/1177_02_next.png" title="next"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1177_03.jpg" usemap="#Map1177B" title="최신기출 및 최신판례신청하기" border="0">
            <map name="Map1177B">
              <area shape="rect" coords="216,434,898,503" href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&subject_idx=1056&prof_idx=50298') }}" target="_blank" alt="신청하기">
            </map>
        </div>
	  </div>
    <!-- End Container -->

    <script>
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg2").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1210,
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 500);
            /*e.preventDefault(); */
        });
    </script>

@stop