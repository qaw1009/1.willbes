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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2275_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#FFF;}
        
        .wb_cts02 {background:#1eaf7d;}

        .wb_cts03 {background:#FFF;}

        .wb_cts04 {background:#ebebeb;}    

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2275_top.jpg" alt="불꽃소방 기본/심화이론 팩" data-aos="fade-up"/>            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2275_01.jpg" alt="윌비스 이론" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2275_02.jpg" alt="초반 이론 학습" data-aos="fade-left" /> 
        </div>

        <div class="evtCtnsBox wb_cts03" id="careful" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2275_03.jpg" alt="이런 분들이 수강하시면 좋아요." data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox wb_cts04">       
            <div class="wrap" data-aos="fade-up">     
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2275_04.jpg" alt="본인에게 딱 맞는 학습 전략"/>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/183360" title="공채 기본이론" target="_blank" style="position: absolute;left: 3.3%; top: 71.3%; width: 18.57%; height: 4.9%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/185533" title="공채 심화이론" target="_blank" style="position: absolute;left: 28.21%; top: 71.3%; width: 18.57%; height: 4.9%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/183679" title="경채 기본이론" target="_blank" style="position: absolute;left: 52.95%; top: 71.3%; width: 18.57%; height: 4.9%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/185540" title="경채 심화이론" target="_blank" style="position: absolute;left: 77.95%; top: 71.3%; width: 18.57%; height: 4.9%; z-index: 2;"></a>
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