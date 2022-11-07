@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:top}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}        
    .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

    /*****************************************************************/

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/11/2804_top_bg.jpg) no-repeat center top; height:1665px}
    .evt_top span {width:864px; position: absolute; top:30px; left:50%; margin-left:-432px; z-index: 2;}

    .evt01 {} 

    .evt02 {background:url(https://static.willbes.net/public/images/promotion/2022/11/2804_02_bg.jpg) no-repeat center top;}

    .evt03 {background:#997c52;}

    </style>

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top">
            <span data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2022/11/2804_top.png" title="W 아카데미"></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2804_01.jpg" title="3가지 제시">
                <a href="http://cafe.daum.net/W-academy" target="_blank" title="다음카페" style="position: absolute; left: 19.38%; top: 41.9%; width: 16.07%; height: 3.01%; z-index: 2;"></a>
                <a href="https://naver.me/GZ0UmeUa" target="_blank" title="체험신청" style="position: absolute; left: 41.79%; top: 41.9%; width: 16.07%; height: 3.01%; z-index: 2;"></a>
                <a href="https://open.kakao.com/o/swY4iaxe" target="_blank" title="상담신청" style="position: absolute; left: 64.11%; top: 41.9%; width: 16.07%; height: 3.01%; z-index: 2;"></a>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2804_02.jpg" title="시간표">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2804_03.jpg" title="혜택 및 제공">
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2804_04.jpg" title="신청안내">
                <a href="https://open.kakao.com/o/swY4iaxe" title="상담 신청" target="_blank" style="position: absolute; left: 24.2%; top: 74.88%; width: 17.5%; height: 4.33%; z-index: 2;"></a>
                <a href="https://naver.me/GZ0UmeUa" title="체험신청" target="_blank" style="position: absolute; left: 57.95%; top: 74.88%; width: 17.5%; height: 4.33%; z-index: 2;"></a>
            </div>
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