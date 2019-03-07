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

        .wb_top {background:#34b696 url(http://file3.willbes.net/new_cop/2019/01/EV190113_p1_bg.jpg) no-repeat center}
        .wb_cts01 {background:#292b2e url(http://file3.willbes.net/new_cop/2019/01/EV190113_p2_bg.jpg) no-repeat center}
        .wb_cts02 {background:#f5f5f5}
        .wb_cts03 {background:#ececec}
        .wb_cts04 {background:#fff}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" id="main">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190113_p1.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190113_p2.png"  alt="교수소개" />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190113_p3.png"  alt="1" />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190113_p4.png"  alt="2" />
        </div>

        <div class="evtCtnsBox wb_cts04" id="table">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190113_p5.png"  alt="구매하기" usemap="#link2" />
            <map name="link2" >
                <area shape="rect" coords="118,675,264,711" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1029&searchLeccode=D201700090&leftMenuLType=M0001&lecKType=D" onfocus='this.blur()' alt="김현정" target="_blink"/>
                <area shape="rect" coords="417,675,562,711" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1029&searchLeccode=D201800122&leftMenuLType=M0001&lecKType=D" onfocus='this.blur()' alt="김준기" target="_blink"/>
                <area shape="rect" coords="716,675,862,711" href="http://www.willbescop.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=081&topMenuName=&topMenuType=O&searchCategoryCode=081&leftMenuLType=M0002&lecKType=P&searchLeccode=P201700006" onfocus='this.blur()' alt="패키지 " target="_blink"/>
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
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>

@stop