@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/ 

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2387m_top.jpg"  alt="경찰 헌법 도약" />        
    </div>

    <div class="evtCtnsBox evt01" id="evt_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2387m_01.jpg" alt=""/>       
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2387m_02.jpg" alt=""/>       
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2387m_03.jpg">
    </div>

    <div class="evtCtnsBox mt50" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2387m_04.jpg"/>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif
    </div>
</div>

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
        AOS.init();
    });
</script>



@stop