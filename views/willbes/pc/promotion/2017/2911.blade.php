@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:#f7f7f7}
        .event01 {background:#ffcd02}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">
            <div class="wrap">
        	    <img src="https://static.willbes.net/public/images/promotion/2023/02/2911_top.jpg" alt="카톡 실시간 상담"/>
                <a href="https://pf.kakao.com/_xijRxij" title="카톡 친구 추가하기" target="_blank" style="position: absolute; left: 16.34%; top: 81.14%; width: 33.48%; height: 12%; z-index: 2;"></a>
                <a href="https://pf.kakao.com/_xijRxij/chat" target="_blank" title="바로 1:1 상담하기" style="position: absolute; left: 50.18%; top: 81.14%; width: 33.48%; height: 12%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2911_01.jpg"/>
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



@stop