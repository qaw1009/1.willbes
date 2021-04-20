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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2182_top_bg.jpg) no-repeat center top;}

        .wb_cts02 {background:#E9E9E9;}

        .wb_cts03 {background:#2C2C2C;}

    </style> 

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2182_top.jpg" alt="대구 윌비스 스파르타 소방" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2182_01.jpg" alt="전문 교수진"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2182_02.jpg" alt="합격 커리큘럼"/>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2182_03.jpg" alt="상담예약 및 문의"/>
        </div>
    
    </div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

@stop