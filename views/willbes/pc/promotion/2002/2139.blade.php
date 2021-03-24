@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/      
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2139_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#f6f0e0} 
        
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_top.jpg"  alt="4월 추천강좌"/>
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_01.jpg"  alt="심화이론.기출 패키지" />
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_02.jpg"  alt="신청하기">
        </div>
    </div>
    <!-- End Container -->
@stop