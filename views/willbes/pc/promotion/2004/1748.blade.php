@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed; top:250px; right:10px; z-index:1;}
        .skybanner a { display:block; padding-bottom:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/07/1748_top_bg.jpg) center top no-repeat}        

        .evt01 {background:#f7f7f7}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox evtTop" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1748_top.jpg" alt="부산 윌비스 이섬가 G-TELP" />            
        </div>    

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1748_01.jpg" alt="이섬가 G-TELP"/><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1748_02.jpg" alt="이섬가 G-TELP"/>
        </div>
    </div>
    <!-- End Container -->

@stop