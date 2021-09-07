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
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2274_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#FFF;}
        
        .wb_cts02 {background:#0D8C9F;}

        .wb_cts03 {background:#FFF;}

        .wb_cts04 {background:#ebebeb;}    

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2274_top.jpg" alt="이론 패키지" data-aos="fade-up"/>            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2274_01.jpg" alt="윌비스 이론" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2274_02.jpg" alt="초반 이론 학습" data-aos="fade-left"> 
        </div>

        <div class="evtCtnsBox wb_cts03" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2274_03.jpg" alt="이런 분들이 수강하시면 좋아요." data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox wb_cts04" id="evt04">       
            <div class="wrap" data-aos="fade-up">     
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2274_04.jpg" alt="본인에게 딱 맞는 학습 전략" />
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/185565" title="국영한 기본이론" target="_blank" style="position: absolute;left: 8.66%; top: 75.96%; width: 20.8%; height: 5.44%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/183678" title="기본이론" target="_blank" style="position: absolute;left: 40.09%; top: 75.96%; width: 20.8%; height: 5.44%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/185530" title="심화이론" target="_blank" style="position: absolute;left: 71.61%; top: 75.96%; width: 20.8%; height: 5.44%; z-index: 2;"></a>
            </div>     
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