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

        .skybanner {
            position:absolute;
            top:400px;
            right:10px;
            z-index:1;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .wb_top {background:#0c2c6f url(http://file3.willbes.net/new_cop/2018/01/EV180125_p1_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#375da6;}
        .wb_cts02 {background:#2c2c2c; padding-bottom:150px}
        .wb_cts03 {background:#f3f3f3;}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="skybanner">
            <a href="http://www.willbescop.net/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=083&menuID=&searchUserId=wcb302"><img src="http://file3.willbes.net/new_cop/2018/01/EV180125_p_sky.png" usemap="#sky" alt="할인이벤트"></a>
        </div>

        <div class="evtCtnsBox wb_top"  id="main">
            <img src="http://file3.willbes.net/new_cop/2018/01/EV180125_p1.png"  alt="정태정 " />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2018/01/EV180125_p2.png"  alt="해양경찰학개론 " />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2018/01/EV180125_p3.png"  alt="동영상" /><Br>
            <iframe width="854" height="480" src="https://www.youtube.com/embed/AV4HCuTvW24?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2018/01/EV180125_p4.png"  alt="커리큘럼 & 강의신청" usemap="#p1"  />
            <map name="p1" id="p1">
                <area shape="rect" coords="173,1042,446,1105" href="http://www.willbescop.net/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=088&menuID=&searchUserId=wcb302" onfocus='this.blur()'  alt="온라인강의 신청" target="_blink">
                <area shape="rect" coords="513,1042,786,1105" href="http://busan.willbes.net/pass/018/index.html?topMenu=018&topMenuName=해양경찰특채&topMenuType=F&topMenuGnb=FM_001" onfocus='this.blur()'  alt="학원강의 신청" target="_blink">
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