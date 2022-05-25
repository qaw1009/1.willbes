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

        .wb_top {background:url("https://static.willbes.net/public/images/promotion/2022/05/2673_top_bg.jpg") no-repeat center top;}      

        .wb_cts01 {background:url("https://static.willbes.net/public/images/promotion/2022/05/2673_01_bg.jpg") no-repeat center top;}   
        
        .wb_cts02 {background:#e4d8c8}
   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2673_top.jpg" alt="동반 합격플랜"/>    
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img  src="https://static.willbes.net/public/images/promotion/2022/05/2673_01.jpg" alt="윌비스 검찰팀"/>
        </div>  

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2673_02.jpg" alt="커리큘럼"/>
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3149/prod-code/196776" title="수강신청" style="position: absolute; left: 16.34%; top: 91.04%; width: 67.05%; height: 2.76%; z-index: 2;"></a>
            </div>
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