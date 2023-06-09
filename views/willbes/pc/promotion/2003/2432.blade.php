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

        .wb_top {background:#ebbf17}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2432_02_bg.jpg) no-repeat center top;}        
   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2432_top.jpg" alt="법원직 제1회 동행모의고사"/>    
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2432_01.jpg" alt="응시방법" />
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" title="모의고사 신청 바로가기" target="_blank" style="position: absolute; left: 26.96%; top: 90.20%; width: 44.46%; height: 5.26%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img  src="https://static.willbes.net/public/images/promotion/2021/11/2432_02.jpg" alt="합격생 배출1위"/>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-rwdImageMaps/1.6/jquery.rwdImageMaps.min.js"></script> 
    <script type="text/javascript">
        // rwdImageMaps로 이미지맵 동적 할당하도록 설정
        $('img[usemap]').rwdImageMaps();
    </script>


    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop