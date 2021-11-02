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

        .evtTop {background:#fa446f;}
        .evt01 {background:#2a5391;}
        .evt03 {background:#f4f4f4;}        
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    

        <div class="evtCtnsBox evtTop" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2403_top.jpg" alt="소방직 기출문제풀이 패키지"/>              
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2402_01.jpg" alt="" />
        </div>                   

        <div class="evtCtnsBox evt02" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2402_02_01.gif" alt="" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2403_03_02.jpg" alt="" />    
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2403_03.jpg" alt="" />
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/187034" target="_blank" title="공채 패키지" style="position: absolute; left: 12.95%; top: 75.44%; width: 28.39%; height: 5.69%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/187037" target="_blank" title="경체 패키지" style="position: absolute; left: 55.59%; top: 75.44%; width: 28.39%; height: 5.69%; z-index: 2;"></a>
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