@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
            position:relative;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/  
        
        .sky {position:fixed; width:120px; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2370_top_bg.jpg) center top no-repeat;}   

        .evt01 {position:relative;}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/09/2370_02_bg.jpg) center top no-repeat;}

        .evt03 {padding:150px 0; width:1120px; margin:0 auto;}
        .evt03 .bTitle {font-size:60px}
        .evt03 .bTitle span {color:#723d21; vertical-align:top} 
        .evt03 .sTitle span {color:#ed0000; vertical-align:top}
        .evt03 .sTitle {margin:80px auto 30px; font-size:30px; text-align:left}

     
    </style>

    <div class="evtContent NSK" id="evtContainer">   
        <div class="sky" id="QuickMenu">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2360" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/09/2370_sky.png" alt="이벤트 하나"/></a>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2370_top.jpg" title="저스티스 범죄학" />       
        </div>       

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2370_01.jpg"  alt="범죄학의 정석" />
                <a href="https://police.willbes.net/professor/show/cate/3002/prof-idx/51278?subject_idx=2178&subject_name" target="_blank" title="교수님_홈" style="position: absolute;left: 72.98%;top: 75.03%;width: 11.46%;height: 7.27%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2370_02.jpg"  alt="무엇을 어떻게" />
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <div class="bTitle NSK-Black"><span>10월</span> 추천 강좌 바로가기</div>
            <div class="sTitle NSK-Black">2022대비 온라인 <span>기본이론</span> 신청</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
            <div class="sTitle NSK-Black">2022대비 온라인 <span>심화이론</span> 신청</div>
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
    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
 