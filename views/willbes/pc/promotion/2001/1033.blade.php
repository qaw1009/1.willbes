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

        .wb_top {background:#1f1414 url(http://file3.willbes.net/new_cop/2018/12/181203_01_bg.png) no-repeat center;}
        .wb_cts01 {background:#1f1414;}

        /* 슬라이드배너 */
        .bannerImg1 {position:relative; background:#1f1414; width:980px; margin:0 auto; z-index:10; }
        .bannerImg1 p {position:absolute; top:300px; width:50px; z-index:100}
        .bannerImg1 img {width:100%;}
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:5%;  width:50px; height:50px;}
        .bannerImg1 p.right_arr {right:5%;width:50px; height:50px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_cop/2018/12/181203_01.png"  alt="찍기특강"   usemap="#181203_01" border="0" />
            <map name="181203_01" id="181203_01">
                <area shape="rect" coords="232,741,750,798" href="{{ site_url('/lecture/show/cate/3001/pattern/free/prod-code/147721') }}" target="_blank"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2018/12/181203_02.png"  alt="찍기특강"  />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2018/12/181203_03.png"  alt="찍기특강"  />
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="http://file3.willbes.net/new_cop/2018/12/181203_c01.jpg" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/12/181203_c02.jpg" alt="2"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/12/181203_c03.jpg" alt="3"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="http://file3.willbes.net/new_cop/2018/12/181203_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="http://file3.willbes.net/new_cop/2018/12/181203_arr_r.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <a href="{{ site_url('/lecture/show/cate/3001/pattern/free/prod-code/147721') }}" target="_blank"/><img src="http://file3.willbes.net/new_cop/2018/12/181203_04.png"  alt="찍기특강" /></a>
        </div>

    </div>
    <!-- End Container -->


    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
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

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>

@stop