@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/07/2725_top_bg.jpg) no-repeat center top; height: 1118px;}
        .wb_top span {position:absolute; left:50%}
        .wb_top .img01 {position:absolute; width:963px; top:100px; margin-left:-481px; z-index: 1;}
        .wb_top .img02 {position:absolute; width:693px; top:450px; margin-left:-346px; z-index: 2;}
    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <span class="img02" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/07/2725_top02.png" alt="행정법"/></span>
            <span class="img01" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/07/2725_top01.png" alt="행정법"/></span>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });  
    </script>



{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop