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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .skyBanner {position:fixed; bottom:20px; right:20px; width:138px; border:1px solid #000; z-index:10;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/09/1386_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#bab5b1 url(https://static.willbes.net/public/images/promotion/2019/09/1386_01_bg.jpg) no-repeat center top;}
        .evt02 {background:#e3e1e2; padding-bottom:150px}
        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; margin-top:-23px; width:27px; height:46px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px;}
        .slide_con p.rightBtn {right:-40px;}

        .evt03 {background:#f4f4f4;}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1386_04_bg.jpg) no-repeat center top;}
        .evt05 {background:#fff000;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_top.jpg" title="신광은 경찰팀 영어집중 관리반">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_01.jpg" title="김현정/김준기 교수">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02.jpg" title="생생 후기">
            <div class="slide_con">
                <ul id="slidesImg">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02_c1.jpg" alt="생생 후기1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02_c2.jpg" alt="생생 후기2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02_c3.jpg" alt="생생 후기3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02_c4.jpg" alt="생생 후기4" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_arrowR.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_03.jpg" title="영어집중 관리반이란?">            
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_04.jpg" title="영어집중관리반이 답이다!">
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_05.gif" usemap="#Map1386A" title="영어 집중 관리반 신청하기" border="0">
            <map name="Map1386A" id="Map1386A">
                <area shape="rect" coords="316,886,800,965" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&amp;campus_ccd=605001&amp;subject_idx=1095" target="_blank" alt="신청하기" />
            </map>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg = $("#slidesImg").bxSlider({
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
                moveSlides:1
                });
            
                $("#imgBannerLeft").click(function (){
                    slidesImg.goToPrevSlide();
                });
            
                $("#imgBannerRight").click(function (){
                    slidesImg.goToNextSlide();
                });
        });
    </script>
@stop