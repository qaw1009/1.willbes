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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/03/1023_top_bg.jpg) no-repeat center top}
        .wb_cts02 {background:#201f1f url(https://static.willbes.net/public/images/promotion/2019/03/1023_01_bg.jpg) no-repeat center top}
        .bannerImg3 {position:relative; width:966px; margin:0 auto; padding-bottom: 124px}
        .wb_cts02 ul {width:100%; margin:0 auto}        
        .wb_cts02 ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#fff;}
        .wb_cts04 {background:#e9e8e8;}
        .wb_cts05 {background:url(https://static.willbes.net/public/images/promotion/2019/03/1023_04_bg.jpg) no-repeat center top}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1023_top.jpg" title="적중은 역시 신광은입니다."  />
            <div><iframe width="886" height="497" src="https://www.youtube.com/embed/3iEgf4R4oHU?rel=0" frameborder="0" allowfullscreen></iframe></div>
        </div><!--wb_cts01//-->


        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1023_01.jpg" title="기적이 아닌, 당연한 결과입니다."/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1023_01_01.jpg" title="지난 시험대비 45점 상승!"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1023_01_02.jpg" title="교수님 말씀이 다 맞아요!"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1023_01_03.jpg" title="기출, 그것이 신의 한수!"/></li>
                    {{--<li><img src="https://static.willbes.net/public/images/promotion/2019/03/1023_01_04.jpg" title="따라만 가도 100점!"/></li>--}}
                </ul>
            </div>
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1023_02_1.jpg" title="빈틈없는 적중을 직접 확인하세요!" usemap="#Map1023A" border="0" /><br>
            <map name="Map1023A" id="Map1023A">
                <area shape="rect" coords="424,369,700,431" href="{{ site_url('/pass/support/notice/show?board_idx=212095&s_keyword=%EC%A0%81%EC%A4%91') }}" target="_blank" title="더 많은 적중사례 보러가기" />
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1023_02_2.jpg" title="완벽적중" />
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1023_03.jpg" title="필합 커리큘럼" usemap="#Map1023B" border="0" />
            <map name="Map1023B" id="Map1023B" >
                <area shape="rect" coords="288,1063,553,1147" href="{{ site_url('/professor/show/cate/3001/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95&tab=open_lecture') }}" target="_blank" title="온라인강의신청" />
                <area shape="rect" coords="572,1064,829,1150" href="{{ site_url('/pass/professor/show/prof-idx/50548/?cate_code=3010&subject_idx=1057&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95&tab=open_lecture') }}"  target="_blank" title="학원강의신청"/>
            </map>
        </div><!--wb_cts08//-->

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1023_04.jpg" title="적중, 신광은이 정답입니다."  />
        </div><!--wb_cts09//-->

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                auto:true,
                speed:750,
                pause:5000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:966,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>


@stop