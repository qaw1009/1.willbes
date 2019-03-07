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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_cts01 {background:#ffdb2f url(http://file3.willbes.net/new_cop/2019/03/EV190304_c1_bg.jpg) no-repeat center top}
        .wb_cts02 {background:#e8edf0 url(http://file3.willbes.net/new_cop/2019/03/EV190304_c2_bg.jpg) repeat-x center top}

        /* 탭 */
        .tabContaier{width:100%; text-align:center;}
        .tabContaier ul {width:100%; max-width:1120px; text-align:center; ; margin:0 auto;}
        .tabContaier li {display:inline; float:left; }
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}

        .wb_cts04 {background:#fff; position:relative;}
        .wb_cts04 .video {position:absolute; top:842px; left:50%; margin-left:50px; width:456px; z-index:1}
        .wb_cts04 iframe {width:456px; height:253px}
        .wb_cts05 {background:#b8bab9 url(http://file3.willbes.net/new_cop/2019/03/EV190304_c6_bg.jpg) no-repeat center top;}
        .wb_cts06 { background:#fff url(http://file3.willbes.net/new_cop/2019/03/EV190304_c7_bg.jpg) no-repeat center top;}


    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c1.png" alt="윌비스신광은경찰학원 노량진 24시" usemap="#Map190325_c1" border="0"  />
            <map name="Map190325_c1" >
                <area shape="rect" coords="139,926,327,962" href="/movie/event.html?event_cd=On_180122_c&topMenuType=O#main" target="_blank" alt="초시생" />
                <area shape="rect" coords="796,926,987,961" href="/movie/event.html?event_cd=On_181127_c" target="_blank" alt="N수생"  />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <div class="tabContaier">
                <ul class="cf">
                    <li>
                        <a class="active" href="#tab1">
                            <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c2_tap1.jpg"  class="off" alt="초시생"/>
                            <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c2_tap1on.jpg" class="on"  />
                        </a>
                    </li>
                    <li>
                        <a  href="#tab2">
                            <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c2_tap2.jpg"  class="off" alt="N수생"/>
                            <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c2_tap2on.jpg" class="on"  />
                        </a>
                    </li>
                </ul>

                <div class="tabContents " id="tab1" >
                    <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c3_1.jpg" usemap="#Map190325_c3" border="0" /><br>
                    <map name="Map190325_c3" >
                        <area shape="rect" coords="180,717,390,746" href="http://www.willbescop.net/event/movie/event.html?event_cd=Off_basic&EventReply=Y&topMenuType=F#main" target="_blank" />
                    </map>
                    <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c3_2.jpg" />
                </div>

                <div class=" tabContents " id="tab2">
                    <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c4_1.jpg" usemap="#Map190325_c4" border="0" /><br>
                    <map name="Map190325_c4" >
                        <area shape="rect" coords="707,718,943,745" href="http://www.willbescop.net/lecture/passLectuerSJong.html?topMenu=081&topMenuName=일반경찰&topMenuType=F&leftMenuLType=M0301&newlearningCD=M0312&lecKType=N" target="_blank"/>
                    </map>
                    <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c4_2.jpg" usemap="#Map190325_c5" border="0" />
                    <map name="Map190325_c5" >
                        <area shape="rect" coords="714,590,942,617" href="http://www.willbescop.net/movie/event.html?event_cd=Off_171031_p&topMenuType=F#main" target="_blank"/>
                    </map>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <div class="video">
                <iframe src="https://www.youtube.com/embed/gFlsobT5PH0?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c5.jpg" alt="SPECIAL EVENT " />
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c6.png" alt="윌비스신광은경찰학원만의 합격 솔루션  " usemap="#Map190325_c2" border="0" />
            <map name="Map190325_c2" >
                <area shape="rect" coords="120,653,312,686" href="http://www.willbescop.net/movie/event.html?event_cd=Off_superpass&topMenuType=F"  target="_blank" alt="2019 윌비스신광은경찰팀 SUPER PASS"/>
                <area shape="rect" coords="630,653,822,686" href="http://www.willbescop.net/movie/event.html?event_cd=sparta&topMenuType=F" target="_blank" alt="윌비스신광은경찰팀 스파르타"/>
                <area shape="rect" coords="120,1054,311,1087" href="http://www.willbescop.net/gosi/event.html?event_cd=Off_180828_g&topMenuType=F" target="_blank" alt="경찰 통합 생활 관리반"/>
                <area shape="rect" coords="630,1054,823,1085" href="http://www.willbescop.net/counsel/counsel_step1.html?BOARDTYPE=counselReserve&INCTYPE=counsel_step1&BOARD_MNG_SEQ=CR_000&topMenuType=F&topMenuGnb=FM_006&topMenu=081&topMenuName=AI¹Y°æAu&menuID=FM_006_002" target="_blank" alt="1:1 심층상담 / 컨설팅"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190304_c7.png" alt="믿고 선택해주신만큼 항상 여러분의 합격만을 생각하는 윌비스신광은경찰이 되겠습니다. " />
        </div><!--wb_cts06//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
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