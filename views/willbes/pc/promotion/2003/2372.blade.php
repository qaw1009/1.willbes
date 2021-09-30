@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2372_top_bg.jpg) no-repeat center top;}

        .wb_cts03 {padding-bottom:100px;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2372_top.jpg" alt="원담 사회복지학"  data-aos="fade-left" />  
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/51238?subject_idx=1134" title="교수님_홈" target="_blank" style="position: absolute;left: 70.8%;top: 75.3%;width: 15.57%;height: 4.9%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01">         
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2372_01.jpg" alt="개론" data-aos="fade-right" />        
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2372_02.jpg" alt="강추하는 이유" data-aos="fade-left"/>        
        </div>    

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2372_03.jpg" alt="2개월" data-aos="fade-right"/>    
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif           
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