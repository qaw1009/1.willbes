@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url("https://static.willbes.net/public/images/promotion/2022/02/2544_top_bg.jpg") no-repeat center top;}      

        .wb_cts02 {background:url("https://static.willbes.net/public/images/promotion/2022/02/2544_02_bg.jpg") no-repeat center top;}        
   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2544_top.jpg" alt="동행모의고사"/>    
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2544_01.jpg" alt="응시방법"/>  
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img  src="https://static.willbes.net/public/images/promotion/2022/02/2544_02.jpg" alt="합격생 배출1위"/>
        </div>                   

    </div>
    <!-- End Container -->

    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop