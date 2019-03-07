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

        .wb_top {background:#2c2c2c url(http://file3.willbes.net/new_cop/2019/01/EV190111_p1_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#545454}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#f3f3f3}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_p1.png"  alt="1" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_p2.png"  alt="2" />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_p3.png"  alt="3" usemap="#p1" />
            <map name="p1" id="p1">
                <area shape="rect" coords="440,518,771,581" href="http://www.willbescop.net/notice/view.html?topMenuType=F&topMenuGnb=FM_008&topMenu=MAIN&menuID=FM_008_001&topMenuName=ÀÏ¹Ý°æÂû&BOARD_MNG_SEQ=NOTICE_000&NOTICETYPE=notice&INCTYPE=view&currentPage=1&BOARD_SEQ=138233&PARENT_BOARD_SEQ=0&searchEventNo=undefined&SEARCHKIND=&SEARCHTEXT=" onfocus='this.blur()'  target="_blank" alt="더많은적중사례보러가기">
            </map>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_p4.png"  alt="3"  usemap="#p2" />
            <map name="p2" id="p2">
                <area shape="rect" coords="291,831,577,893" href="/lecture/index/cate/3001/pattern/only" onfocus='this.blur()'  target="_blank" alt="온라인강의 신청">
                <area shape="rect" coords="635,831,917,893" href="/pass/offLecture/index" onfocus='this.blur()' target="_blank" alt="학원강의 신청">
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
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