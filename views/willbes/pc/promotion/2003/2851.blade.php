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

        .wb_top {background:url("https://static.willbes.net/public/images/promotion/2022/12/2851_top_bg.jpg") no-repeat center top;}  
        
        .wb_cts01 {padding-bottom:150px}
        .wb_cts01 div {margin-bottom:50px}
        .wb_cts01 a {display:block; width:400px; margin:0 auto; font-size:30px; background:#000; color:#fff; padding:20px; border-radius:50px}

        .wb_cts02 {background:url("https://static.willbes.net/public/images/promotion/2022/12/2851_03_bg.jpg") no-repeat center top; height:473px}        
   
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2851_top.jpg" alt="동행모의고사"/>    
        </div>

        <div class="evtCtnsBox wb_cts01">
            <div><img src="https://static.willbes.net/public/images/promotion/2022/12/2851_01.jpg" alt="응시방법"/></div>
            <div data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/12/2851_01_01.jpg" alt="현장모의고사"/></div>
            <div data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/12/2851_01_02.jpg" alt="라이브모의고사"/></div>
            <div data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/12/2851_01_03.jpg" alt="봉투모의고사"/></div>

            <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="" class="NSK-Black">모의고사 신청 바로가기</a>

        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            
        </div>                   

    </div>
    <!-- End Container -->

    
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop