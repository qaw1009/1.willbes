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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_top_bg.jpg) no-repeat center top}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_01_bg.jpg) no-repeat center top}
        .evt02 {background:#15181c}
        .evt03 {background:#1e252e;}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_04_bg.jpg) no-repeat center top}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_05_bg.jpg) no-repeat center top}
        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_06_bg.jpg) no-repeat center top}
        .evt07 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_07_bg.jpg) no-repeat center top}
        .evt08 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_08_bg.jpg) no-repeat center top}
        .evt09 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_09_bg.jpg) no-repeat center top}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_top.jpg" alt="1억뷰 엔잡" > 
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_01.jpg" alt="1억뷰 엔잡" > 
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_02.jpg" alt="1억뷰 엔잡" > 
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_03.jpg" alt="1억뷰 엔잡" > 
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_04.jpg" alt="1억뷰 엔잡" > 
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_05.jpg" alt="1억뷰 엔잡" > 
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_06.jpg" alt="1억뷰 엔잡" > 
        </div>

        {{--
        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_07.jpg" alt="1억뷰 엔잡" > 
        </div>
        --}}

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_08.jpg" alt="1억뷰 엔잡" > 
        </div>

        <div class="evtCtnsBox evt09">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_09.jpg" alt="1억뷰 엔잡" > 
        </div>
    </div>
    <!-- End Container -->
@stop