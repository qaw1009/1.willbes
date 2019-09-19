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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1400_top_bg.jpg) center top no-repeat}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#f2efe3;position:relative;height:815px;}
        .wb_cts04 {background:#f4f5f6}
        .wb_cts05 {background:#232323}


        /* 슬라이드배너 */
        .bannerImg1 {position:relative; width:513px; margin:0 auto;z-index:10;left:50%;margin-left:50px;bottom:250px;}
        .bannerImg1 p {position:absolute;width:65px; z-index:100;}       
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:-15%;top:40%;width:65px; height:65px;}
        .bannerImg1 p.right_arr {right:-15%;top:40%; width:65px; height:65px;}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:290px;
        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
    {{--
        <div class="skybanner">
            <a href="{{ site_url('/promotion/index/cate/3019/code/1067') }}" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" title="환승이벤트" >
            </a>
        </div>
        --}}

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1400_top.jpg" title="" />          
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02"  id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1400_01.jpg" usemap="#Map1400a" title="" border="0" />
            <map name="Map1400a" id="Map1400a">
                <area shape="rect" coords="746,631,984,801" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4&tab=qna&series=" target="_blank" />
                <area shape="rect" coords="297,1334,558,1464" href="http://play.afreecatv.com/DHLAWRENCE31" target="_blank" />
                <area shape="rect" coords="565,1334,824,1466" href="https://www.youtube.com/channel/UCPmdjTx3UUKCFt40KtRRdUQ" target="_blank" />
            </map>        
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1400_02.png" title="" />     
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1400_02_text1.png" title="1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1400_02_text2.png" title="2"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1400_02_text3.png" title="3"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/09/1400_left.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/09/1400_right.png"></a></p>
            </div>  
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1400_03.jpg" usemap="#Map1400b" title="" border="0" />
            <map name="Map1400b" id="Map1400b">
                <area shape="rect" coords="123,704,274,752" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154891" target="_blank" />
                <area shape="rect" coords="123,865,272,911" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154897" target="_blank" />
                <area shape="rect" coords="122,917,273,962" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank" />
                <area shape="rect" coords="123,966,274,1012" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146632" target="_blank" />
                <area shape="rect" coords="121,1083,274,1133" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank" />
                <area shape="rect" coords="352,656,523,698" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145623" target="_blank" />
                <area shape="rect" coords="349,706,523,750" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156740" target="_blank" />
                <area shape="rect" coords="352,756,522,801" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154900" target="_blank" />
                <area shape="rect" coords="350,887,525,935" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156355" target="_blank" />                    
                <area shape="rect" coords="352,942,523,984" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146299" target="_blank" />
                <area shape="rect" coords="617,705,764,752" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" />
                <area shape="rect" coords="616,915,767,962" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145826" target="_blank" />
                <area shape="rect" coords="616,1084,768,1133" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" />
                <area shape="rect" coords="843,658,1014,697" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146742" target="_blank" />
                <area shape="rect" coords="842,757,1014,800" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156673" target="_blank" />
                <area shape="rect" coords="842,867,1013,909" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146966" target="_blank" />              
                <area shape="rect" coords="843,966,1015,1009" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147110" target="_blank" />
                <area shape="rect" coords="843,1091,1015,1133" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154901" target="_blank" />
            </map>   
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1400_04.jpg" usemap="#Map" title="" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="60,657,226,701" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150364" target="_blank" />
                <area shape="rect" coords="268,656,437,704" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150363" target="_blank" />
                <area shape="rect" coords="479,657,645,704" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150362" target="_blank" />                    
                <area shape="rect" coords="689,657,856,703" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152604" target="_blank" />
                <area shape="rect" coords="899,656,1068,706" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147104" target="_blank" />
                <area shape="rect" coords="829,806,1064,915" href="https://pass.willbes.net/promotion/index/cate/3019/code/1193" target="_blank" />
            </map>
        </div>
        <!--wb_cts06//-->

    </div>
    <!-- End Container -->

    <script>
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
    </script>

@stop