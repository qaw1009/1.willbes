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

        .evt_top{background:url(https://static.willbes.net/public/images/promotion/2019/10/1444_top_bg.jpg) no-repeat center top;}
        .evt01,.evt03{background:#fff;}
        .evt02{background:#2a387f;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:1120px; margin:0 auto}
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

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1444_top.jpg" />        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1444_01.jpg"  alt=""/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1444_01_1.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1444_01_2.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/10/1444_01_3.png" /></li>           
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2019/09/1009_01_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2019/09//1009_01_arrowR.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1444_02.jpg" usemap="#Map1444a" border="0" />
            <map name="Map1444a" id="Map1444a">
                <area shape="rect" coords="390,637,748,781" href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/157684" target="_blank" />
            </map>          
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1444_03.jpg" usemap="#Map1444b" border="0" />
            <map name="Map1444b" id="Map1444b">
                <area shape="rect" coords="344,753,785,862" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605006" target="_blank" />
            </map>                         
        </div>

    </div>
    <!-- End evtContainer -->
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop