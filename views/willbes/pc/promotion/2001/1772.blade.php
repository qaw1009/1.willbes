@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .subContainer {
        min-height:auto !important;
        margin-bottom:0 !important;
    }
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
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/08/1772_top_bg.jpg) no-repeat center top;}
    .evt00 {background:#0a0a0a}
    .evt01 {background:#f1f1f1;}
    .evt02 {background:#fff}
    </style>

    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1772_00.jpg" alt="대한민국 경찰학원 1위">
        </div> 

        <div class="evtCtnsBox evt_top">  
            <div><img src="https://static.willbes.net/public/images/promotion/2020/08/1772_top.jpg" alt="코로나 19 극복 긴급지원프로젝트"></div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1772_01.jpg" alt="강사진">
        </div>  

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1772_02.jpg" alt="코로나19 극복 이벤트" usemap="#Map1772" border="0">
            <map name="Map1772">
                <area shape="rect" coords="256,720,865,815" href="#" alt="할인쿠폰 받기">
                <area shape="rect" coords="364,1174,750,1222" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="이벤트이미지받운받기">
            </map>
        </div> 
        
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif
    </div>
    <!-- End Container --> 
@stop