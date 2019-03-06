@extends('willbes.pc.layouts.master')

@section('content')
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:absolute;
            top:20px;
            right:0;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .top {background:#00acec url(http://file3.willbes.net/new_cop/2017/11/EV171129_p1_bg.gif) no-repeat center;}
        .free1 {background:#fff;}
        .free2 {background:#2b3541;}
        .free3 {background:#f5f5f5;}
        .free4 {background:#fff;}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="http://www.willbescop.net/lecture/movieLectureFreeList.html?topMenu=081&topMenuName=일반경찰&topMenuType=O&leftMenuLType=M0000&lecKType=F&FREE_TAB=TAB_001" target="_self">
                <img src="http://file3.willbes.net/new_cop/2017/11/EV171129_p_sky.png" alt="스카이스크래퍼" />
            </a>
        </div>

        <div class="evtCtnsBox top"  id="main">
            <img src="http://file3.willbes.net/new_cop/2017/11/EV171129_p1.png"  alt="0원특강" usemap="#zero" />
            <map name="zero" id="zero">
                <area shape="rect" coords="242,1462,735,1583" href="https://www.local.willbes.net/member/join/?ismobile=0&sitecode=2001" onfocus='this.blur()'  alt="0원특강">
            </map>
        </div>

        <div class="evtCtnsBox free1" id="free1">
            <img src="http://file3.willbes.net/new_cop/2017/11/EV171129_p2.jpg"  alt="교수님소개" />
        </div>

        <div class="evtCtnsBox free2" id="free2">
            <img src="http://file3.willbes.net/new_cop/2017/11/EV171129_p3.jpg"  alt="교재" />
        </div>

        <div class="evtCtnsBox free3" id="free3">
            <img src="http://file3.willbes.net/new_cop/2017/11/EV171129_p4.jpg"  alt="0원특강소개" />
        </div>

        <div class="evtCtnsBox free4" id="free4">
            <img src="http://file3.willbes.net/new_cop/2017/11/EV171129_p5.jpg"  alt="무료수강방법안내" />
        </div>

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
            <script>
                <script>
                $(function(e){
                    var targetOffset= $("#evtContainer").offset().top;
                    $('html, body').animate({scrollTop: targetOffset}, 700);
                    /*e.preventDefault(); */
                });

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
            </script>


@stop