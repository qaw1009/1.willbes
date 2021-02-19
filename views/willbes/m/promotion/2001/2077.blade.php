@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .title {font-size:25px;  margin:20px 10px; text-align:left; color:#623a3b;text-align:center;} 
    .evt04_box .title .request{color:#f37853;font-size:25px;}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {

    }
    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_police.jpg" alt="경찰학원부분 1위" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_mtop.jpg" alt="심화 이론.기출 패키지" >
    </div>     

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_m01.jpg" alt="더 늦기 전에 준비" >
    </div>
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_m02.jpg" alt="전문교수진" >
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_m03.jpg" alt="심화이론 준비" >
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2077_m04.jpg" alt="프리미엄 심화과정" >
        <div class="evt04_box"> 
            <div class="title NSK-Black">1. 온라인 심화과정 <span class="request">단과 신청 ></span></div> 
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
            @endif

            <div class="title NSK-Black">2. 온라인 심화과정 <span class="request">패키지 신청 ></span></div>   
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
            @endif
        </div>    
    </div>    
    
<!-- End Container -->

@stop