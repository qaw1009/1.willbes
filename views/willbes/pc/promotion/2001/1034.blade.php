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

        .wb_top {background:#424ac7}
        .wb_01 {background:#efefef}
        .wb_02 {background:#313c4e}
        .wb_03 {background:#ececec;}
        .wb_03_con2 {position:relative; width:1210px; margin:0 auto; position:relative !important}
        .wb_03_con2 p {position:absolute; top:45%; width:67px; height:67px; margin-top:-33px; z-index:100}
        .wb_03_con2 p a {cursor:pointer}
        .wb_03_con2 p.leftBtn {left:100px}
        .wb_03_con2 p.rightBtn {right:100px}

        .wb_04 {background:#ececec; padding-bottom:100px;}
        .wb_04_con2 {position:relative; width:1210px; margin:0 auto; position:relative !important}
        .wb_04_con2 p {position:absolute; top:45%; width:67px; height:67px; margin-top:-33px; z-index:100}
        .wb_04_con2 p a {cursor:pointer}
        .wb_04_con2 p.leftBtn {left:100px}
        .wb_04_con2 p.rightBtn {right:100px}

        .wb_06 {background:#ffffff;}


    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p1_new2.png" alt="장정훈 경찰학개론 라이브 무료 숫자특강" usemap="#new2" />
            <map name="new2" id="new2">
                <area shape="rect" coords="330,892,882,998" href="http://www.willbescop.net/lecture/movieLectureFreeDetail.html?topMenu=081&topMenuType=O&searchTopCategoryCode=081&searchSubjectCode=1005&leftMenuLType=M0000&lecKType=F&learningCD=M0000&FREE_TAB=ALL&searchLeccode=F201800247" target="_blank" alt="수강신청" />
            </map>
        </div>

        <div class="evtCtnsBox wb_02" >
            <img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p3.png"  alt="필수수강" />
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p4_1_new.jpg"  alt="타이틀" usemap="#more1" />
            <map name="more1" id="more1">
                <area shape="rect" coords="562,390,762,431" href="http://www.willbescop.net/movie/event.html?event_cd=Off_180907_p&topMenuType=F" alt="더많은수기보기" target="_blank" />
            </map>
            <div class="wb_04_con2">
                <ul id="slidesImg2">
                    <li><img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p4_roll1.jpg" alt="1" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p4_roll2.jpg" alt="2" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p4_roll3.jpg" alt="3" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p4_roll4.jpg" alt="4" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft2"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_prev.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight2"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_next.png" alt="다음" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_06">
            <img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p4_4.png"  alt="경찰합격대세"/><br>
            <iframe width="854" height="480" src="https://www.youtube.com/embed/TGdcX7j5EAI?rel=0" frameborder="0" allowfullscreen></iframe><br>
            <img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p4_5.png"  alt="더보기" usemap="#more2" />
            <map name="more2" id="more2">
                <area shape="rect" coords="558,78,812,127" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" alt="더많은영상보기" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_01" >
            <img src="http://file3.willbes.net/new_cop/2018/10/EV181027_p2_new1.png"  alt="경찰합격대세" usemap="#go"/>
            <map name="go" id="go">
                <area shape="rect" coords="218,543,761,624" href="http://www.willbescop.net/lecture/movieLectureFreeDetail.html?topMenu=081&topMenuType=O&searchTopCategoryCode=081&searchSubjectCode=1005&leftMenuLType=M0000&lecKType=F&learningCD=M0000&FREE_TAB=ALL&searchLeccode=F201800247" target="_blank" alt="장정훈경찰학개론숫자특강무료신청GO" />
            </map>
        </div>

    </div>
    <!-- End Container -->


    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                autoHover: true,
                pager:false,
            });

            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });
            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });
    </script>

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                    $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
                }
                else {
                    $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
                }
            });
        } );

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>

@stop