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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }
        .skybanner ul {border:1px solid #000; border-bottom:none}
        .skybanner a {height:40px; line-height:40px; display:block; text-align:center; background:#009ef5; color:#fff; font-size:14px !important; font-weight:600 !important; border-bottom:1px solid #000}
        .skybanner a:hover {background:#fff; color:#000}
        .skybanner li:last-child a {background:#000; color:#fff;}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1024_top_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 span {position:absolute; width:520px; top:724px; left:50%; margin-left:-469px; background:#000; z-index:10}
        .wb_cts01 iframe {width:520px; margin:0 auto; height:300px}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1024_01_bg.jpg) no-repeat center top}
        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2019/05/EV190118Y_03_bg.jpg) repeat-x top left; position:relative}
        .wb_cts04 {background:#029ffe}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:600px; margin:0 auto; padding:0 0 100px}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-80px}
        .slide_con p.rightBtn {right:-80px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_skybanner.png" alt="장정훈 경찰학" />
            <ul>
                <li><a href="#wb_cts02">수강생후기</a></li>
                <li><a href="#wb_cts03">완벽적중</a></li>
                <li><a href="#wb_cts04">커리큘럼</a></li>
                <li><a href="/professor/show/cate/3001/prof-idx/50031/?subject_idx=1005&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank">온라인수강신청</a></li>
                <li><a href="/pass/professor/show/prof-idx/50032/?cate_code=3010&subject_idx=1058&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank">학원수강신청</a></li>
                <li><a href="#evtContainer">TOP ▲</a></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_cts01" id="wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_top.jpg" alt="장정훈 경찰학" />
            <span><iframe src="https://www.youtube.com/embed/CoKbcIug98o?rel=0" frameborder="0" allowfullscreen></iframe></span>
        </div>       

        <div class="evtCtnsBox wb_cts02" id="wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_01.jpg" alt="수강후기" />
        </div>

        <div class="evtCtnsBox wb_cts03" id="wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_02.jpg"  alt="완벽적중" usemap="#Map1204A" border="0" />
            <map name="Map1204A" id="Map1204A">
                <area shape="rect" coords="359,431,757,519" href="https://police.willbes.net/pass/support/notice/show?board_idx=227154" target="_blank" alt="더 많은 적중 사례 확인하기" />
            </map>
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1024_s01.jpg" alt="5번,6번" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1024_s02.jpg" alt="9번" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1024_s03.jpg" alt="12번" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/05/1024_s04.jpg" alt="15번" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/05/1024_s05.jpg" alt="20번" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_cop/2017/09/EV170922_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_cop/2017/09/EV170922_p_next.png"></a></p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_02_title.jpg" alt="2019년 1차 경찰학 적중 내역" /><br><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_02_01.jpg" alt="2019년 1차 경찰학 적중 내역" /><br><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_02_02.jpg" alt="2019년 1차 경찰학 적중 내역" /><br><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_02_03.jpg" alt="2019년 1차 경찰학 적중 내역" /><br><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_02_04.jpg" alt="2019년 1차 경찰학 적중 내역" /><br><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_02_05.jpg" alt="2019년 1차 경찰학 적중 내역" />
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_03.jpg" alt="커리큘럼" usemap="#Map190118" border="0"/>
            <map name="Map190118" id="Map190118">
                <area shape="rect" coords="124,879,570,965" href="{{ site_url('/professor/show/cate/3001/prof-idx/50031/?subject_idx=1005&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture') }}" target="_blank" alt="온라인강의신청" />
                <area shape="rect" coords="640,878,1088,965" href="{{ site_url('/pass/professor/show/prof-idx/50032/?cate_code=3010&subject_idx=1058&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture') }}" target="_blank" alt="학원강의신청" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:600,
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
        $(function(e) {
            var targetOffset = $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop