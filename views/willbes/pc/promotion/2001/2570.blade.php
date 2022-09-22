@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000} */

        /************************************************************/
        
        .sky {position:fixed; top:200px;right:0;z-index:1;}
        .sky a {display: block; margin-bottom:10px}

        .evt_tops {background:#9a9ca9}
   
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2570_top_bg.jpg) no-repeat center top;}        

        .evt02 {background:#f5f5f5}

        .evt03 {background:#93a5d2}

        .evt05 {padding-bottom:100px;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply1"><img src="https://static.willbes.net/public/images/promotion/2022/03/2570_sky01.png" alt="단과반" ></a>
            <a href="#apply2"><img src="https://static.willbes.net/public/images/promotion/2022/03/2570_sky02.png" alt="종합반" ></a>
        </div>
      
        <div class="evtCtnsBox evt_tops" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_tops.jpg" title="신광은 경찰학원">
        </div>

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2570_top.jpg" title="2022 심화과정">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2570_01.jpg" title="일정안내">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2570_02.jpg" title="업그레이드">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2570_03.jpg" title="심화과정">
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up" id="apply1">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2570_04.jpg" title="스페셜 단과">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif         
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up" id="apply2">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2570_05.jpg" title="스페셜 패키지">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))            
            @endif 
        </div>

	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });
    </script>

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop