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

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1066_top_bg.jpg) center top no-repeat}
        .wb_cts02 {background:#f8f8f8}
        .wb_cts03 {background:#dbc8b7;}
        .wb_cts04 {background:#f8f8f8}
        .wb_cts05 {background:#f8f8f8}
        .wb_cts06 {background:#242424;padding-bottom:50px;}
        .wb_cts07 {background:#f2efe3;position:relative;height:815px;}
        
        /*신버전*/
        .bannerImg1 {position:relative; width:513px; margin:0 auto;z-index:10;left:50%;margin-left:50px;bottom:250px;}
        .bannerImg1 p {position:absolute;width:65px; z-index:100;}       
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:-15%;top:40%;width:65px; height:65px;}
        .bannerImg1 p.right_arr {right:-15%;top:40%; width:65px; height:65px;}
      
        .skybanner {position:fixed;top:200px;right:0;width:290px;z-index:11;}
        .skybanner2{position:fixed;top:480px;right:-30px;width:290px;z-index:11;}
       
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      
        <div class="skybanner">
            <a href="{{ site_url('/promotion/index/cate/3019/code/1067') }}" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" >
            </a>
        </div>   
        <div class="skybanner2">
            <a href="{{ site_url('/promotion/index/cate/3019/code/1193') }}" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1066_sky.png" title="제니스영어" >
            </a>
        </div> 
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1066_top.jpg" title="" />       
        </div>    

        <div class="evtCtnsBox wb_cts03" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1066_01.jpg" usemap="#Map" title="" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="526,836,786,956" href="https://www.instagram.com/zenithenglishhan" target="_blank" />
                <area shape="rect" coords="793,834,1048,955" href="https://www.youtube.com/channel/UCPmdjTx3UUKCFt40KtRRdUQ" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts07" >
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

        <div class="evtCtnsBox wb_cts04" id="cts04">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_04.png" usemap="#Map1066a" title="제니스영어 커리큘럼" border="0" />
            <map name="Map1066a" id="Map1066a">
                <area shape="rect" coords="337,672,391,698" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154891" target="_blank" />
                <area shape="rect" coords="338,786,389,810" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154897" target="_blank" />
                <area shape="rect" coords="336,846,391,870" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank" />
                <area shape="rect" coords="340,905,388,930" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146632" target="_blank" />
                <area shape="rect" coords="335,979,390,1002" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank" />
                <area shape="rect" coords="534,608,584,630" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145623" target="_blank" />
                <area shape="rect" coords="533,666,583,692" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156740" target="_blank" />
                <area shape="rect" coords="528,723,589,750" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154900" target="_blank" />
                <area shape="rect" coords="533,803,583,828" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156355" target="_blank" />
                <area shape="rect" coords="531,891,583,917" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146299" target="_blank" />
                <area shape="rect" coords="732,672,785,694" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" />
                <area shape="rect" coords="733,843,784,867" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145826" target="_blank" />
                <area shape="rect" coords="731,978,785,1005" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" />
                <area shape="rect" coords="934,622,990,647" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146742" target="_blank" />
                <area shape="rect" coords="937,714,988,737" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156673" target="_blank" />
                <area shape="rect" coords="936,804,990,827" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146966" target="_blank" />
                <area shape="rect" coords="937,889,989,915" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147110" target="_blank" />
                <area shape="rect" coords="934,980,992,1002" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154901" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1066_05.png" title="학습비법패키지수강신청" usemap="#Map1066b" border="0" />
            <map name="Map1066b" id="Map1066b">
                <area shape="rect" coords="75,768,240,810" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150364" target="_blank" alt="기본이론" title="01.기본이론" />
                <area shape="rect" coords="284,767,447,815" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150363" target="_blank" alt="심화실전예비" title="02.심화,실전예비" />
                <area shape="rect" coords="492,768,658,816" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150362" target="_blank" alt="문제해결스킬업" title="03.문제해결스킬업" />
                <area shape="rect" coords="704,765,869,814" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156673" target="_blank" alt="실전실력다지기" title="04.실전실력다지기" />
                <area shape="rect" coords="910,764,1086,814" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147104" target="_blank" alt="파이널" title="05.지방직" />            </map>  
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1066_06.gif" title="학습비법패키지수강신청" usemap="#Map1066c" border="0" />
            <map name="Map1066c" id="Map1066c">
                <area shape="rect" coords="682,37,1066,114" href="https://pass.willbes.net/promotion/index/cate/3019/code/1193" target="_blank" />
            </map>
        </div>
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