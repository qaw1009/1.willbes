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

        .sky {position:fixed;top:200px;right:10px; width:120px; z-index:1;}
        .sky a {display:block; margin-bottom:10px}
        
        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2391_top_bg.jpg) no-repeat center top;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/10/2391_01_bg.jpg) no-repeat center top;} 
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/10/2391_02_bg.jpg) no-repeat center top;} 

        .evt04 {padding-bottom:100px;}
        .evt04 h4 {color:#8c2616; font-size:60px; margin-bottom:50px}


    </style>

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="sky" id="QuickMenu">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2390" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2391_sky01.jpg" alt="0원 패스">
            </a>  
            <a href="#event04">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2391_sky02.jpg" alt="추천강좌">
            </a>  
        </div>
            
        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 
        
        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2391_top.jpg" title="경찰 11월 추천강좌">        
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2391_top_01.gif" title="심화기출">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2391_01.jpg" title="심화기출">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2391_02.jpg" title="심화기출 공략법">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2391_03.jpg" title="">              
        </div>   
        
        <div class="evtCtnsBox evt04" id="event04">
            <h4 class="NSK-Black">11월 추천 강좌 </h4>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </ㅗ>



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