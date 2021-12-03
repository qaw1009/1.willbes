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

        .sky {position:fixed;top:100px;right:10px;z-index:111;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2377_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#bbb;position:relative;}
        .youtube {position:absolute; top:136px; left:50%;margin-left:-463px;z-index:1;}
        .youtube iframe {width:943px; height:528px}

        .wb_cts02 {background:#fff;}
        
        .wb_cts03 {background:#2ebd53;}

        .wb_cts04 {padding-bottom:100px;background:#fff;}
        .wb_cts04 .sTitle {margin:50px 0 30px; font-size:25px; text-align:left; color:#464646}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">          
            <a href="#package"><img src="https://static.willbes.net/public/images/promotion/2021/12/2377_sky.png" alt="기출+모고 패키지" /></a>           
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-down">      
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2377_top.jpg" alt="조경직 이윤주"/>         
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2377_01.jpg" alt="유튜브" />  
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/VX7hZ2s5EUw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>  
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2377_02.jpg" alt="q&a" />        
        </div>
        
        <div class="evtCtnsBox wb_cts02s" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2377_02.gif" alt="커리큘럼" />        
        </div> 

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up"  id="package">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2377_03.jpg" alt="수강신청" />    
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2408" title="수강신청" target="_blank" style="position: absolute;left: 58.52%;top: 26.9%;width: 29.07%;height: 5.9%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/185716" title="수강신청" target="_blank" style="position: absolute;left: 13.8%;top: 81.19%;width: 28.07%;height: 5.9%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/188417" title="수강신청" target="_blank" style="position: absolute;left: 59.25%;top: 81.19%;width: 28.07%;height: 5.9%;z-index: 2;"></a>
            </div>                      
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <div class="wrap">           
                <div class="sTitle NSK-Black">단과 수강신청</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif      
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