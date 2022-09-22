@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
        }
        .evtContent span {vertical-align:middle;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/       

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2392_top_bg.jpg) no-repeat center top;}

        .evtTops {background:url(https://static.willbes.net/public/images/promotion/2021/10/2392_tops_bg.jpg) no-repeat center top;} 

        .evt04 {background:#004e78;padding-bottom:100px;}
        .tx-red {color:#fff800 !important;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">      
        
        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2392_top.jpg" title="심화기출">        
        </div>

        <div class="evtCtnsBox evtTops" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2392_tops.jpg" title="제대로">        
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-rifgt">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2392_01.jpg" title="교수진">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2392_02.jpg" title="지름길">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-rifgt">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2392_03.jpg" title="커리큘럼">
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2392_04.jpg" title="심화기출 강좌">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif             
        </div>

	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop