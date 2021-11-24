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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2420_top_bg.jpg) no-repeat center top} 

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2420_02_bg.jpg) no-repeat center top}

        .evt03 {padding-bottom:100px;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2420_top.jpg" alt="소방학 이중희"/>                
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2420_01.jpg" alt="20년 경력"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2420_02.jpg" alt="합격 커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2420_03.jpg" alt="결제하기"/>
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

@stop