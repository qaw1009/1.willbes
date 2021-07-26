@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:30px}

        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:200px;right:10px; width:120px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:#c2dfff}

        .evt01 {background:#ececec}
        .evt03 {background:#0b245d; padding-bottom:100px}

    </style> 

    <div class="evtContent NSK" id="evtContainer">
        {{--
        <div class="sky">
            <a href="#evt06"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2300_sky01.png" alt="8월 BEST 강좌" >
            </a>  
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2296" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2300_sky02.png" alt="학원강좌" >
            </a>          
        </div> 
        --}}

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" alt="경찰학원부분 1위"/>
        </div>              

        <div class="evtCtnsBox evtTop"  data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2300_top.jpg" alt="마무리 특강"/>
        </div>

        <div class="evtCtnsBox evt01"  data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2300_01.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2300_02.jpg"  alt="학습전략"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2300_03_01.jpg" alt="마무리 특강 단과"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 

            <img src="https://static.willbes.net/public/images/promotion/2021/07/2300_03_02.jpg" alt="마무리 특강 종합반"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
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