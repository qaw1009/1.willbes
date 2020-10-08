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

        .evtTop {background:#2F5BF2 url(https://static.willbes.net/public/images/promotion/2020/10/1748_top_bg.jpg) center top no-repeat}       

        .evt01 {background:#f7f7f7}

        .evt02 {background:#D4D0CD}

        .evt03 {background:#6AAEB7}

        .evt04 {background:#C59396}

        .evt05 {background:#E29442 url(https://static.willbes.net/public/images/promotion/2020/10/1748_05_bg.jpg) center top no-repeat}

        .evt06 {background:#F7F7F7}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox evtTop" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1748_top.jpg" alt="" />            
        </div>    

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1748_01.jpg" alt=""/><br>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1748_02.jpg" alt=""/><br>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1748_03.jpg" alt=""/><br>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1748_04.jpg" alt=""/><br>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1748_05.jpg" alt=""/><br>
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1748_06.jpg" alt=""/><br>
        </div>
    </div>
    <!-- End Container -->

@stop