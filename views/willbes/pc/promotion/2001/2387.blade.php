@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {width:100% !important;min-width:1120px !important;margin-top:20px !important;padding:0 !important;background:#fff;}
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        .sky {position:fixed;top:150px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}
                
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/04/2387_top_bg.jpg) no-repeat center top;}
        .evt01{background: #ebebeb;}
        .evt02 {background: #4f4f4f;}
        .evt03 {background: #f1f1f1;}
        .evt04 {padding-bottom: 150px;}


        .evtTab {width:890px; margin:0 auto; padding-bottom: 80px; display: flex; justify-content: center; align-items: flex-end;}
        .evtTab li {width:50%; position: relative;}
        .evtTab li a {display:block; color:#868686; font-size:32px; padding:20px 30px; border:8px solid #868686; font-weight:900; letter-spacing: -2px;}
        .evtTab li a span{font-size: 18px; vertical-align: baseline;}
        .evtTab li:first-child::before{
            content: '';
            width:8px;
            height: 100%;
            background-color: #000;
            position: absolute;
            top: 0;
            right: 0;
        }
        .evtTab li:last-child::before{
            content: '';
            width:8px;
            height: 100%;
            background-color: #000;
            position: absolute;
            top: 0;
            left: -8px;
        }
        .evtTab li:first-child a{border-right: 0;}
        .evtTab li:last-child a{border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {color:#000; border:8px solid #000;  font-size: 38px; padding:30px; }
        .evtTab li:first-child a:hover,
        .evtTab li:first-child a.active{border-right:0;}
        .evtTab li:last-child a:hover,
        .evtTab li:last-child a.active{border-left:0;}
        .evtTab li a:hover span,
        .evtTab li a.active span{font-size: 20px;}
        .evtTab:after {content:''; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2387_top.jpg" alt="이국령의 경찰 헌법 도약" />
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2387_01.jpg" alt="왜 이국령을 선택해야하나" />
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2387_02.jpg" alt="이국령 헌법속성반" />
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2387_03.jpg" alt="2022 합격대비 커리큘럼" />
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2387_04.jpg" alt="국령쌤 추천강좌" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
        </div>

    </div>
    <!-- End evtContainer -->


    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>  
    <script>
      $(document).ready( function() {
        AOS.init();
      });
      
    </script>
@stop