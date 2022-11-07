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

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/2803_top_bg.jpg) no-repeat center top;}

    .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2803_01_bg.jpg) no-repeat center top;} 

    .evt02 {background:#0D0D0D;}

    .evt03 {background:#0D0D0D;padding-bottom:200px;}

    </style>

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2803_top.jpg" title="상담신청 바로가기">
                <a href="http://open.kakao.com/o/s3fKkLrc" target="_blank" title="바로가기" style="position: absolute;left: 22.99%;top: 73.33%;width: 54.03%;height: 12.79%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2803_01.jpg" title="상담이 필요한 학생">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2803_02.jpg" title="상담 고고">
                <a href="http://open.kakao.com/o/s3fKkLrc" target="_blank" title="바로가기" style="position: absolute;left: 22.99%;top: 63.63%;width: 54.03%;height: 7.79%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2803_03.jpg" title="합격 윌비스">
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