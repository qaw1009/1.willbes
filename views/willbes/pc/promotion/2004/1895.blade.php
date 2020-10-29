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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:#EBEFF2;}
        .wb_01  {background:#fff;}
        .wb_02  {background:#ADBBC8;}
        .wb_03  {background:#E1D3CA;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1895_top.jpg" alt="" />  
        </div>       

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1895_01.jpg" alt="" />  
        </div>     

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1895_02.jpg" alt="" />  
        </div>     

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1895_03.jpg" alt="" usemap="#Map1895a" border="0" />
            <map name="Map1895a" id="Map1895a">
                <area shape="rect" coords="228,1669,887,1775" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605006" target="_blank" />
            </map>   
        </div>     

    </div>
    <!-- End Container -->

    <script>

    </script>

@stop