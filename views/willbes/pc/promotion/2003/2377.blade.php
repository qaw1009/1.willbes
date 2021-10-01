@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/10/2377_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#bbb;position:relative;}
        .youtube {position:absolute; top:10px; left:50%;margin-left:-472px;z-index:1;}
        .youtube iframe {width:943px; height:528px}

        .wb_cts03 {background:#2ebd53;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">           
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2377_top.jpg" alt="조경직 이윤주"  data-aos="fade-left" />         
        </div>

        <div class="evtCtnsBox wb_cts01">         
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2377_01.jpg" alt="유튜브" data-aos="fade-right" />      
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/VX7hZ2s5EUw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>  
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2377_02.jpg" alt="q&a" data-aos="fade-left"/>        
        </div>    

        <div class="evtCtnsBox wb_cts03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2377_03.jpg" alt="수강신청" data-aos="fade-right"/>    
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/185716" title="수강신청" target="_blank" style="position: absolute;left: 53.8%;top: 67.9%;width: 28.07%;height: 8.9%;z-index: 2;"></a>
            </div>                         
        </div>           

    </div>
    <!-- End Container -->
 
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop