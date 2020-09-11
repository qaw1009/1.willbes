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
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/1790_top_bg.jpg) no-repeat center top}

        .evt01 {background:#fff}         

        .evt02 {background:#ebebeb;}

        .evt03 {background:#fff;}
        
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1790_04_bg.jpg) no-repeat center top}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_top.jpg" alt="" > 
        </div>  

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_01_01.jpg" alt="" >   
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_01_02.gif" alt="" >           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_02.jpg" alt="" >
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_03_01.jpg" alt="" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_03_02.gif" alt="" >
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1790_04.jpg" alt="" >
        </div>
    </div>
    <!-- End Container -->



@stop