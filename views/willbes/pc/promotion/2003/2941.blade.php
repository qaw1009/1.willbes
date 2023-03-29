@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url("https://static.willbes.net/public/images/promotion/2023/03/2941_top_bg.jpg") no-repeat center top;}
        .wb_top span {position: absolute; left:50%; margin-left:285px; top: 235px; -webkit-animation:upDown 1.5s infinite; letter-spacing:-1px; text-align:center; z-index: 2;}
        @@keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        @@-webkit-keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }

        .wb_03 {background:url("https://static.willbes.net/public/images/promotion/2023/03/2941_03_bg.jpg") no-repeat center top;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2941_top.jpg" alt="동행모의고사"/>
            <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2941_limit.png" alt="300명 한정" /></span>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2941_01.jpg" alt="응시방법"/>    
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2941_02.jpg" alt="모의고사 바로가기"/>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="현장 모의고사" style="position: absolute;left: 13.43%;top: 25.36%;width: 29.98%;height: 3.99%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="라이브 모의고사" style="position: absolute;left: 13.43%;top: 57.36%;width: 29.98%;height: 3.99%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/book/index/cate/3035?cate_code=3035&subject_idx" target="_blank" title="봉투 모의고사" style="position: absolute;left: 13.43%;top: 89.26%;width: 29.98%;height: 3.99%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2941_03.jpg" alt="압도적인 만족도"/>    
        </div>                 

    </div>
    <!-- End Container -->

    
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop