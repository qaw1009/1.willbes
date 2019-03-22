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

        .wb_cts01 {background:#2470e8 url(http://file3.willbes.net/new_cop/2018/12/EV181218_c1_bg.jpg) center top no-repeat;}
        .wb_cts02 {background:#ffffff;}
        .wb_cts03 {background:#eeebeb;}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2018/12/EV181218_c1.png" alt="2019 KCG 해양경찰특채 기출·예상문제풀이" usemap="#Map181218_c1" border="0"  />
            <map name="Map181218_c1" >
                <area shape="rect" coords="322,895,864,1030" href="#event" />
            </map>
        </div><!--WB_cts01//-->


        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2018/12/EV181218_c2.jpg" alt="합격을 원하는 수험생들이 들어야 할 필수 강의"  /><BR>
            <img src="http://file3.willbes.net/new_cop/2018/12/EV181218_c3.jpg" alt=""  />
        </div><!--WB_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="event" >
            <img src="http://file3.willbes.net/new_cop/2018/12/EV181218_c4.jpg" alt="" usemap="#Map181218_c2" border="0"  />
            <map name="Map181218_c2" >
                <area shape="rect" coords="863,345,1025,412" href="{{ site_url('/lecture/show/cate/3008/pattern/only/prod-code/132111') }}"  target="_blank" onfocus="this.blur();" />
                <area shape="rect" coords="868,419,1020,476" href="{{ site_url('/lecture/show/cate/3008/pattern/only/prod-code/132114') }}" target="_blank" onfocus="this.blur();" />
                <area shape="rect" coords="866,481,1019,541" href="{{ site_url('/lecture/show/cate/3008/pattern/only/prod-code/132115') }}" target="_blank" onfocus="this.blur();" />
                <area shape="rect" coords="869,605,1021,666" href="{{ site_url('/lecture/show/cate/3008/pattern/only/prod-code/132116') }}" target="_blank" onfocus="this.blur();" />
                <area shape="rect" coords="869,670,1020,731" href="{{ site_url('/lecture/show/cate/3008/pattern/only/prod-code/132117') }}" target="_blank" onfocus="this.blur();" />
                <!--종합반-->
                <area shape="rect" coords="867,929,1043,1008" href="{{ site_url('/package/show/cate/3008/pack/648001/prod-code/149533') }}" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="870,1012,1044,1076" href="{{ site_url('/package/show/cate/3008/pack/648001/prod-code/149534') }}" target="_blank" onfocus="this.blur();"/>
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>

@stop