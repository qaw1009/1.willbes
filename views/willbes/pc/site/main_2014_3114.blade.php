@extends('willbes.pc.layouts.master_no_topnav')

@section('content')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/ 
        .evtTop {background:#181c23 url(https://static.willbes.net/public/images/promotion/main/3114_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#1f232c url(https://static.willbes.net/public/images/promotion/main/3114_01_bg.jpg) no-repeat center top;}
        .evt02 {background:#1d232d url(https://static.willbes.net/public/images/promotion/main/3114_02_bg.jpg) no-repeat center top;}
        .evt03 {background:#7c8389 url(https://static.willbes.net/public/images/promotion/main/3114_03_bg.jpg) no-repeat center top;}
        .evt04 {background:#3a99f0 url(https://static.willbes.net/public/images/promotion/main/3114_04_bg.jpg) no-repeat center top;}
    </style>

    <div id="Container" class="Container cus NGR c_both">
        <!-- site nav -->
{{--        @include('willbes.pc.layouts.partial.site_menu')--}}

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_top.jpg" title="1억뷰 N잡">
        </div>
          
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_01.jpg" title="COMIMG SOON">
        </div>
          
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_02.jpg" title="시작에 불과">
        </div>
          
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_03.jpg" title="사전 예약">
        </div>
          
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_04.jpg" title="3월 9일 찾아갑니다">
        </div>          
       
    </div>
    <!-- End Container -->
@stop