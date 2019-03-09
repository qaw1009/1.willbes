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

        .wb_top {background:#222 url(http://file3.willbes.net/new_gosi/2018/08/EV180829_1_bg.png) no-repeat center top; position:relative;}
        .wb_cts01 {background:#303644;}
        .wb_cts02 {background:#edeef0;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180829_1.gif"alt="윌비스7/9급아침실전모의고사"/>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180829_2.png"alt="기미진"/>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180829_3.png"alt="하프모의고사"/>
        </div>
        <!--wb_cts02//-->

    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */
        });
    </script>
@stop