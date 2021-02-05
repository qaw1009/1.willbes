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
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
    /*****************************************************************/ 
    .evt_top {background:url('https://static.willbes.net/public/images/promotion/2021/02/2068_top_bg.jpg') no-repeat center top; margin-top:20px; height:1013px; position:relative;}   

    </style>

    <div class="evtContent NSK">        
        <div class="evtCtnsBox evt_top"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2068_top.jpg" alt="설맞이 이벤트" >
        </div>
    </div>
    <!-- End Container -->
@stop