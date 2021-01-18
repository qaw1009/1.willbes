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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/1345_top_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 {background:#FFF;}
        .wb_cts02 {background:#0D8C9F;}
        .wb_cts03 {background:#FFF;}
        .wb_cts04 {background:#EDF5F7;}    

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1345_top.jpg" alt="윌비스 이론패키지" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1345_01.jpg" alt="합격권 실력의 기초"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1345_02.jpg" alt="초반 이론 학습"> 
        </div>

        <div class="evtCtnsBox wb_cts03" id="careful" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1345_03.jpg" alt="이런 분들이 수강하시면 좋아요."/>
        </div>

        <div class="evtCtnsBox wb_cts04">            
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1345_04.jpg" alt="본인에게 딱 맞는 학습 전략" usemap="#Map1345_apply" border="0"/>
            <map name="Map1345_apply" id="Map1345_apply">
                <area shape="rect" coords="705,561,938,619" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/178083" target="_blank" />
            </map>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
      
    </script>

@stop