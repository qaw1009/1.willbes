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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/04/2225_top_bg2.jpg) no-repeat center top; height:1222px;}
        .wb_top img {position: absolute; left:50%; margin-left:-206px; top:330px}

        .wb_cts02 {background:#ebebeb}

        .wb_cts03 {background:#303132}

    </style>


    <div class="evtContent NSK" id="evtContainer">     

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2225_top_img.png" alt="공무원 웰컴팩" data-aos="flip-left" data-aos-duration="2000"/>
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_01.jpg" alt="아직도 고민만 하고 계세요?"/>
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_02.jpg" alt="모든 혜택이 0원"/>
        </div>      

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2225_03.jpg" alt="자세히보기"/>
                <a href="https://pass.willbes.net/home/index/cate/3019" target="_blank" title="9급" style="position: absolute;left: 14.77%;top: 52%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3020" target="_blank" title="7급" style="position: absolute;left: 43.77%;top: 52%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3023" target="_blank" title="소방" style="position: absolute;left: 72.77%;top: 52%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3024" target="_blank" title="군무원" style="position: absolute;left: 14.77%;top: 85%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3028" target="_blank" title="기술직" style="position: absolute;left: 43.77%;top: 85%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3035" target="_blank" title="법원팀" style="position: absolute;left: 72.77%;top: 85%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
            </div>
        </div> 

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function(){
        AOS.init();
      });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop