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

        .wb_top {background:url("https://static.willbes.net/public/images/promotion/2023/02/2899_top_bg.jpg") no-repeat center top;}  

        .wb_03 {background:url("https://static.willbes.net/public/images/promotion/2023/02/2899_03_bg.jpg") no-repeat center top;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2899_top.jpg" alt="동행모의고사"/>    
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2899_01.jpg" alt="응시방법"/>    
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2899_02.jpg" alt="모의고사 바로가기"/>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="현장 모의고사" style="position: absolute;left: 13.43%;top: 24.16%;width: 29.98%;height: 3.99%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="라이브 모의고사" style="position: absolute;left: 13.43%;top: 56.16%;width: 29.98%;height: 3.99%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/book/index/cate/3035?cate_code=3035&subject_idx" target="_blank" title="봉투 모의고사" style="position: absolute;left: 13.43%;top: 88.16%;width: 29.98%;height: 3.99%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2899_03.jpg" alt="압도적인 만족도"/>    
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