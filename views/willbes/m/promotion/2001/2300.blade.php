@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }
</style>


<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox evt00" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2300m_top.jpg" alt="마무리 특강"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2300m_01.jpg" alt="핵심포인트"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2300m_02.jpg" alt="학습전략"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2300m_03_01.jpg"  alt="마무리 특강 단과"/>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
        <img src="https://static.willbes.net/public/images/promotion/2021/07/2300m_03_02.jpg"  alt="마무리 특강 종합반"/>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
        @endif
    </div>
</div>	

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $( document ).ready( function() {
    AOS.init();
    } );
</script>


@stop