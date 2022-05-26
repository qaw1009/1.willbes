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

        .wb_top {background:url("https://static.willbes.net/public/images/promotion/2022/05/2675_top_bg.jpg") no-repeat center top;}      

        .wb_cts01 {background:url("https://static.willbes.net/public/images/promotion/2022/05/2675_01_bg.jpg") no-repeat center top;}   
        
        .wb_cts02 {background:#e4d8c8; padding-bottom:150px}
        .wb_cts02 a {width:900px; margin:0 auto; display: block; font-size:40px; background:#003b39; color:#fff; padding:20px; border-radius:60px}
        .wb_cts02 a:hover {background:#000}
   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2675_top.jpg" alt="2년차 관리형 종합반"/>    
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img  src="https://static.willbes.net/public/images/promotion/2022/05/2675_01.jpg" alt="윌비스 검찰팀"/>
        </div>  

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2673_02_01.jpg" alt="커리큘럼"/>
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3149/prod-code/196777" title="수강신청"><strong>2년차 관리형 독학반</strong> 수강신청 →</a>
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