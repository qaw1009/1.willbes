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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2373_top_bg.jpg) no-repeat center top;position:relative;}

        /*타이머*/
        .newTopDday {clear:both; width:100%;position:absolute;left:2.5%;top:55.5%;}
        .newTopDday ul { display: flex; justify-content: center; align-items: center;}
        .newTopDday ul li {color:#000; font-size:20px;}
        .newTopDday ul li:nth-child(1) {margin-right:5%; }
        .newTopDday .d_day {line-height:1.2;text-align:center;padding-top:30px;}
        .newTopDday .d_day p {color:#db320f; font-size:180px;}

        .wb_cts01 {background:#f4f4f4;}

        .wb_cts02 {background:#3a3a3a;}
   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2373_top.jpg" alt="마지막기회"  data-aos="fade-left" />        
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2087" target="_blank" title="구매하기" style="position: absolute;left: 30%;top: 76.3%;width: 39.57%;height: 12.5%;z-index: 2;"></a>  
            </div>      
            <div id="newTopDday" class="newTopDday">
                <div class="d_day NSK">
                    <ul>                       
                        <li>
                            <p class="NSK-Black"> D-30</p>
                        </li>
                    </ul>
                </div>
            </div> 
        </div>

        <div class="evtCtnsBox wb_cts01"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2373_01.jpg" alt="팩트체크 확인하기" data-aos="fade-right" />           
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2356" target="_blank" title="확인하러가기" style="position: absolute;left: 30%;top: 70.3%;width: 39.57%;height: 13.9%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02">
            <div class="wrap">
                <img  src="https://static.willbes.net/public/images/promotion/2021/09/2373_02.jpg" alt="체험팩" data-aos="fade-left"/>    
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2357" target="_blank" title="신청하러가기" style="position: absolute;left: 30%;top: 72.3%;width: 39.57%;height: 13.9%;z-index: 2;"></a>    
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