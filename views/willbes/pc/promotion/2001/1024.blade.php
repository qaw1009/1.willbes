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
            top:20px;
            right:10px;
            z-index:1;
        }
        .skybanner ul {border:1px solid #000; border-bottom:none}
        .skybanner a {height:40px; line-height:40px; display:block; text-align:center; background:#009ef5; color:#fff; font-size:14px !important; font-weight:600 !important; border-bottom:1px solid #000}
        .skybanner a:hover {background:#fff; color:#000}
        .skybanner li:last-child a {background:#000; color:#fff;}
        .skybanner_sectionFixed {position:fixed; top:20px}

        .wb_cts01 {background:url(http://file3.willbes.net/new_cop/2019/01/EV190118Y_01_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 span {position:absolute; width:520px; top:724px; left:50%; margin-left:-469px; background:#000; z-index:10}
        .wb_cts01 iframe {width:520px; margin:0 auto; height:300px}
        .wb_cts02 {background:url(http://file3.willbes.net/new_cop/2019/01/EV190118Y_02_bg.jpg) no-repeat center top}
        .wb_cts03 {background:url(http://file3.willbes.net/new_cop/2019/01/EV190118Y_03_bg.jpg) repeat-x top left; position:relative}
        .wb_cts03 span {position:absolute; width:488px; left:50%; margin-left:-550px; z-index:10}
        .wb_cts03 span.jjh01 {top:820px}
        .wb_cts03 span.jjh02 {top:1780px}
        .wb_cts03 span.jjh03 {top:2916px}
        .wb_cts03 span.jjh04 {top:3855px}
        .wb_cts03 span.jjh05 {top:4783px}
        .wb_cts04 {background:#029ffe}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_sky.png" alt="장정훈 경찰학" />
            <ul>
                <li><a href="#wb_cts02">수강생후기</a></li>
                <li><a href="#wb_cts03">완벽적중</a></li>
                <li><a href="#wb_cts04">커리큘럼</a></li>
                <li><a href="/lecture/index/cate/3001/pattern/only" target="_blank">온라인수강신청</a></li>
                <li><a href="/pass/offLecture/index" target="_blank">학원수강신청</a></li>
                <li><a href="#evtContainer">TOP ▲</a></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_cts01" id="wb_cts01">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_01.jpg" alt="장정훈 경찰학" />
            <span><iframe src="https://www.youtube.com/embed/lfcZuf5_uuU?rel=0" frameborder="0" allowfullscreen></iframe></span>
        </div>

        <div class="evtCtnsBox wb_cts02" id="wb_cts02">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_02.jpg" alt="수강후기" />
        </div>

        <div class="evtCtnsBox wb_cts03" id="wb_cts03">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_03.jpg"  alt="완벽적중" />
            <span class="jjh01"><img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_03_03.gif"  alt="3번문제강의" /></span>
            <span class="jjh02"><img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_03_05.gif"  alt="5번문제강의" /></span>
            <span class="jjh03"><img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_03_12.gif"  alt="12번문제강의" /></span>
            <span class="jjh04"><img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_03_14.gif"  alt="14번문제강의" /></span>
            <span class="jjh05"><img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_03_19.gif"  alt="19번문제강의" /></span>
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="wb_cts04">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190118Y_04.jpg" alt="커리큘럼" usemap="#Map190118" border="0"/>
            <map name="Map190118" id="Map190118">
                <area shape="rect" coords="124,879,570,965" href="/lecture/index/cate/3001/pattern/only" target="_blank" alt="온라인강의신청" />
                <area shape="rect" coords="640,878,1088,965" href="/pass/offLecture/index" target="_blank" alt="학원강의신청" />
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