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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:absolute;
            top:20px;
            right:10px;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .wb_top {background:#f25824 url(http://file3.willbes.net/new_cop/basic/EVbasic_20190211_p1_bg.jpg) no-repeat top}
        .wb_cts01 {background:#fff}
        .wb_cts02 {background:#ededed}
        .wb_cts03 {background:#3c3c3c url(http://file3.willbes.net/new_cop/basic/EVbasic_20190211_p4_bg.jpg) no-repeat top}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="http://file3.willbes.net/new_cop/basic/EVbasic_20190211_p1.png"  alt="메인" usemap="#link1" />
            <map name="link1" >
                <area shape="rect" coords="855,208,1089,404" href="http://www.willbescop.net/lecture/passLectuerSJong.html?topMenu=081&topMenuName=일반경찰&topMenuType=F&leftMenuLType=M0301&newlearningCD=M0311&lecKType=N" onfocus='this.blur()' alt="개강" target="_blink"/>
            </map>

        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/basic/EVbasic_20190211_p2.jpg"  alt="언론" usemap="#link2" />
            <map name="link2" >
                <area shape="rect" coords="82,524,286,577" href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170126_p&topMenuType=O#main" onfocus='this.blur()' alt="언론보도" target="_blink"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/basic/EVbasic_20190211_p3.png"  alt="과정안내" />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <ul>
                <li><img src="http://file3.willbes.net/new_cop/basic/EVbasic_20190122_p4_1.png"  alt="신광은경찰팀"/></li>
                <li>
                    <iframe width="854" height="480" src="https://www.youtube.com/embed/re8w_IFAPS4?rel=0" frameborder="0" allowfullscreen></iframe>
                </li>
                <li><img src="http://file3.willbes.net/new_cop/basic/EVbasic_20190211_p4_2.png"  alt="수강신청하기"  usemap="#link3"/></li>
            </ul>

            <map name="link3" >
                <area shape="rect" coords="482,120,726,326" href="http://www.willbescop.net/lecture/passLectuerSJong.html?topMenu=081&topMenuName=일반경찰&topMenuType=F&leftMenuLType=M0301&newlearningCD=M0311&lecKType=N" onfocus='this.blur()' alt="신광은경찰팀 일반공채" target="_blink"/>
            </map>
        </div>

    </div>
    <!-- End Container -->


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
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */
        });
    </script>
@stop