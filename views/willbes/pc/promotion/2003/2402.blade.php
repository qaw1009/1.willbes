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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2402_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#f4f4f4;}

        .evt03 {background:#f4f4f4;}        

        .evt04 {padding:100px 0; width:1120px; margin:0 auto}
        .evt04 .sTitle {margin:50px 0 30px; font-size:25px; text-align:left; color:#464646}

        .evtInfo {padding:80px 0; background:#e1e3e3; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:2.0;}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:16px;}
        .evtInfoBox .infoTit{font-size:35px;padding-bottom:25px;}     
        .evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    

        <div class="evtCtnsBox evtTop" data-aos="fade-down">           
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2402_top.jpg" alt="실전덕후단 수강후기"/>              
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2402_01.jpg" alt="교수진" />
        </div>                   

        <div class="evtCtnsBox evt02" data-aos="fade-left"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2402_02.jpg" alt="100% 선물당첨" />
                <a href="https://www.willbes.net/classroom/home/index" target="_blank" title="후기 쓰러 가기" style="position: absolute;left: 28.98%;top: 81.43%;width: 41.46%;height: 8.77%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2402_03.jpg" alt="어떻게 작성?" />
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2402_04.jpg" alt="강의 신청" />
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