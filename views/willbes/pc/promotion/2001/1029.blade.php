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

        .wb_top {background:#b8c6b8 url(http://file3.willbes.net/new_cop/2019/01/EV190114_bg01.jpg) no-repeat center}
        .wb_cts01 {background:#2b2a3f url(http://file.willbes.net/new_image/2016/02/EV160224_bg02.jpg)}
        .wb_cts02 {background:#c39866 url(http://file.willbes.net/new_image/2016/02/EV160224_bg03.jpg)}
        .wb_cts03 {background:url(http://file.willbes.net/new_image/2016/02/EV160224_bg04.jpg)}
        .wb_cts04 {background:url(http://file.willbes.net/new_image/2015/07/EV150713_bg03.jpg)}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190114_p1.png" alt="서울대 국어정통파 완벽적중" />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2018/09/EV180914_c4.jpg" alt="실용글쓰기 하나로 충분합니다" />
            <img src="http://file3.willbes.net/new_cop/2018/09/EV180914_c5.jpg" alt="박우찬 실용글쓰기여야 하는 이유는 명확합니다." />
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file.willbes.net/new_image/2016/02/EV160224_c6.jpg" alt="실용글쓰기 타파!" />
            <img src="http://file.willbes.net/new_image/2015/07/EV150713_c5.jpg" alt="2교시 서술형 문제 대비방법" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190114_p2.jpg" alt="2016년 실용글쓰기 시험일정" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190114_p3.jpg" alt="박우찬 실용글쓰기 EVENT" usemap="#Map160224_c1" border="0" />
            <map name="Map160224_c1" id="Map160224_c1">
                <area shape="rect" coords="526,581,999,650" href="/lecture/index/cate/3001/pattern/only" target="_blank" onFocus="this.blur();" />
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
    </script>


@stop