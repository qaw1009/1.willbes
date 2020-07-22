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
        .wb_top {background:#433930 url(https://static.willbes.net/public/images/promotion/2020/07/1729_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#F9F1E6;}

        .wb_cts02 {background:#000 url(https://static.willbes.net/public/images/promotion/2020/07/1729_02_bg.jpg) no-repeat center top;}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1729_top.jpg" alt="예비군 지휘관" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1729_01.jpg" alt="커리큘럼&이해학습"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1729_02.jpg" alt="7월말 커밍쑨"> 
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop