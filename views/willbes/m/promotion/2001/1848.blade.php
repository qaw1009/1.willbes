@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .title {font-size:30px;  margin:20px 10px; text-align:left; color:#65069b}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1848m_00.jpg" alt="경찰학원부분 1위" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1848m_01.jpg" alt="심화 이론.기출 패키지" >
    </div>     

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1848m_02.jpg" alt="" >
    </div>
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1848m_03.jpg" alt="초시생 베스트" >
    </div>

    <div class="title NSK-Black">단과</div>
    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif

    <div class="title NSK-Black">패키지</div>
    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
    @endif
    
<!-- End Container -->

@stop