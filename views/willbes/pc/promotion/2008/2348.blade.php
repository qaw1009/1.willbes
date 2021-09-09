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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}


        /************************************************************/
        
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2348_top_bg.jpg) no-repeat center top;}

        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2348_top.jpg" alt="경찰간부 마스터 관리형 종합반"/>
        </div>
        
        <div class="evtCtnsBox evt_01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2348_01.jpg" alt="필기시험 과목개편"/>
        </div>        
        <div class="evtCtnsBox evt_02"  data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2348_02.jpg" alt="과목 간 비중 및 출제비율"/>
        </div>
        <div class="evtCtnsBox evt_03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2348_03.jpg" alt="강사진"/>
        </div>
        <div class="evtCtnsBox evt_04"  data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2348_04.jpg" alt="연간 커리큘럼 및 세부 강의 일정"/>
        </div>
        <div class="evtCtnsBox evt_05" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2348_05.jpg" alt="학습 시스템"/>
        </div>
        <div class="evtCtnsBox evt_06"  data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2348_06.jpg" alt="관리 시스템"/>
        </div>
        <div class="evtCtnsBox evt_07" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2348_07.jpg" alt="선등록자 특전 및 종합반 할인혜택 특징"/>
        </div>

	</div>
    <!-- End Container -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
    $( document ).ready( function() {
        AOS.init();
    });
    </script>
@stop