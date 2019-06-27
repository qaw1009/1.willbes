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
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

/*****************************************************************/  
.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/06/1298_top_bg.jpg) no-repeat center top;}
.sec01 , .sec05{background:#ececec;}
.sec03{background:#c5cbcd;}
.sec06{background:#555555;}
</style>


    <div class="evtContent NGR" id="evtContainer">      

        <div class="evtCtnsBox top_bg">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_top.jpg" alt="텀블러 무료 배포">
        </div>
        <div class="evtCtnsBox sec01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec01.jpg" alt="신의 한 수 베너">
        </div>     
        <div class="evtCtnsBox sec02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec02.jpg" alt="신의 한 수 텀블러">  
        </div>
        <div class="evtCtnsBox sec03">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec03.jpg" alt="윌비스 회원가입"> 
        </div>
        <div class="evtCtnsBox sec04">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec04.jpg" alt="신의 한 수 이벤트"> 
        </div>
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif
        <div class="evtCtnsBox sec05">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec05.jpg" alt="경찰 합격비법"> 
        </div>  
        <div class="evtCtnsBox sec06">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec06.jpg" alt="이벤트 유의사항"> 
        </div>                
              
    </div>
    <!-- End Container --> 


@stop