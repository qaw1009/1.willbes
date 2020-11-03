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
        .wb_top {background:#C2C2C2 url("https://static.willbes.net/public/images/promotion/2020/11/1899_top_bg.jpg") center top no-repeat}

        .wb_03  {background:#ADBBC8 url("https://static.willbes.net/public/images/promotion/2020/11/1899_03_bg.jpg") center top no-repeat}

        .wb_04  {background:#E1D3CA;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_top.jpg" alt="" />  
        </div>       

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_01.jpg" alt="" />  
        </div>     

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_02.jpg" alt="" />  
        </div>     

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_03.jpg" alt="" />  
        </div> 

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1899_04.jpg" alt="" usemap="#Map1899a" border="0" />
            <map name="Map1899a" id="Map1899a">
                <area shape="rect" coords="218,843,432,909" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/174277" target="_blank" />
                <area shape="rect" coords="689,841,903,907" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/174276" target="_blank" />
                <area shape="rect" coords="214,1503,439,1571" href="javascript:alert('개강 일정에 맞추어 공개됩니다.')" />
                <area shape="rect" coords="687,1505,907,1571" href="javascript:alert('개강 일정에 맞추어 공개됩니다.')" />
            </map>
        </div>  

    </div>
    <!-- End Container -->

    <script>

    </script>

@stop