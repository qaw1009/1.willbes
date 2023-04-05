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
            line-height:1.3;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/04/2940_top_bg.jpg) no-repeat center top; height:2790px}
        .evt_top .main_img {position:absolute; top:210px; left:50%; margin-left:-449.5px}

        .evt02 {background:#F2F2F2}

        .evt03 {background:#373737}
        .evt03 div a {width:420px; margin:0 auto 20px; display:block; padding:30px 20px 30px 50px; border-radius:50px; color:#2A2A2A; background:#F3FF8D; font-size:30px; box-shadow: 0 15px 30px rgba(0,0,0,.2);font-weight:bold;}
        .evt03 div a:hover,
        .evt03 div a:hover{background:#fff}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">          
            <a href="#evt04_01"><img src="https://static.willbes.net/public/images/promotion/2023/04/2940_sky01.png" title="단과반"></a>
            <a href="#evt04_02"><img src="https://static.willbes.net/public/images/promotion/2023/04/2940_sky02.png" title="종합반"></a>           
        </div>

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2940_top.png"  alt="기출분석반" data-aos="flip-down" class="main_img"/>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2940_01.jpg" title="선택 아닌 필수">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2940_02.jpg" title="커리큘럼">
        </div>

        <div class="evtCtnsBox evt03 pb100" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2940_03.jpg" title="스케줄 확인하기" >
            </div>
            <div>
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank">강의시간표 확인하기 ></a>
            </div>
        </div>        

        <div class="evtCtnsBox evt04 pb100" data-aos="fade-up">          
            <div class="mt100 mb20"><img src="https://static.willbes.net/public/images/promotion/2023/04/2940_04_01.jpg" title="스페셜 단과" id="evt04_01"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <div class="mb20"><img src="https://static.willbes.net/public/images/promotion/2023/04/2940_04_02.jpg" title="스페셜 패키지" id="evt04_02"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
        </div>

	</div>

    <!-- End Container -->
        
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>  
    <script>
      $(document).ready( function() {
        AOS.init();
      });
      
    </script>
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop