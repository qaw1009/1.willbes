@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/09/2775_top_bg.jpg) no-repeat center top; background-size:2000px; height: 904px;}
        .wb_top a {display:block; width:600px; font-size:30px; background:#c78b11; color:#fff; border-radius:50px; text-align:center; padding:28px 0; position: absolute; top:670px; left:50%; margin-left:-480px}
        .wb_top span {color:#ffff5a}
        .wb_top a:hover {background:#000;}

        .wb_02 {background:#cea259}

        .wb_03 {margin-bottom:150px}
        .wb_03 a {color:#ffda39; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite; font-size:30px; display:block; width:800px; margin:0 auto; background:#1c1d21; color:#fff; border-radius:50px; text-align:center; padding:28px 0;}
        @@keyframes upDown{
            from{color:#fff}
            50%{color:#fffe56}
            to{color:#fff}
        }
        @@-webkit-keyframes upDown{
            from{color:#fff}
            50%{color:#fffe56}
            to{color:#fff}
        }

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <a href="#free" data-aos="fade-right" class="NSK-Black">지금 바로 <span>세무직 PASS 무료</span> 수강하기 →</a>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2775_01.jpg" alt="세무직, 제대로 준비"/>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2775_02.jpg" alt="왜 윌비스 세무직패스인가?"/>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up" id="free">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2775_03.jpg" alt="윌비스 세무직 패스"/>
            <a class="NSK-Black" id="transfer" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/201195">                
                지금 바로 <span>세무직 PASS 무료</span> 수강하기 →
            </a>
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